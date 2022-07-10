<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function auth()
    {
        $data = [
            'title' => 'Login',
            'page' => 'home',
            'content' => 'auth/login_view'
        ];

        $rules = [
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|matches[password]'
        ];

        if ($this->request->getMethod() == 'get') {
            helper('form');
            return view('layouts/v_wrapper', $data);
        } elseif ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                helper('form');

                $modelUser = new UserModel();

                $user = $modelUser->where('username', $this->request->getPost('username'))->first();

                $verify_pass = password_verify($this->request->getPost('password'), $user['password']);

                if ($verify_pass) {
                    $data_session = [
                        'isLogin' => true,
                        'username' => $this->request->getPost('username'),
                        'role' => $user['role']
                    ];
    
                    session()->set($data_session);
                    
                    return redirect()->to('/employee')->with('success', 'Berhasil login');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Password salah');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal Login. Cek kembali inputan Anda');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Berhasil logout');
    }
}
