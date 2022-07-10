<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TestController extends BaseController
{
    public function index()
    {
        $data['title'] = 'CI 4 Tutorial';
        $data['msg'] = 'Codeigniter CRUD';

        return view('test_view', $data);
    }
}
