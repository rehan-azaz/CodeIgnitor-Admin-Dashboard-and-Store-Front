<?php
class Login_model extends CI_Model {
    public function canLogin($username, $password){
        $this->db->where('email', $username);
        $this->db->where('password',$password);
        $query = $this->db->get('admin');

        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function loggedInUser($username){
        $this->db->where('email', $username);
        $query = $this->db->get('admin');
        return $query->result_array();
    }
}