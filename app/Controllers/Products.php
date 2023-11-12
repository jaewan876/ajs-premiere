<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Products extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Products',
            'products' => $this->productModel->find(),
        ];

        return view('pages/products/list', $data);
    }
}
