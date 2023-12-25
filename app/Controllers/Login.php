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

            if(! $user){
                $user = $this->customerModel->where($data)->find();
            }

            // -- Debug
            // print_r($user);

            if($user)
            {
                $password_check = password_verify($password, $user[0]['password']);

                if($password_check)
                {
                    echo "password";
                    $redirect_url = "admin";

                    $user_session = [
                        'role' => $user[0]['role'],
                        'email' => $user[0]['email'],
                        'firstname' => $user[0]['firstname'],
                        'lastname' => $user[0]['firstname'],
                        'isLoggedIn' => true,
                    ];

                    if($user[0]['role'] != 'admin'){
                        $redirect_url = "account";
                        $user_session['customer_id'] = $user[0]['customer_id'];
                    }else{
                        $user_session['user_id'] = $user[0]['user_id'];
                        $user_session['isAdmin'] = true;
                    }

                    $this->session->set($user_session);

                    if($this->request->getPost('redirect')){
                        return redirect()->to($this->request->getPost('redirect'));
                    }

                    return redirect()->to($redirect_url);
                }
               else
               {
                echo "failed";
                  return redirect()->to($this->request->getPost('redirect_error'))->withInput()->with('error', 'Unable to log you in. Please check your password.');
               }
            }
            
            return redirect()->to($this->request->getPost('redirect_error'))->withInput()->with('error', 'Login failed. Please check your credentials.');
        }
    }
}
