<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function auth()
    {
        $data = [
            'title' => 'Register',
            'page' => 'home',
            'content' => 'auth/reg_view'
        ];

        $rules = [
            'name' => 'required',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required'
        ];


        if ($this->request->getMethod() == 'get') {
            helper('form');
            return view('layouts/v_wrapper', $data);
        } elseif ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                helper('form');
                
                $modelUser = new UserModel();
            
                $modelUser->save([
                    'username' => $this->request->getPost('username'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                    'role' => 'student',
                ]);

                $modelStudent = new StudentModel();

                $user_id = $modelUser->where(['username' => $this->request->getPost('username')])->first();

                $modelStudent->save([
                    'name' => $this->request->getPost('name'),
                    'user_id' => $user_id['id'],
                ]);
       
                session()->setFlashdata('success', 'Registrasi Berhasil');
                return '<script>
                    window.location="/employee"
                </script>';
            } else {
                return redirect()->back()->withInput()->with('error', 'Registrasi Gagal');
            }
        }
    }
}
