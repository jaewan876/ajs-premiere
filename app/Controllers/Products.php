<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ProductModel;
use App\Models\CategoryModel;

use App\Models\CartModel;
use App\Models\CartItemModel;

class Products extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $cartModel;
    protected $cartItemModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->cartModel = new CartModel();
        $this->cartItemModel = new CartItemModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Products',
            'products' => $this->productModel->find(),
        ];

        return view('pages/products/list', $data);
    }

    public function show($id = null, $slug = null)
    {
        $cart_items = [];

        $product = $this->productModel->find($id);

        $cart = $this->cartModel->where(['customer_id' => session()->get('customer_id')])->find();

        if ($cart) {
            $cart_items = $this->cartItemModel->where(['cart_id' => $cart[0]['cart_id'], 'product_id' => $id])->find();
        }

        $data = [
            'title' => $product['name'] ?? 'Not Available',
            'product' => $product,
            'customer' => [],
            'cart_items' => $cart_items,
        ];

        return view('pages/products/view', $data);
    }
}
