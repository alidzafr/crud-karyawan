<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'jabatan', 'tanggal_masuk', 'status'];

    public function getKaryawan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

}
