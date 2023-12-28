<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\CategoryModel;

class Category extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Categories',
            'categories' => $this->categoryModel->find(),
        ];

        return view('admin/category/list', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Category'
        ];

        return view('admin/category/add', $data);
    }

    public function store()
    {
        $rules = [
            'name' => [
                'label' => 'Name',
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
            $name = $this->request->getPost('name');
            $slug = url_title($name, '-', true);

            $category = [
                'category_name' => $name,
                'category_description' => $this->request->getPost('description'),
                'category_slug' => $slug,
            ];

            // print_r($category);

            $this->categoryModel->insert($category);

            $redirect = $this->request->getPost('redirect_success');
        }

        return redirect()->to($redirect)->with('success', 'Category created');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Category',
            'category' => $this->categoryModel->find($id),
        ];

        return view('admin/category/edit', $data);
    }

    public function update($id = null)
    {
        $rules = [
            'name' => [
                'label' => 'Name',
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
            $name = $this->request->getPost('name');
            $slug = url_title($name, '-', true);

            $category = [
                'category_id' => $id,
                'category_name' => $name,
                'category_description' => $this->request->getPost('description'),
                'category_slug' => $slug,
            ];

            $this->categoryModel->save($category);

            $redirect = $this->request->getPost('redirect_success');
        }

        return redirect()->to($redirect)->with('success', 'Category updated');
    }

    public function delete($id = null)
    {
        $this->categoryModel->delete($id);

        return redirect()->to($this->request->getPost('redirect_success'));
    }
}
