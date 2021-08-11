<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{
            $this->load->model('login_model');
            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Users | Shopify";
            $this->load->view('templates/header', $title);
            $this->load->view('pages/users', $data);
            $this->load->view('templates/footer');
        }
    }

    function fetchUsers()
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
            1 => 'first_name',
            2 => 'last_name',
            3 => 'email',
            4 => 'image',
            5 => 'role',
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
        $users = $this->db->get("admin");
        $data = array();

        foreach ($users->result() as $rows) {
            if($rows->role !== 'superadmin'){
                $data[] = array(
                    $rows->first_name,
                    $rows->last_name,
                    $rows->email,
                    '<img src="'.base_url().$rows->image.'" width="50px" height="50px">',
                    $rows->role,
                    '<a href="users/edituser?id='.$rows->id.'" name="edit" class="btn btn-warning mr-1">Edit</a>
                     <a href="users/deleteuser?id='.$rows->id.'" name="delete" class="btn btn-danger mr-1">Delete</a>'
                );
            }
        }

        $total_users = $this->totalUsers();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_users,
            "recordsFiltered" => $total_users,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function totalUsers()
    {
        $query = $this->db->select("COUNT(*) as num")->get("admin");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }

    public function addUser()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{

            $this->load->model('login_model');
            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Add User | Shopify";
            $this->load->view('templates/header', $title);
            $this->load->view('pages/adduser', $data);
            $this->load->view('templates/footer');
        }
    }

    public function validateAddUser(){
        $firstName = $this->input->post('first_name');
        $lastName = $this->input->post('last_name');
        $email = $this->input->post('email');
        $image = 'assets/img/'.$this->input->post('image');
        $password = md5($this->input->post('password'));
        $userData = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'image' => $image,
            'password' => $password,
            'role' => 'Admin'
        );

        $this->load->model('users_model');
        $this->users_model->addUser($userData);
        redirect(base_url().'users');
    }

    public function editUser()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{
//            $this->load->model('login_model');
//            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Edit User | Shopify";

            $id = $this->input->get('id');
            $this->load->model('users_model');
            $data['userData'] = $this->users_model->getEditUser($id);

            $this->load->view('templates/header', $title);
            $this->load->view('pages/edituser',  $data);
            $this->load->view('templates/footer');
        }
    }
    public function validateEditUser(){
        $id = $this->input->get('id');
        $firstName = $this->input->post('first_name');
        $lastName = $this->input->post('last_name');
        $email = $this->input->post('email');
        $image = 'assets/img/'.$this->input->post('image');
        $userData = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'image' => $image,
            'role' => 'Admin'
        );

        $this->load->model('users_model');
        $this->users_model->updateUser($id,$userData);
        redirect(base_url().'users');
    }
    public function deleteUser()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
        else{
            $id = $this->input->get('id');
            $this->load->model('users_model');
            $data['userData'] = $this->users_model->deleteUser($id);

            redirect(base_url().'users');

        }
    }

}