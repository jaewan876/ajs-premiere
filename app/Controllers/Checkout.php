<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CartModel;
use App\Models\CartItemModel;
use App\Models\ProductModel;

use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\OrderStatusModel;
use App\Models\PaymentModel;

class Checkout extends BaseController
{
    protected $cartModel;
    protected $cartItemModel;
    protected $productModel;

    protected $orderModel;
    protected $orderItemModel;
    protected $statusModel;
    protected $paymentModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->cartItemModel = new CartItemModel();
        $this->productModel = new ProductModel();

        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
        $this->statusModel = new OrderStatusModel();
        $this->paymentModel = new PaymentModel();
    }

    public function index()
    {
        $cart = $items = [];
        $subtotal = $total = $quantity = 0;

        if (session()->has('customer_id')) {

            $item_subtotal = $item_quantity = [];

            $cart = $this->cartModel->where(['customer_id' => session()->get('customer_id')])->find();

            if($cart){
                $items = $this->cartItemModel->find_products(['cart_id' => $cart[0]['cart_id']]);

                foreach ($items as $key => $value) {
                    $item_subtotal[] = ($value['item_qty'] * $value['item_price']);
                    $item_quantity[] = $value['item_qty'];
                }
            }
            

            // quantity
            $quantity = array_sum($item_quantity);

            // subtotal
            $subtotal = array_sum($item_subtotal);

            // total
            // TODO: calculate (subtotal + tax) - discount
            $total = array_sum($item_subtotal);
        }

        $data = [
            'title' => 'Checkout',
            'cart' => $cart,
            'items' => $items,
            'quantity' => $quantity,
            'subtotal' => $subtotal,
            'total' => $total,
        ];

        return view('pages/shop/checkout', $data);
    }

    public function store(){

    }

    public function create_order()
    {
        $items = [];

        if (session()->has('customer_id')) {

            $cart = $this->cartModel->where(['customer_id' => session()->get('customer_id')])->find();

            $cart_id = $cart[0]['cart_id'];

            // create order 
            $create_order = [
                'customer_id' => $this->request->getPost('customer_id'),
                'order_tax' => $this->request->getPost('tax'),
                'order_discount' => $this->request->getPost('discount'),
                'order_quantity' => $this->request->getPost('quantity'),
                'order_subtotal' => $this->request->getPost('subtotal'),
                'order_total' => $this->request->getPost('total'),
                'order_status' => 'new',
                'order_is_paid' => $this->request->getPost('is_paid'),
            ];

            $this->orderModel->insert($create_order); 

            $order_id = $this->orderModel->getInsertID();

            // create order status
            $create_status = [
                'order_id' => $order_id,
                'status_name' => 'new',
                'status_description' => '',
            ];

            $this->statusModel->insert($create_status); 

            // create payment
            $create_payment = [
                'order_id' => $order_id,
                'payment_method' => $this->request->getPost('payment_method'),
                'payment_amount' => $this->request->getPost('total'),
            ];

            $this->paymentModel->insert($create_payment); 

            $items = $this->cartItemModel->find_products(['cart_id' => $cart_id]);

            foreach ($items as $key => $value) {

                $create_items = [
                    'order_id' => $order_id,
                    'product_id' => $value['product_id'],
                    'item_qty' => $value['item_qty'],
                    'item_price' => $value['item_price'],
                    'item_total' => ($value['item_qty'] * $value['item_price']),
                ];

                // insert item
                $this->orderItemModel->insert($create_items);
            }

            // delete cart
            $this->cartItemModel->where('cart_id', $cart_id)->delete();

            return redirect()->to(base_url('account/orders/'.$order_id));
        }

        // redirect
        return redirect()->to($this->request->getPost('redirect_success'));
    }
}
