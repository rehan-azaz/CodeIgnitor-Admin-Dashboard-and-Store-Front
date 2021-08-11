<?php
class Category extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{

            $this->load->model('login_model');
            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Categories | Shopify";
            $this->load->view('templates/header', $title);
            $this->load->view('pages/categories', $data);
            $this->load->view('templates/footer');
        }
    }

    public function fetchCategories()
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
            1 => 'name',
            2 => 'image',
            3 => 'description',
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
        $categories = $this->db->get("category");
        $data = array();
        foreach ($categories->result() as $rows) {
            $data[] = array(
                $rows->name,
                '<img src="'.base_url().''.$rows->image .'" width="50px" height="50px">',
                $rows->description,
                '<a href="category/editcategory?id='. $rows->id .'" name="edit" class="btn btn-warning mr-1">Edit</a>
                 <a href="category/deletecategory?id='. $rows->id .'" name="delete" class="btn btn-danger mr-1">Delete</a>'
            );
        }

        $total_category = $this->totalCategory();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_category,
            "recordsFiltered" => $total_category,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function totalCategory(){
        $query = $this->db->select("COUNT(*) as num")->get("category");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }

    public function addCategory(){
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{

            $this->load->model('login_model');
            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Add Category | Shopify";
            $this->load->view('templates/header', $title);
            $this->load->view('pages/addcategory', $data);
            $this->load->view('templates/footer');
        }
    }

    public function validateAddCategory(){
        $name = $this->input->post('name');
        $image = 'assets/img/'.$this->input->post('image');
        $description = $this->input->post('description');
        $categoryData = array(
            'name' => $name,
            'image' => $image,
            'description' => $description,
        );

        $this->load->model('category_model');
        $this->category_model->addCategory($categoryData);
        redirect(base_url().'category');
    }

    public function editCategory(){
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{
//            $this->load->model('login_model');
//            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Edit Category | Shopify";

            $id = $this->input->get('id');
            $this->load->model('category_model');
            $data['categoryData'] = $this->category_model->getEditCategory($id);

            $this->load->view('templates/header', $title);
            $this->load->view('pages/editcategory',  $data);
            $this->load->view('templates/footer');
        }
    }

    public function validateEditCategory(){
        $id = $this->input->get('id');
        $name = $this->input->post('name');
        $image = 'assets/img/'.$this->input->post('image');
        $description = $this->input->post('description');
        $categoryData = array(
            'name' => $name,
            'image' => $image,
            'description' => $description
        );

        $this->load->model('category_model');
        $this->category_model->updateCategory($id, $categoryData);
        redirect(base_url().'category');
    }

    public function deleteCategory(){
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{
            $id = $this->input->get('id');
            $this->load->model('category_model');
            $this->category_model->deleteCategory($id);
            redirect(base_url().'category');
        }
    }

}