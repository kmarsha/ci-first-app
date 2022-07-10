<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{
    public function index()
    {
        $model = new EmployeeModel;
        $data['title'] = 'Data Vaksin Karyawan';
        $data['page'] = 'employee';
        $data['content'] = 'employee/v_index';
        $data['getKaryawan'] = $model->getKaryawan();

        return view('layouts/v_wrapper', $data);
    }

    public function add()
    {
        $model = new EmployeeModel;
        $data = [
            'nama_karyawan' => $this->request->getPost('nama'),
            'usia' => $this->request->getPost('age'),
            'status_vaksin_1' => $this->request->getPost('vaksin1'),
            'status_vaksin_2' => $this->request->getPost('vaksin2'),
        ];
        $model->saveKaryawan($data);

        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        echo '<script>
                window.location="/employee"
            </script>';
    }

    public function edit($id)
    {
        $model = new EmployeeModel;
        $getKaryawan = $model->getKaryawan($id)->getRow();
        if (isset($getKaryawan)) {
            $data['employee'] = $getKaryawan;
            $data['title'] = 'Edit Data';
            $data['content'] = 'employee/v_edit';
            $data['page'] = 'employee';

            return view('layouts/v_wrapper', $data);
        } else {
            echo '<script>
                    window.location="/employee"
                </script>';
        }
    }

    public function update($id)
    {
        $model = new EmployeeModel;
        // $id = $this->request->getPost('id');
        $data = [
            'nama_karyawan' => $this->request->getPost('nama'),
            'usia' => $this->request->getPost('age'),
            'status_vaksin_1' => $this->request->getPost('vaksin1'),
            'status_vaksin_2' => $this->request->getPost('vaksin2'),
        ];
        $model->editKaryawan($data, $id);
        
        session()->setFlashdata('success', 'Data berhasil diubah');
        echo '<script>
                window.location="/employee"
            </script>';
    }

    public function hapus($id)
    {
        $model = new EmployeeModel();
        $getKaryawan = $model->getKaryawan($id)->getRow();

        if (isset($getKaryawan)) {
            $model->hapusKaryawan($id);

            session()->setFlashdata('success', 'Data berhasil dihapus');
            echo "<script>
                window.location='/employee';
            </script>";
        } else {
            echo '<script>
                alert("Gagal Menghapus !, ID karyawan ' . $id . ' Tidak ditemukan");
                window.location="/employee";
            </script>';
        }
    }
}
