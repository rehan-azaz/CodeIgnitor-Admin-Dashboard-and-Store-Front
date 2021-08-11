<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    public function index()
    {
        if ($this->session->userdata['username'] === NULL){
            redirect(base_url().'login');
        }
            else{
            $this->load->model('login_model');
            $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
            $title['title'] = "Home | Shopify";
            $this->load->view('templates/header', $title);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        }
    }
}
