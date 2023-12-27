<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;

class Dashboard extends BaseController
{
    protected $orderModel;
    protected $productModel;
    protected $customerModel;
    // protected $paymentModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
        $this->customerModel = new CustomerModel();
        // $this->paymentModel = new PaymentModel();
    }

    public function index()
    {
        $orders = $this->orderModel->find();
        $products = $this->productModel->find();
        $customers = $this->customerModel->find();

        $stats = [
            'earnings' => 0,
            'orders' => count($orders) ?? 0,
            'products' => count($products) ?? 0,
            'customers' => count($customers) ?? 0,
        ];

        $data = [
            'title' => 'Dashboard',
            'stats' => $stats,
        ];

        return view('admin/dashboard', $data);
    }
}
