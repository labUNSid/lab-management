<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LaboratoriumModel;
use App\Models\ReservasiModel;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function __construct()
    {
        if (session()->get('id_role') != 2) {
            return redirect()->to('/auth');
        }
        $email = session()->get('email');

        $this->userModel = new UserModel();
        $this->labModel = new LaboratoriumModel();
        $this->reservasiModel = new ReservasiModel();

        $this->list_profile = $this->userModel->getWhere(['email' => $email])->getResultArray();
    }

    public function index()
    {

        $reservasi = $this->reservasiModel->getData()->getResultArray();

        $data = [
            'title' => 'Dahsboard | Manajemen Lab',
            'nav' => 'dash',
            'list_lab' => $this->labModel->findAll(),
            'list_reservasi' => $reservasi,
            'tabs' => 'all',
            'listc' => $this->list_profile
        ];
        // dd($data);
        return view('member/index', $data);
    }

    public function detailtampil($key)
    {
        $reservasi = $this->reservasiModel->getDataDash($key)->getResultArray();

        $data = [
            'title' => 'Dahsboard | Manajemen Lab',
            'nav' => 'dash',
            'list_lab' => $this->labModel->findAll(),
            'list_reservasi' => $reservasi,
            'tabs' => $key,
            'listc' => $this->list_profile
        ];
        // dd($data);
        return view('member/index', $data);
    }

    public function profile()
    {

        $data = [
            'listc' => $this->list_profile,
            'nav' => 'profile'
        ];
        // dd($data);
        return view('member/profile', $data);
    }

    public function edit()
    {
        $data = [
            'listc' => $this->list_profile,
            'nav' => 'profile',
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('member/edit_profile', $data);
    }

    public function update()
    {
        $emailCheck = $this->list_profile;
        if ($emailCheck[0]['email'] == $this->request->getVar('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|is_unique[user.email]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 3 huruf'
                ]
            ],
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/user/edit/')->withInput()->with('validation', $validation);
        }

        // dd($this->request->getFile('avatar'));
        $fileavatar =  $this->request->getFile('avatar');

        if ($fileavatar->getError() == 4) {
            $namaavatar = $this->request->getVar('avatar_lama');
        } else {
            $namaavatar = $fileavatar->getRandomName();
            $fileavatar->move(ROOTPATH . 'public/img/profile', $namaavatar);
        }

        $data = [
            'id_user' => $this->request->getVar('id_user'),
            'id_role' => $this->request->getVar('id_role'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'member' => $this->request->getVar('member'),
            'avatar' => $namaavatar,
            'is_active' => $this->request->getVar('is_active')
        ];
        // dd($data);
        $this->userModel->save($data);
        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/user');
    }

    public function reservasi()
    {
        $id = $this->list_profile[0]['id_user'];
        $data = [
            'title' => 'Reservasi | Management Lab',
            'nav' => 'reservasi',
            'list_reservasi' => $this->reservasiModel->getDataUser($id)->getResultArray(),
            'listc' => $this->list_profile
        ];
        // dd($data);
        return view('member/reservasi/index', $data);
    }

    public function createreservasi()
    {
        $data = [
            'title' => 'Buat Reservasi | Management Lab',
            'nav' => 'reservasi',
            'list_lab' => $this->labModel->findAll(),
            'validation' => \Config\Services::validation(),
            'listc' => $this->list_profile
        ];
        // dd($data);
        return view('member/reservasi/create', $data);
    }

    public function savereservasi()
    {
        // merge kemudian jadikan unix kemudian datetime sql
        // $tanggal = "2022-06-23";
        // $waktu1 = "20:00";
        // $dt = $tanggal . " " . $waktu1;

        // $date = strtotime($dt);
        // echo date("Y-m-d H:i:s", $date);

        if (!$this->validate([
            'id_lab' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lab harus dipilih',
                ]
            ],
            'jam_awal' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'jam harus diisi',
                ]
            ],
            'jam_akhir' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'jam harus diisi',
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/user/createreservasi')->withInput()->with('validation', $validation);
        }

        $waktuawal = strtotime($this->request->getVar('tanggal') . " " . $this->request->getVar('jam_awal'));
        $waktuakhir = strtotime($this->request->getVar('tanggal') . " " . $this->request->getVar('jam_akhir'));

        $data = [
            'id_lab' => $this->request->getVar('id_lab'),
            'id_user' => $this->request->getVar('id_user'),
            'waktu_awal' => date("Y-m-d H:i:s", $waktuawal),
            'waktu_akhir' => date("Y-m-d H:i:s", $waktuakhir),
        ];
        // dd($data);
        $this->reservasiModel->save($data);
        session()->setFlashdata('pesan', 'Reservasi Sudah diajukan');
        return redirect()->to('/user/reservasi');
    }
}
