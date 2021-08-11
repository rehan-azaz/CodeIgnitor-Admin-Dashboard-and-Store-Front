<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{
            $this->load->model('login_model');
            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Products | Shopify";
            $this->load->view('templates/header', $title);
            $this->load->view('pages/products', $data);
            $this->load->view('templates/footer');
        }
    }

    function fetchProducts()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";

        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "desc";
        }

        $valid_columns = array(
            0 => 'id',
            1 => 'product_category',
            2 => 'product_name',
            3 => 'product_info',
            4 => 'product_price',
            5 => 'product_image'
        );
        if (!isset($valid_columns[$col])) {
            $order = null;
        } else {
            $order = $valid_columns[$col];
        }
        if ($order != null) {
            $this->db->order_by($order, $dir);
        }
        if (!empty($search)) {
            $x = 0;
            foreach ($valid_columns as $sterm) {
                if ($x == 0) {
                    $this->db->like($sterm, $search);
                } else {
                    $this->db->or_like($sterm, $search);
                }
                $x++;
            }
        }
        $this->db->limit($length, $start);
        $products = $this->db->get("products");
        $data = array();

        foreach ($products->result() as $rows) {
            $data[] = array(
                $rows->product_name,
                $rows->product_info,
                $rows->product_price,
                '<img src="'.base_url().unserialize($rows->product_image)[0].'" width="50px" height="50px">',
                $rows->product_category,
                '<a href="products/editproduct?id='.$rows->id.'" name="edit" class="btn btn-warning mr-1">Edit</a>
                 <a href="products/deleteproduct?id='.$rows->id.'" name="delete" class="btn btn-danger mr-1">Delete</a>'
            );
        }

        $total_products = $this->totalProducts();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_products,
            "recordsFiltered" => $total_products,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function totalProducts()
    {
        $query = $this->db->select("COUNT(*) as num")->get("products");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
    public function fileUpload(){

        if(!empty($_FILES['file']['name'])){

            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '1024';
            $config['file_name'] = $_FILES['file']['name'];

            $this->load->library('upload',$config);

            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
            }

            $this->load->model('product_model');
            $this->product_model->uploadImage($config);
            return $config;
        }

    }

    public function addProduct()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{
//            $this->load->model('login_model');
//            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Add Product | Shopify";
            $this->load->model('product_model');
            $data['categories'] = $this->product_model->getCategory();
            $data['categories'] = array_unique($data['categories'],SORT_REGULAR );
            $this->load->view('templates/header', $title);
            $this->load->view('pages/addproduct', $data);
            $this->load->view('templates/footer');
        }
    }

    public function validateAddProduct(){
        $productName = $this->input->post('product_name');
        $productCategory = $this->input->post('product_category');
        $productInfo = $this->input->post('product_info');
        $productPrice = $this->input->post('product_price');
        $img = $this->input->post('product_image');

        foreach ($img as $key => &$value) {
            $value = 'assets/img/' . $value;
        }
        $productImg = serialize($img);



        $productData = array(
            'product_name' => $productName,
            'product_category' => $productCategory,
            'product_info' => $productInfo,
            'product_price' => $productPrice,
            'product_image' => $productImg
        );

        $this->load->model('product_model');
        $this->product_model->addProduct($productData);
        redirect('products');
    }

    public function uploadImages(){
        $title['title'] = "Upload Image Products | Shopify";
        $this->load->view('templates/header', $title);
        $this->load->view('pages/uploadProductImages');
        $this->load->view('templates/footer');

    }

    public function editProduct()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{
            $this->load->model('login_model');
            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Edit Product | Shopify";

            $id = $this->input->get('id');

            $this->load->model('product_model');

            $data['categories'] = $this->product_model->getCategory();
            $data['categories'] = array_unique($data['categories'],SORT_REGULAR );

            $data['productData'] = $this->product_model->getEditProduct($id);

            $this->load->view('templates/header', $title);
            $this->load->view('pages/editProduct', $data);
            $this->load->view('templates/footer');
        }
    }
    public function validateEditProduct(){
        $productName = $this->input->post('product_name');
        $productCategory = $this->input->post('product_category');
        $productInfo = $this->input->post('product_info');
        $productPrice = $this->input->post('product_price');

        $img = $this->input->post('product_image');

        foreach ($img as $key => &$value) {
            $value = 'assets/img/' . $value;
        }
        $productImg = serialize($img);

        $productData = array(
            'product_name' => $productName,
            'product_category' => $productCategory,
            'product_info' => $productInfo,
            'product_price' => $productPrice,
            'product_image' => $productImg
        );
        $id = $this->input->get('id');

        $this->load->model('product_model');
        $this->product_model->updateProduct($id, $productData);
        redirect('products');
    }


    public function deleteProduct()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{
            $id = $this->input->get('id');
            $this->load->model('product_model');
            $this->product_model->deleteProduct($id);
            redirect(base_url().'products');
        }
    }

}