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

        dd($data);

        return view('signin', $data);
    }

    public function signup()
    {
        $data = [
            'title' => 'Signup | Lab Management',
            'validation' => \Config\Services::validation(),
        ];

        dd($data);

        return view('signup', $data);
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
            'avatar' => [
                'rules' => 'max_size[avatar,1024]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar terlalu besar',
                    'is_image' => 'file tidak sesuai',
                    'mime_in' => 'file tidak sesuai'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/signup')->withInput()->with('validation', $validation);
        }

        // upload gambar
        if ($this->request->getFile('avatar')->getName() != '') {
            $avatar = $this->request->getFile('avatar');
            $namaAvatar = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/img/profile', $namaAvatar);
        } else {
            $namaAvatar = 'default.jpg';
        }

        //default member adalah non civitas
        $member = 'non-civitas';

        //default role adalah member
        $role = 2;

        //default aktivasi email semantara true
        $activation = 1;

        //upload ke database
        $this->userModel->save([
            'id_role' => $role,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => sha1($this->request->getVar('password')),
            'member' => $member,
            'avatar' => $namaAvatar,
            'is_active' => $activation,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/');
    }
}
