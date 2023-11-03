<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Home',
            'products' => $this->productModel->find(),
        ];

        return view('index', $data);
    }
}
