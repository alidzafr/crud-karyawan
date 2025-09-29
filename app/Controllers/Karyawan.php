<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    protected $KaryawanModel;

    public function __construct()
    {
        $this->KaryawanModel = new KaryawanModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM karyawan");
        $result = $query->getResultArray();
        // dd($result);
        $data = [
            'karyawan' => $result
        ];

        return view('karyawan/index', $data);
    }

    public function create()
    {
        return view('karyawan/create');
    }

    public function store()
    {
        $tempstatus = false;
        if ($this->request->getVar('status') == '1') {
            $tempStatus = true;
        } else {
            $tempStatus = false;
        };

        $this->KaryawanModel->save([
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'status' => $tempstatus,
        ]);

        // $tempArr = [
        // $nama = $this->request->getVar('nama'),
        // $jabatan = $this->request->getVar('jabatan'),
        // $tanggal_masuk = $this->request->getVar('tanggal_masuk'),
        // $status = $tempstatus
        // ];

        // dd($tempArr);

        return redirect()->to('/');
    }

    public function detail($id)
    {
        $data = ['karyawan' => $this->KaryawanModel->getKaryawan($id)];

        if (empty($data['karyawan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul karyawan ' . $id . ' tidak ditemukan');
        }

        return view('karyawan/detail', $data);
    }

    public function delete($id)
    {
        $this->KaryawanModel->delete($id);

        return redirect()->to('/');
    }

    public function edit($id)
    {
        $data = [
            'karyawan' => $this->KaryawanModel->getKaryawan($id),
            'validation' => \Config\Services::validation()
        ];

        return view('karyawan/edit', $data);
    }

    public function update($id)
    {
        // Jika validasi gagal, kembali dengan message validasi
        $rules = [
            'nama'   => 'required|min_length[3]',
            'jabatan' => 'required',
            'status' => 'required',
            'tanggal_masuk' => [
                'rules' => 'required|valid_date[Y-m-d]',
                // 'errors' => ['check_tanggal' => 'Tanggal tidak boleh lebih dari hari ini.']
            ]
        ];

        if (! $this->validate($rules)) {
            return view('karyawan/edit', [
                'validation' => $this->validator,
                'karyawan'      => $this->KaryawanModel->find($id),
            ]);
        }

        $this->KaryawanModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'status' => $this->request->getVar('status')
        ]);

        return redirect()->to('/');
    }

    // public function check_tanggal(string $str, string $fields, array $data): bool
    // {
    //     $inputDate = strtotime($str);
    //     $today     = strtotime(date('Y-m-d'));

    //     return $inputDate <= $today; // true kalau tanggal <= hari ini
    // }
}
