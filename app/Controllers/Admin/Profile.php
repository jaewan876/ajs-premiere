<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'user' => $this->userModel->find(session()->get('user_id')) ?? []
        ];

        return view('admin/profile/edit', $data);
    }

    public function update_email($id = null)
    {
        $rules = [
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email,user_id,{id}]'
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

            $user = [
                'user_id' => $id,
                'email' => $email,
            ];

            $this->userModel->save($user);

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

            $user = [
                'user_id' => $this->request->getPost('user_id'),
                'firstname' => $firstname,
                'lastname' => $this->request->getPost('lastname'),
            ];

            $this->userModel->save($user);

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
                'user_id' => $this->request->getPost('user_id'),
            ];

            $user = $this->userModel->where($data)->find();

            if(! $user){
                return redirect()->to($redirect)->withInput()->with('password_error', 'Failed to update - no user');
            }

            $isValid = password_verify($this->request->getPost('prev_password'), $user[0]['password']);

            if(! $isValid){
                return redirect()->to($redirect)->withInput()->with('password_error', 'Previous password entered incorrectly');
            }

            $password = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);

            $user = [
                'user_id' => $this->request->getPost('user_id'),
                'password' => $password,
            ];

            $this->userModel->save($user);

            return redirect()->to($this->request->getPost('redirect_success'));
        }
    }
}
