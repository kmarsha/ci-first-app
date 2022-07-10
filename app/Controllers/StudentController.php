<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\StudentModel;

class StudentController extends BaseController
{
    public function __construct() {
        $this->modelStudent = new StudentModel();
        $this->modelUser = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Students',
            'page' => 'student',
            'content' => 'student/v_index',
            'students' => $this->modelStudent->getData(),
        ];

        return view('layouts/v_wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Student',
            'page' => 'student',
            'content' => 'student/v_create',
        ];

        return view('layouts/v_wrapper', $data);
    }

    public function store()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $dataUser = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'student',
        ];

        $this->modelUser->storeData($dataUser);

        $datastudent = [
            'username' => $username,
            'nis' => $this->request->getPost('nis'),
            'name' => $this->request->getPost('name'),
            'prog' => $this->request->getPost('prog'),
            'tingkat' => $this->request->getPost('tingkat'),
        ];

        $this->modelStudent->storeData($datastudent);

        return redirect()->to('/student')->with('success', 'Berhasil Menambahkan Data student');
    }

    public function edit($username)
    {
        $student = $this->modelStudent->getDataUser($username)->getResult();

        $data = [
            'title' => 'Edit Student',
            'page' => 'student',
            'content' => 'student/v_edit',
            'student' => $student,
        ];

        return view('layouts/v_wrapper', $data);
    }

    public function update($username)
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $dataUser = [
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $this->modelUser->updateData($dataUser, $username);

        $datastudent = [
            'username' => $username,
            'nis' => $this->request->getPost('nis'),
            'name' => $this->request->getPost('name'),
            'prog' => $this->request->getPost('prog'),
            'tingkat' => $this->request->getPost('tingkat'),
        ];

        $this->modelStudent->updateData($datastudent, $username);

        return redirect()->to('/student')->with('success', 'Berhasil Ubah Data student');
    }

    public function destroy($username)
    {
        $this->modelStudent->deleteData($username);
        $this->modelUser->deleteData($username);

        return redirect()->to('/student')->with('success', 'Berhasil Hapus Data student');
    }
}
