<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller{

    public function index(){
        $title['title'] = "Login | Shopify";
        $this->load->view('templates/header', $title);
        $this->load->view('pages/login');
        $this->load->view('templates/footer');
    }

    public function validateLogin(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->load->model('login_model');
        if($this->login_model->canLogin($username, $password)){

            $this->session->set_userdata('username', $username);

            redirect(base_url().'home', 'refresh');

        }
        else{
            $this->session->set_flashdata('error','Wrong Username or Password!');
            redirect(base_url().'login');

        }
    }

}