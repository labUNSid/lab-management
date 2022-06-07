<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\LaboratoriumModel;
use App\Models\FasilitasModel;

class Admin extends BaseController
{
    public function __construct()
    {
        if (session()->get('id_role') != 1) {
            echo 'Access denied';
            exit;
        }
        $this->userModel = new UserModel;
        $this->labModel = new LaboratoriumModel;
        $this->fasilitasModel = new FasilitasModel;
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

        // dd($data);
        return view('admin/manage_user', $data);
    }

    public function detailuser($id)
    {
        $data = [
            'title' => 'Management Lab | Detail User',
            'list' => $this->userModel->getWhere(['id_user' => $id])->getResultArray(),
        ];
        // dd($data);
        return view('admin/detail_user', $data);
    }

    public function edituser($id)
    {
        $data = [
            'title' => 'Management Lab | Edit User',
            'validation' => \Config\Services::validation(),
            'list' => $this->userModel->getWhere(['id_user' => $id])->getResultArray(),
        ];
        return view('admin/edit_user', $data);
    }

    public function updateuser($id)
    {
        $this->userModel->save([
            'id_user' => $id,
            'id_role' => $this->request->getVar('id_role'),
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'id_user' => $this->request->getVar('role'),
            'password' => $this->request->getVar('password'),
            'member' => $this->request->getVar('member'),
            'avatar' => $this->request->getVar('avatar'),
        ]);

        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/admin/detailuser/' . $id);
    }

    public function managelab()
    {
        $data = [
            'title' => 'Management Lab | Manage Lab',
            'list' => $this->labModel->findAll(),
        ];
        dd($data);

        return view('admin/manage_lab', $data);
    }

    public function createlab()
    {
        $data = [
            'title' => 'Management Lab | Tambah Lab',
            'validation' => \Config\Services::validation(),
        ];
        dd($data);
        return view('admin/create_lab', $data);
    }

    public function savelab()
    {
        if (!$this->validate([
            'nama_lab' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 3 huruf'
                ]
            ],

            'harga_lab' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/auth/signup')->withInput()->with('validation', $validation);
        }

        $this->userModel->save([
            'nama_lab' => $this->request->getVar('nama_lab'),
            'harga_lab' => $this->request->getVar('harga_lab'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/admin/managelab');
    }

    public function detaillab($id)
    {
        $data = [
            'title' => 'Management Lab | Tambah Lab',
            'list' => $this->labModel->getWhere(['id_lab' => $id])->getResultArray(),
        ];
        dd($data);
        return view('admin/detail_lab');
    }

    public function editlab($id)
    {
        $data = [
            'title' => 'Management Lab | Tambah Lab',
            'validation' => \Config\Services::validation(),
            'list' => $this->labModel->getWhere(['id_lab' => $id])->getResultArray(),
        ];

        return view('admin/edit_lab', $data);
    }

    public function updatelab($id)
    {
        $this->userModel->save([
            'id_lab' => $id,
            'nama_lab' => $this->request->getVar('nama_lab'),
            'harga_lab' => $this->request->getVar('harga_lab'),
        ]);

        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/admin/editlab/' . $id);
    }

    public function managefasilitas()
    {
        $data = [
            'title' => 'Management Lab | Management Fasilitas',
            'list' => $this->fasilitasModel->getFasilitas()->findAll(),

        ];
        dd($data);
    }

    public function createfasilitas()
    {
        $data = [
            'title' => 'Management Lab | Create Fasilitas',
            'validation' => \Config\Services::validation(),
            'list_lab' => $this->labModel->findAll()
        ];
        dd($data);
    }

    public function savefasilitas()
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 3 huruf'
                ]
            ],
            'id_lab' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'quantity' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/admin/managefasilitas')->withInput()->with('validation', $validation);
        }
        $this->fasilitasModel->save([
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_lab' => $this->request->getVar('id_lab'),
            'quantity' => $this->request->getVar('quantity')
        ]);

        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/admin/managefasilitas');
    }
}
