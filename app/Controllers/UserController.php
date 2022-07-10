<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function __construct() {
        $this->model = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Users',
            'page' => 'user',
            'content' => 'user/v_index',
            'users' => $this->model->getData(),
        ];

        //join

        return view('layouts/v_wrapper', $data);
    }
}
