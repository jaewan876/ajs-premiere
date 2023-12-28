<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Products extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Products',
            'products' => $this->productModel->find(),
        ];

        return view('admin/products/list', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Product',
            'categories' => $this->categoryModel->find(),
        ];

        return view('admin/products/add', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Product',
            'product' => $this->productModel->find($id),
            'categories' => $this->categoryModel->find(),
        ];

        return view('admin/products/edit', $data);
    }

    public function store()
    {
        $data = [
            
        ];

        $rules = [
            'name' => [
                'label' => 'Name',
                'rules' => 'required'
            ],
            // 'content' => [
            //     'label' => 'About',
            //     'rules' => 'required'
            // ],
            'category' => [
                'label' => 'Category',
                'rules' => 'required'
            ],
            'price' => [
                'label' => 'Price',
                'rules' => 'required|decimal'
            ],
            // 'phone' => [
            //     'label' => 'Phone',
            //     'rules' => 'required'
            // ],
            // 'address' => [
            //     'label' => 'Address',
            //     'rules' => 'required'
            // ],
            'image' => [
                'label' => 'Logo',
                'rules' => 'uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]'
                    // . '|max_size[image,100]'
                    // . '|max_dims[image,1000,1000]',
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

            $file = $this->request->getFile('image');

            if(! $file->hasMoved())
            {
                $filepath = 'images/';

                $filename = $file->getRandomName();

                $file->move($filepath, $filename);

                $path = $filepath . $filename;

                $product = [
                    'name' => $name,
                    'description' => $this->request->getPost('description'),
                    'price' => $this->request->getPost('price'),
                    'sku' => $this->request->getPost('sku'),
                    'slug' => $slug,
                    'image' => $path,
                    'publish' => $this->request->getPost('publish'),
                    'in_stock' => $this->request->getPost('in_stock'),
                    'max_item_limit' => $this->request->getPost('max_item_limit'),
                    'category_id' => $this->request->getPost('category'),
                ];

                $this->productModel->insert($product);
            }

            $redirect = $this->request->getPost('redirect_success');
        }

        return redirect()->to($redirect)->with('success', 'Client created');
    }

    public function update($id = null)
    {
        $data = [
            
        ];

        $rules = [
            'name' => [
                'label' => 'Name',
                'rules' => 'required'
            ],
            // 'content' => [
            //     'label' => 'About',
            //     'rules' => 'required'
            // ],
            'category' => [
                'label' => 'Category',
                'rules' => 'required'
            ],
            'price' => [
                'label' => 'Price',
                'rules' => 'required|decimal'
            ],
            // 'phone' => [
            //     'label' => 'Phone',
            //     'rules' => 'required'
            // ],
            // 'address' => [
            //     'label' => 'Address',
            //     'rules' => 'required'
            // ],
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

            $product = [
                'product_id' => $id,
                'name' => $name,
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'sku' => $this->request->getPost('sku'),
                'slug' => $slug,
                'publish' => $this->request->getPost('publish'),
                'in_stock' => $this->request->getPost('in_stock'),
                'max_item_limit' => $this->request->getPost('max_item_limit'),
                'category_id' => $this->request->getPost('category'),
            ];

            $this->productModel->save($product);

            $redirect = $this->request->getPost('redirect_success');
        }

        return redirect()->to($redirect)->with('success', 'Client created');
    }

    public function delete($id = null)
    {
        $item = $this->productModel->find($id);

        if ($item) {
            // print_r($item);

            if (!empty($item['image'])) {
                // unlink(base_url($item['image']));

                echo "delete image";
            }

            $this->productModel->delete($id);
        }

        return redirect()->to($this->request->getPost('redirect_success'));
    }
}
