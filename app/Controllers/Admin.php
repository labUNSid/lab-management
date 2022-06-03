<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function __construct()
    {
        if (session()->get('id_role') != 1) {
            echo 'Access denied';
            exit;
        }
        $this->userModel = new UserModel;
    }

    public function index()
    {
        echo ('Selamat datang ' . session()->get('nama'));
        return view('admin/dashboard');
    }

    public function manageuser()
    {
        $data = [
            'title' => 'Management Lab | Manage User',
            'list' => $this->userModel->findAll(),
        ];

        dd($data);
    }
}
