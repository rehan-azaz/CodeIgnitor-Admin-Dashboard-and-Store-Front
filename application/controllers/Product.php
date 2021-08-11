<?php
class Product extends CI_Controller {
    public function index()
    {
        $title['title'] = 'Product | Shopify';
        $category_name = $this->input->get('category_name');
        $this->load->model('product_model');
        $data['categories'] = $this->product_model->getCategoryList();
        $data['categories'] = array_unique($data['categories'],SORT_REGULAR );
        $data['products'] = $this->product_model->getCategoryProduct($category_name);
        $this->load->view('templates/header', $title);
        $this->load->view('pages/navbar');
        $this->load->view('pages/productsListing', $data);
        $this->load->view('templates/footer');
    }

}