<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function __construct()
    {
        if (session()->get('id_role') != 2) {
            echo 'Access denied';
            exit;
        }
        $email = session()->get('email');

        $this->userModel = new UserModel();

        $this->list_profile = $this->userModel->getWhere(['email' => $email])->getResultArray();
    }

    public function index()
    {
        echo ('Selamat datang ' . session()->get('email'));
        // echo get_cookie('key');
        // return view('user/dashboard');
    }

    public function profile()
    {

        $data = [
            'list' => $this->list_profile,
        ];
        dd($data);
    }

    public function edit()
    {
        $data = [
            'list' => $this->list_profile,
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('user/edit_profile', $data);
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
        $this->usermodel->save([
            'id_user' => $this->request->getVar('id_user'),
            'id_role' => $this->request->getVar('id_role'),
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'id_user' => $this->request->getVar('role'),
            'password' => $this->request->getVar('password'),
            'member' => $this->request->getVar('member'),
            'avatar' => $this->request->getVar('avatar'),
        ]);
        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/user');
    }
}
