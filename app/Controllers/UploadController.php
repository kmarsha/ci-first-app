<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UploadModel;

class UploadController extends BaseController
{
    public function __construct() {
        $this->model = new UploadModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Files Uploaded',
            'page' => 'file',
            'content' => 'upload/v_index',
            'files' => $this->model->getData(),
        ];

        return view('layouts/v_wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Upload Files',
            'page' => 'file',
            'content' => 'upload/v_create',
        ];

        return view('layouts/v_wrapper', $data);
    }

    public function store()
    {
        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ]
        ]);

        if ($validated) {
            $file = $this->request->getFile('file');
            $file->move('img/uploads', $file->getClientName());

            $data = [
                'name' => $file->getClientName(),
                'type' => $file->getClientMimeType(),
            ];

            $this->model->storeData($data);

            return redirect()->to('/files')->with('success', 'File has been uploaded');
        } else {
            return redirect()->back()->withInput()->with('error', 'Please select a valid file!');
        }
    }

    public function download($id)
    {
        $data = $this->model->getData($id);

        return $this->response->download('img/uploads/'.$data['name'], null);
    }
}
