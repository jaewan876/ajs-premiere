<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CustomerModel;

class Register extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Register'
        ];

        return view('pages/auth/signup', $data);
    }

    public function handle()
    {
        $rules = [
            'firstname' => [
                'label' => 'Firstname',
                'rules' => 'required|max_length[255]'
            ],
            'lastname' => [
                'label' => 'Lastname',
                'rules' => 'required|max_length[255]'
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[customers.email]|is_unique[users.email]|max_length[255]'
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[4]|max_length[255]'
            ],
            'password_confirm' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]|min_length[4]|max_length[255]'
            ],
        ];

        if(! $this->validate($rules))
        {
            $redirect = $this->request->getPost('redirect_error');

            return redirect()->to($redirect)->withInput()->with('error', $this->validator->listErrors());
        }
        else
        {
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $customer = [
                'email' => $this->request->getPost('email'),
                'password' => $password,
                'firstname' => $this->request->getPost('firstname'),
                'lastname' => $this->request->getPost('lastname'),
                'type' => 'customer',
            ];

            // print_r($customer);

            $this->customerModel->insert($customer);

            $redirect = $this->request->getPost('redirect_success');
        }

        return redirect()->to($redirect)->with('success', 'Customer Added');
    }
}
