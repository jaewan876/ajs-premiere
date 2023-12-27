<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\OrderStatusModel;
use App\Models\PaymentModel;

class Orders extends BaseController
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
        $orders = $this->orderModel->find();

        $data = [
            'title' => 'All Orders',
            'orders' => $orders,
        ];

        return view('admin/orders/list', $data);
    }

    public function show($order_id = null)
    {
        if ($order_id == null) {
            // show 404 page
        }

        $orders = $this->orderModel->find($order_id);
        $items = $this->orderItemModel->find_products(['order_id' => $order_id]);

        $data = [
            'title' => 'Order #'.$order_id,
            'orders' => $orders,
            'items' => $items,
        ];

        return view('admin/orders/show', $data);
    }
}
