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

    public function create() {
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
            $data = ['karyawan' => $this->KaryawanModel->getKaryawan($id)];
            
            return view('karyawan/edit', $data);
        }
        
        public function update($id)
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
            
            return redirect()->to('karyawan/' . $this->request->getVar('id'));
        }
        
        
    }
    