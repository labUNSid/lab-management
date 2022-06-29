<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Signin | Lab Management',
        ];

        // dd($data);

        return view('auth/login', $data);
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = sha1($this->request->getVar('password'));
        $remem = $this->request->getVar('rememberme');
        $dataUser = $this->userModel->where(['email' => $email])->first();
        // dd($remem);
        if (isset($remem)) {
            $nama = 'email';
            $nilai = $dataUser['email'];
            $durasi = strtotime('+2 days');
            $path = '/';
            setcookie($nama, $nilai, $durasi, $path);
        }

        if ($dataUser) {
            if ($dataUser['is_active'] == 1) {
                if ($password == $dataUser['password']) {
                    session()->set([
                        'email' => $dataUser['email'],
                        'nama' => $dataUser['nama'],
                        'id' => $dataUser['id_user'],
                        'id_role' => $dataUser['id_role'],
                    ]);

                    // return redirect()->to('/user');
                    // dd(session()->get());
                    if ($dataUser['id_role'] == 1) {
                        return redirect()->to('/admin');
                    }
                    if ($dataUser['id_role'] == 2) {
                        return redirect()->to('/user');
                    }
                    echo ('Selamat datang ' . session()->get('nama'));
                } else {
                    session()->setFlashdata('pesan', 'Email atau Password yang dimasukkan salah');
                    return redirect()->to('/auth');
                }
            } else {
                session()->setFlashdata('pesan', 'Email belum diverivikasi');
                // echo ('belum verifikasi');
                return redirect()->to('/auth');
            }
        } else {
            session()->setFlashdata('pesan', 'Email tidak ditemukan');
            return redirect()->to('/auth');
        }
    }


    public function signup()
    {
        $data = [
            'title' => 'Signup | Lab Management',
            'validation' => \Config\Services::validation(),
        ];

        // dd($data);

        return view('auth/sign_up', $data);
    }

    public function save()
    {
        // validation
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 3 huruf'
                ]
            ],

            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
            ],

            'password' => [
                'rules' => 'required|min_length[8]|max_length[20]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 8 karakter',
                    'max_length' => '{field} maksimal 20 karakter'
                ]
            ],

            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sama',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/auth/signup')->withInput()->with('validation', $validation);
        }

        $namaAvatar = 'default.jpg';

        //default member adalah non civitas
        $member = 'non-civitas';

        //default role adalah member
        $role = 2;

        //default aktivasi email semantara true
        $activation = 0;

        // dd($this->request->getVar());

        //upload ke database
        $data = [
            'id_role' => $role,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => sha1($this->request->getVar('password')),
            'member' => $member,
            'is_active' => $activation,
            'avatar' => $namaAvatar,
        ];

        $this->userModel->save($data);

        // $this->sendEmail();

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/auth');
    }

    public function logout()
    {
        session()->destroy();
        $nama = 'email';
        $nilai = '';
        $durasi = strtotime('-7 days');
        $path = '/';
        setcookie($nama, $nilai, $durasi, $path);
        return redirect()->to('/');
    }
}
