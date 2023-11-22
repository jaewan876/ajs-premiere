<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cart extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Cart',
        ];

        return view('pages/shop/cart', $data);
    }
}
