<?php

namespace App\Controllers\Account;

use App\Controllers\BaseController;

use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\OrderStatusModel;
use App\Models\PaymentModel;

class Dashboard extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;
    protected $statusModel;
    protected $paymentModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
        $this->statusModel = new OrderStatusModel();
        $this->paymentModel = new PaymentModel();
    }
    
    public function index()
    {
        $orders = $items = [];
        $customer_id = session()->get('customer_id');

        $orders = $this->orderModel->where(['customer_id' => $customer_id])->find();

        if($orders){
            $items = $this->orderItemModel->find_products(['order_id' => $orders[0]['order_id']]);
        }
        

        $data = [
            'title' => 'Dashboard',
            'orders' => $orders,
            'items' => $items,
        ];

        return view('customer/dashboard', $data);
    }
}
