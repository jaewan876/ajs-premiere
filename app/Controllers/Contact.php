<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Contact Us'
        ];

        return view('pages/contact', $data);
    }
}
