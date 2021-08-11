<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Signup extends CI_Controller{

    public function index(){
        $title['title'] = "Signup | Shopify";
        $this->load->view('templates/header',$title);
        $this->load->view('pages/signup');
        $this->load->view('templates/footer');
    }
    public function validateSignup(){
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

        $this->load->model('signup_model');
        $this->signup_model->signup($userData);
        redirect(base_url().'login');

    }
}
