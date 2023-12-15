<?php

namespace App\Controllers\Account;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        return view('customer/dashboard', $data);
    }
}
