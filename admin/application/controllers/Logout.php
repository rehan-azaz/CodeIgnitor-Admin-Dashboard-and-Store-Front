<?php

class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->unset_userdata('username');
        redirect(base_url().'login');
    }
}