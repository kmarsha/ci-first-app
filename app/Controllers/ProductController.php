<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected $model;

    public function __construct() {
        $this->model = new ProductModel();
    }

    public function index()
    {
        $data  = [
            'title' => 'List Product',
            'page' => 'product',
            'content' => 'product/v_index',
            'products' => $this->model->getData(),
        ];
        return view('layouts/v_wrapper', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create New Product',
            'page' => 'product',
            'content' => 'product/v_create',
        ];
        return view('layouts/v_wrapper', $data);
    }

    public function store()
    {
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'product_deskripsi' => $this->request->getPost('product_deskripsi'),
        ];
        
        $this->model->createData($data);

        return redirect()->to('/product')->with('success', 'Berhasil Tambah Data Produk!');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product',
            'page' => 'product',
            'content' => 'product/v_edit',
            'product' => $this->model->getData($id),
        ];

        return  view('layouts/v_wrapper', $data);
    }

    public function update($id)
    {
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'product_deskripsi' => $this->request->getPost('product_deskripsi'),
        ];

        $this->model->updateData($data, $id);

        return redirect()->to('/product')->with('success', 'Berhasil Update Data Produk!');
    }

    public function destroy($id)
    {
        $this->model->getData($id);
        $this->model->deleteData($id);

        return redirect()->to('/product')->with('success', 'Berhasil Hapus Data!');
    }
}
