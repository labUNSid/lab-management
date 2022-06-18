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
        // echo ('Selamat datang ' . session()->get('nama'));
        $data = [
            'title' => 'Management Lab | Manage User',
            'nav' => 'dash',
        ];
        // dd($data);
        return view('admin/index', $data);
    }

    public function manageuser()
    {
        $data = [
            'title' => 'Management Lab | Manage User',
            'list' => $this->userModel->findAll(),
            'nav' => 'user',
        ];

        // dd($data);
        return view('/admin/user/manage', $data);
    }

    public function detailuser($id)
    {
        $data = [
            'title' => 'Management Lab | Detail User',
            'list' => $this->userModel->getWhere(['id_user' => $id])->getResultArray(),
            'nav' => 'user',
        ];
        // dd($data);
        return view('/admin/user/detail', $data);
    }

    public function edituser($id)
    {
        $data = [
            'title' => 'Management Lab | Edit User',
            'validation' => \Config\Services::validation(),
            'list' => $this->userModel->getWhere(['id_user' => $id])->getResultArray(),
            'nav' => 'user',
        ];
        return view('/admin/user/edit', $data);
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
            'nav' => 'lab',
        ];
        // dd($data);

        return view('admin/lab/managelab', $data);
    }

    public function createlab()
    {
        $data = [
            'title' => 'Management Lab | Tambah Lab',
            'validation' => \Config\Services::validation(),
            'nav' => 'lab',
        ];
        // dd($data);
        return view('admin/lab/tambah', $data);
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
            return redirect()->to('/admin/createlab')->withInput()->with('validation', $validation);
        }
        // dd($this->request->getVar('nama_lab'));
        $data = [
            'nama_lab' => $this->request->getVar('nama_lab'),
            'harga_lab' => $this->request->getVar('harga_lab'),
        ];

        $this->labModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/admin/managelab');
    }

    public function detaillab($id)
    {
        $data = [
            'title' => 'Management Lab | Tambah Lab',
            'list' => $this->labModel->getWhere(['id_lab' => $id])->getResultArray(),
            'nav' => 'lab',
        ];
        // dd($data);
        return view('admin/lab/detail', $data);
    }

    public function editlab($id)
    {
        $data = [
            'title' => 'Management Lab | Edit Lab',
            'validation' => \Config\Services::validation(),
            'list' => $this->labModel->getWhere(['id_lab' => $id])->getResultArray(),
            'nav' => 'lab',
        ];

        return view('/admin/lab/edit', $data);
    }

    public function updatelab($id)
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
            return redirect()->to('/admin/editlab/' . $id)->withInput()->with('validation', $validation);
        }

        $data = [
            'id_lab' => $id,
            'nama_lab' => $this->request->getVar('nama_lab'),
            'harga_lab' => $this->request->getVar('harga_lab'),
        ];
        $this->labModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/detaillab/' . $id);
    }

    public function deletelab($id)
    {
        // $this->labModel->where('id_lab', $id)->delete();
        $this->labModel->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/managelab');
    }

    public function managefasilitas()
    {
        $data = [
            'title' => 'Management Lab | Management Fasilitas',
            'list' => $this->fasilitasModel->getFasilitas()->findAll(),
            'nav' => 'fasilitas',
        ];
        // dd($data);
        return view('admin/fasilitas/manage', $data);
    }

    public function detailfasilitas($id)
    {
        $data = [
            'title' => 'Management Lab | Management Fasilitas',
            'list' => $this->fasilitasModel->getFasilitas()->where('id_barang', $id)->first(),
            'nav' => 'fasilitas',
        ];
        // dd($data);
        return view('admin/fasilitas/detail', $data);
    }

    public function createfasilitas()
    {
        $data = [
            'title' => 'Management Lab | Create Fasilitas',
            'validation' => \Config\Services::validation(),
            'list_lab' => $this->labModel->findAll(),
            'nav' => 'fasilitas',
        ];
        // dd($data);
        return view('admin/fasilitas/create', $data);
    }

    public function savefasilitas()
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'nama barang harus diisi',
                    'min_length' => '{field} minimal 3 huruf'
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
            return redirect()->to('/admin/createfasilitas')->withInput()->with('validation', $validation);
        }

        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_lab' => $this->request->getVar('id_lab'),
            'quantity' => $this->request->getVar('quantity')
        ];
        // dd($data);
        $this->fasilitasModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/managefasilitas');
    }

    public function editfasilitas($id)
    {

        $data = [
            'title' => 'Management Lab | Edit Fasilitas',
            'validation' => \Config\Services::validation(),
            'list' => $this->fasilitasModel->getFasilitas()->where('id_barang', $id)->first(),
            'list_lab' => $this->labModel->findAll(),
            'nav' => 'fasilitas',
        ];
        // dd($data);
        return view('admin/fasilitas/edit', $data);
    }

    public function updatefasilitas($id)
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 3 huruf'
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
            return redirect()->to('/admin/editfasilitas/' . $id)->withInput()->with('validation', $validation);
        }
        $data = [
            'id_barang' => $id,
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_lab' => $this->request->getVar('id_lab'),
            'quantity' => $this->request->getVar('quantity')
        ];
        // dd($data);

        $this->fasilitasModel->save($data);

        session()->setFlashdata('pesan', 'data berhasil diubah');
        return redirect()->to('/admin/detailfasilitas/' . $id);
    }

    public function deletefasilitas($id)
    {
        // $this->labModel->where('id_lab', $id)->delete();
        $this->fasilitasModel->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('/admin/managefasilitas');
    }

    public function managereservasi()
    {
        $data = [
            'title' => 'Management Lab | Edit Fasilitas',
            'nav' => 'reservasi',
        ];
        dd($data);
        return view('admin/fasilitas/edit', $data);
    }
}
