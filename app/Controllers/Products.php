<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Products extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Products'
        ];

        return view('pages/products/list', $data);
    }
}
