<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peminjaman_lab';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'id_lab', 'waktu_awal', 'waktu_akhir', 'is_accept'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getData()
    {
        return $this->query('SELECT peminjaman_lab.*, laboratorium.nama_lab, user.nama FROM peminjaman_lab JOIN user ON user.id_user = peminjaman_lab.id_user JOIN laboratorium ON laboratorium.id_lab = peminjaman_lab.id_lab WHERE peminjaman_lab.waktu_awal >= CURDATE() AND peminjaman_lab.is_accept = "1"');
    }
    public function getDataAdmin()
    {
        return $this->query('SELECT peminjaman_lab.*, laboratorium.nama_lab, user.nama FROM peminjaman_lab JOIN user ON user.id_user = peminjaman_lab.id_user JOIN laboratorium ON laboratorium.id_lab = peminjaman_lab.id_lab WHERE peminjaman_lab.waktu_awal >= CURDATE()');
    }
    public function getDataUser($id)
    {
        return $this->query('SELECT peminjaman_lab.*, laboratorium.nama_lab, laboratorium.harga_lab, user.nama FROM peminjaman_lab JOIN user ON user.id_user = peminjaman_lab.id_user JOIN laboratorium ON laboratorium.id_lab = peminjaman_lab.id_lab WHERE peminjaman_lab.id_user = ' . $id . ' AND peminjaman_lab.waktu_awal >= CURDATE()');
    }
    public function getDataDash($key)
    {
        return $this->query('SELECT peminjaman_lab.*, laboratorium.nama_lab, user.nama FROM peminjaman_lab JOIN user ON user.id_user = peminjaman_lab.id_user JOIN laboratorium ON laboratorium.id_lab = peminjaman_lab.id_lab WHERE peminjaman_lab.waktu_awal >= CURDATE() AND peminjaman_lab.is_accept = "1" AND laboratorium.id_lab = "' . $key . '"');
    }
}
