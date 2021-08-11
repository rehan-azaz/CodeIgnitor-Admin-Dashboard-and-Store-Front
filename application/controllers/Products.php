<?php
    class Products extends CI_Controller{
        public function index()
        {
            $title['title'] = "Product Detail | Shopify";
            $this->load->model('product_model');
            $data['products'] = $this->product_model->getProducts();
            $this->load->view('templates/header', $title);
            $this->load->view('pages/navbar');
            $this->load->view('pages/products', $data);
            $this->load->view('templates/footer');
        }
    }