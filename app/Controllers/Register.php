<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Register'
        ];

        return view('index', $data);
    }
}
