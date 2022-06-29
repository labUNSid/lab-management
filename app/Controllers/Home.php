<?php

namespace App\Controllers;

use App\Models\LaboratoriumModel;
use App\Models\ReservasiModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->labModel = new LaboratoriumModel();
        $this->reservasiModel = new ReservasiModel();
        // dd(session()->sesi);
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
        ];
        // dd($data);
        return view('dashboard', $data);
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
        ];
        // dd($data);
        return view('dashboard', $data);
    }
}
