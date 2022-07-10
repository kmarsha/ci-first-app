<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function __construct() {
        $this->modelAdmin = new AdminModel();
        $this->modelUser = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admins',
            'page' => 'admin',
            'content' => 'admin/v_index',
            'admins' => $this->modelAdmin->getData(),
        ];

        return view('layouts/v_wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Admin',
            'page' => 'admin',
            'content' => 'admin/v_create',
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
            'role' => 'admin',
        ];

        $this->modelUser->storeData($dataUser);

        $dataAdmin = [
            'username' => $username,
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('usia'),
        ];

        $this->modelAdmin->storeData($dataAdmin);

        return redirect()->to('/admin')->with('success', 'Berhasil Menambahkan Data Admin');
    }

    public function edit($username)
    {
        $user = $this->modelAdmin->getDataUser($username)->getResult();

        $data = [
            'title' => 'Edit Admin',
            'page' => 'admin',
            'content' => 'admin/v_edit',
            'user' => $user,
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

        $dataAdmin = [
            'username' => $username,
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('usia'),
        ];

        $this->modelAdmin->updateData($dataAdmin, $username);

        return redirect()->to('/admin')->with('success', 'Berhasil Ubah Data Admin');
    }

    public function destroy($username)
    {
        $this->modelAdmin->deleteData($username);
        $this->modelUser->deleteData($username);

        return redirect()->to('/admin')->with('success', 'Berhasil Hapus Data Admin');
    }
}
