<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function __construct()
    {
        if (session()->get('id_role') != 1) {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        // echo ('Selamat datang' . session()->get('nama'));
        return view('user/dashboard');
    }
}
