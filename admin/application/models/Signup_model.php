<?php
class Signup_model extends CI_Model {
    public function signup($userData){
        $query = $this->db->insert('admin', $userData);
    }
}