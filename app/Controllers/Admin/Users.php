<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'System Administrators',
            'users' => $this->userModel->find(),
        ];

        return view('admin/users/admin/list', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add New Admin',
        ];

        return view('admin/users/admin/add', $data);
    }

    public function store()
    {
        $rules = [
            'firstname' => [
                'label' => 'Firstname',
                'rules' => 'max_length[255]'
            ],
            'lastname' => [
                'label' => 'Lastname',
                'rules' => 'max_length[255]'
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]|max_length[255]'
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]|is_unique[customers.email]|max_length[255]'
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[4]|max_length[255]'
            ],
            'password_confirm' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]|min_length[4]|max_length[255]'
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required|max_length[255]'
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

            $user = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => $password,
                'firstname' => $this->request->getPost('firstname'),
                'lastname' => $this->request->getPost('lastname'),
                'role' => $this->request->getPost('role'),
                'active' => 1,
            ];

            // print_r($user);

            $this->userModel->insert($user);

            $redirect = $this->request->getPost('redirect_success');
        }

        return redirect()->to($redirect)->with('success', 'Customer Added');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Admin',
            'user' => $this->userModel->find($id),
        ];

        return view('admin/users/admin/edit', $data);
    }

    public function update($id = null)
    {
        $rules = [
            'firstname' => [
                'label' => 'Firstname',
                'rules' => 'max_length[255]'
            ],
            'lastname' => [
                'label' => 'Lastname',
                'rules' => 'max_length[255]'
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username,user_id,{id}]|max_length[255]'
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email,user_id,{id}]|max_length[255]'
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required|max_length[255]'
            ],
        ];

        if(! $this->validate($rules))
        {
            $redirect = $this->request->getPost('redirect_error');

            return redirect()->to($redirect)->withInput()->with('error', $this->validator->listErrors());
        }
        else
        {
            $user = [
                'user_id' => $id,
                'email' => $this->request->getPost('email'),
                'firstname' => $this->request->getPost('firstname'),
                'lastname' => $this->request->getPost('lastname'),
                'role' => $this->request->getPost('role'),
            ];

            // print_r($user);

            $this->userModel->save($user);

            $redirect = $this->request->getPost('redirect_success');
        }

        return redirect()->to($redirect)->with('success', 'Customer Added');
    }
    
    public function delete($id = null)
    {
        //
    }
}
