<?php
    class Order_model extends CI_Model{
        public function placeOrder($data){
            $query = $this->db->insert('order', $data);
            return $this->db->insert_id();
        }
        public function insertOrderDetails($data){
            $query = $this->db->insert('order_details', $data);
        }
    }