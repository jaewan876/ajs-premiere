<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Orders extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Orders',
            'orders' => [],
        ];

        return view('admin/orders/list', $data);
    }
}
