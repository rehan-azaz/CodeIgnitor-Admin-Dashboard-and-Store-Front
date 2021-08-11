<?php
    class Cart extends CI_Controller{
        function  __construct(){
            parent::__construct();

            $this->load->library('cart');

            $this->load->model('product_model');
        }

        public function index(){
            $title['title'] = 'Cart | Shopify';
            $this->load->view('templates/header', $title);
            $this->load->view('pages/navbar');
            $data['cartItems'] = $this->cart->contents();
            $this->load->view('pages/cart', $data);
            $this->load->view('templates/footer');
        }

        public function addToCart(){

            $product_id = $this->input->get('product_id');
            $product = $this->product_model->getProduct($product_id);

            $data = array(
                'id' => $product_id,
                'qty' => 1,
                'price' => intval($product[0]->product_price),
                'name' => $product[0]->product_name,
                'options' => array('image' => base_url().unserialize($product[0]->product_image)[0]),
            );
            $this->cart->insert($data);
            redirect(base_url()."cart");
        }

        public function IncreaseItem(){
            $cartItems = $this->cart->contents();
            $rowid = $this->input->get('rowid');
            foreach ($cartItems as $cartItem){
                if ($rowid == $cartItem['rowid']){
                    $qty = $cartItem['qty'] + 1;
                    $data = array(
                      'rowid' => $rowid,
                      'qty' => $qty
                    );
                    $this->cart->update($data);
                }
            }
        redirect(base_url().'cart');
        }
        public function DecreaseItem(){
            $cartItems = $this->cart->contents();
            $rowid = $this->input->get('rowid');
            foreach ($cartItems as $cartItem){
                if ($rowid == $cartItem['rowid']){
                    $qty = $cartItem['qty'] - 1;
                    if($qty > 0){
                        $data = array(
                            'rowid' => $rowid,
                            'qty' => $qty
                        );
                        $this->cart->update($data);
                    }
                }
            }
        redirect(base_url().'cart');
        }

        public function RemoveItem(){
            $rowid = $this->input->get('rowid');
            $remove = $this->cart->remove($rowid);
            redirect(base_url().'cart');
        }
    }