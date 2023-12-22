<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CartModel;
use App\Models\CartItemModel;
use App\Models\ProductModel;

class Cart extends BaseController
{
    protected $cartModel;
    protected $cartItemModel;
    protected $productModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->cartItemModel = new CartItemModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Cart',
            'items' => $this->cartItemModel->where([])->find(),
        ];

        return view('pages/shop/cart', $data);
    }

    public function store()
    {
        $query = '';
        $redirect_uri = '';

        if (! session()->get('isLoggedIn')) {
            // redirect to login

            if($this->request->getPost('redirect')){
                $query = $this->request->getPost('redirect');
                $redirect_uri = base_url('login') . "?redirect=${query}";
            }

            return redirect()->to($redirect_uri);
        }

        $redirect_uri = $this->request->getPost('redirect_success');

        $customer_id = session()->get('customer_id') ?? null;

        $cartData = ['customer_id' => $customer_id];

        $cart = $this->cartModel->where($cartData)->find(); // print_r($cart);

        if($cart){
            $cart_id = $cart[0]['cart_id'];

            // check items
            $items = $this->cartItemModel->where(['cart_id' => $cart_id])->find();

            if($items){
                $addItem = [];

                $addItem = [
                    'cart_id' => $cart_id,
                    'product_id' => $this->request->getPost('product'),
                    'item_qty' => $this->request->getPost('quantity'),
                    'item_price' => $this->request->getPost('price'),
                ];

                foreach ($items as $key => $value) {
                    if($value['product_id'] == $this->request->getPost('product'))
                    {
                        $addItem = [
                            'item_id' => $value['item_id'],
                            'item_qty' => ($value['item_qty'] + $this->request->getPost('quantity')),
                        ];
                    }
                }

                // insert item data
                $this->cartItemModel->save($addItem); 
            }else{
              $addItem = [
                    'cart_id' => $cart_id,
                    'product_id' => $this->request->getPost('product'),
                    'item_qty' => $this->request->getPost('quantity'),
                    'item_price' => $this->request->getPost('price'),
                ];

                // insert item data
                $this->cartItemModel->insert($addItem);  
            }
        }
        else
        {
            // new cart data
            $addCart = [
                'customer_id' => $this->request->getPost('customer'),
                'cart_user_agent' => $this->request->getIPAddress(),
            ];

            // insert cart data
            $this->cartModel->insert($addCart);
            $cart_id = $this->cartModel->getInsertID();

            $addItems = [
                'cart_id' => $cart_id,
                'product_id' => $this->request->getPost('product'),
                'item_qty' => $this->request->getPost('quantity'),
                'item_price' => $this->request->getPost('price'),
            ];

            // insert item data
             $this->cartItemModel->insert($addItems);
        }

        return redirect()->to($redirect_uri);
    }

    public function update($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        //
    }

    public function remove($id = null)
    {
        $this->cartItemModel->where('item_id', $id)->delete();

        return redirect()->to($this->request->getPost('redirect_success'));
    }

    public function get_item()
    {
        $qty = 0;
        $total = 0;
        $item = [];

        if(session()->get('customer_id')){
            $cart = $this->cartModel->where(['customer_id' => session()->get('customer_id')])->find();
            $item = $this->cartItemModel->where(['cart_id' => $cart[0]['cart_id']])->find();

            foreach ($item as $key => $value) {
                $qty += $value['item_qty'];
                $total += ($value['item_price'] * $value['item_qty']);
            }
        }

        $data = [
            'quantity' => $qty,
            'total' => $total,
            'items' => $item,
        ];

        return $this->response->setJSON($data);
    }
}
