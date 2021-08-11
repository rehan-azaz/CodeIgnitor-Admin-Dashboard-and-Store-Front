<?php
class Checkout extends CI_Controller{
    function  __construct(){
        parent::__construct();

        $this->load->library('cart');

        $this->load->model('product_model');
    }

    public function index(){
        if($this->cart->total_items() <= 0){
            redirect(base_url().'products');
        }
        else{
            $data['cartItems'] = $this->cart->contents();
            $title['title'] = "Checkout | Shopify";
            $this->load->view('templates/header', $title);
            $this->load->view('pages/navbar');
            $this->load->view('pages/checkout', $data);
            $this->load->view('templates/footer');
        }
    }
    public function placeOrder(){
        $cartItems = $this->cart->contents();
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $totalPrice += intval($cartItem['price']) * intval($cartItem['qty']);
        }
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $country = $this->input->post('country');
        $zipcode = $this->input->post('zipcode');
        $order = array(
            'total_price' => $totalPrice,
            'name' => $name,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'zip_code' => $zipcode,
            'created' => date('Y-m-d')
        );
        $this->load->model('order_model');
        $orderId =  $this->order_model->placeOrder($order);
        $orderDetails = array();
        foreach($cartItems as $cartItem) {
            $orderDetails['order_id'] = $orderId;
            $orderDetails['product_id'] = $cartItem['id'];
            $orderDetails['name'] = $name;
            $orderDetails['unit_price'] = $cartItem['price'];
            $orderDetails['quantity'] = $cartItem['qty'];
            $orderDetails['total_price'] = $cartItem['price'] * $cartItem['qty'];
            $this->order_model->insertOrderDetails($orderDetails);
            $this->cart->destroy();
        }
        redirect(base_url());
    }
}