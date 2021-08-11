<?php
    class productDetails extends CI_Controller{
        public function index(){
            $title['title'] = 'Product Details | Shopify';
            $product_id = $this->input->get('product_id');
            $this->load->model('product_model');
            $data['product'] = $this->product_model->getProduct($product_id);
            $this->load->view('templates/header', $title);
            $this->load->view('pages/navbar');
            $this->load->view('pages/productDetails', $data);
            $this->load->view('templates/footer');
        }
    }
