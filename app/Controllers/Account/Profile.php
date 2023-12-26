<?php

namespace App\Controllers\Account;

use App\Controllers\BaseController;

use App\Models\CustomerModel;

class Profile extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'user' => $this->customerModel->find(session()->get('customer_id')) ?? []
        ];

        return view('customer/profile', $data);
    }

    public function update_email($id = null)
    {
        $rules = [
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[customers.email,customer_id,{id}]'
            ], 
        ];

        if(! $this->validate($rules))
        {
            $redirect = $this->request->getPost('redirect_error');

            return redirect()->to($redirect)->withInput()->with('email_error', $this->validator->listErrors());
        }
        else
        {
            $email = $this->request->getPost('email');

            $customer = [
                'customer_id' => $id,
                'email' => $email,
            ];

            $this->customerModel->save($customer);

            $user_session = [
                'email' => $email,
            ];

            $this->session->set($user_session);

            return redirect()->to($this->request->getPost('redirect_success'));
        }
    }

    public function update_name()
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
        ];

        if(! $this->validate($rules))
        {
            $redirect = $this->request->getPost('redirect_error');

            return redirect()->to($redirect)->withInput()->with('name_error', $this->validator->listErrors());
        }
        else
        {
            $firstname = $this->request->getPost('firstname');

            $customer = [
                'customer_id' => $this->request->getPost('customer_id'),
                'firstname' => $firstname,
                'lastname' => $this->request->getPost('lastname'),
            ];

            $this->customerModel->save($customer);

            $user_session = [
                'firstname' => $firstname,
            ];

            $this->session->set($user_session);

            return redirect()->to($this->request->getPost('redirect_success'));
        }
    }

    public function update_password()
    {
        $rules = [
            'prev_password' => [
                'label' => 'Previous Password',
                'rules' => 'required|min_length[4]|max_length[255]'
            ],
            'new_password' => [
                'label' => 'New Password',
                'rules' => 'required|min_length[4]|max_length[255]'
            ],
            'confirm_password' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[new_password]|min_length[4]|max_length[255]'
            ],
        ];

        if(! $this->validate($rules))
        {
            $redirect = $this->request->getPost('redirect_error');

            return redirect()->to($redirect)->withInput()->with('password_error', $this->validator->listErrors());
        }
        else
        {
            $redirect = $this->request->getPost('redirect_error');

            $data = [
                'customer_id' => $this->request->getPost('customer_id'),
            ];

            $user = $this->customerModel->where($data)->find();

            if(! $user){
                return redirect()->to($redirect)->withInput()->with('password_error', 'Failed to update - no user');
            }

            $isValid = password_verify($this->request->getPost('prev_password'), $user[0]['password']);

            if(! $isValid){
                return redirect()->to($redirect)->withInput()->with('password_error', 'Previous password entered incorrectly');
            }

            $password = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);

            $customer = [
                'customer_id' => $this->request->getPost('customer_id'),
                'password' => $password,
            ];

            $this->customerModel->save($customer);

            return redirect()->to($this->request->getPost('redirect_success'));
        }
    }
}
