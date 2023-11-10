<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\CustomerModel;

class Login extends BaseController
{
    protected $userModel;
    protected $customerModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('pages/auth/login', $data);
    }

    public function handle()
    {
        // process logins

        $rules = [
            'email' => [
                'label' => 'Email', 
                'rules' => 'required|valid_email',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
            ],
        ];

        if(! $this->validate($rules))
        {
            return redirect()->to(base_url('login'))->withInput()->with('error', $this->validator->listErrors());
        }
        else
        {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $data = [
               'email' => $email
            ];

            $user = $this->userModel->where($data)->find();
            $customer = $this->customerModel->where($data)->find();

            if($customer)
            {
               $isValid = password_verify($password, $customer[0]['password']);

               if($isValid)
               {
                    $user_session = [
                        'customer_id' => $customer[0]['customer_id'],
                        'email' => $customer[0]['email'],
                        'firstname' => $customer[0]['firstname'],
                        'lastname' => $customer[0]['firstname'],
                        'role' => $customer[0]['type'],
                        'isCustomer' => true,
                        'isLoggedIn' => true,
                    ];

                    $this->session->set($user_session);

                    return redirect()->to('customer');
                }
               else
               {
                  return redirect()->to('login')->withInput()->with('error', 'Unable to log you in. Please check your password.');
               }
            }

            if($user)
            {
               $isValid = password_verify($password, $user[0]['password']);

               if($isValid)
               {
                    $user_session = [
                        'user_id' => $user[0]['user_id'],
                        'email' => $user[0]['email'],
                        'firstname' => $user[0]['firstname'],
                        'lastname' => $user[0]['firstname'],
                        'role' => $user[0]['role'],
                        'isAdmin' => true,
                        'isLoggedIn' => true,
                    ];

                    $this->session->set($user_session);

                    return redirect()->to('admin');
                }
               else
               {
                  return redirect()->to('login')->withInput()->with('error', 'Unable to log you in. Please check your password.');
               }
            }
            
            return redirect()->to('login')->withInput()->with('error', 'Login failed. Please check your credentials.');
        }
    }
}
