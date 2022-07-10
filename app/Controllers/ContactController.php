<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class ContactController extends BaseController
{
    public function __construct() {
        $this->model = new ContactModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Contact',
            'page' => 'contact',
            'content' => 'contact/v_index',
            'contacts' => $this->model->getData(),
        ];

        return view('layouts/v_wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'New Contact',
            'page' => 'contact',
            'content' => 'contact/v_create',
        ];

        return view('layouts/v_wrapper', $data);
    }

    public function store()
    {
        $this->model->storeData([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ]);

        if ($this->request->isAJAX()) {
            $data = [
                'success' => true,
                'msg' => 'Thanks for contact us. We get back to you',
            ];
            
            return $this->response->setJSON($data);
        } else {
            return redirect()->to('/contact')->with('success', 'Berhasil tambah kontak');
        }
    }
}
