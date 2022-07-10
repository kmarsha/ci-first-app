<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function coba()
    {
        return view('coba');
    }
    
    public function test()
    {
        $data = [
            'title' => 'Halaman Test',
            'content' => 'v_test'
        ];

        return view('layouts/v_wrapper', $data);
    }
}
