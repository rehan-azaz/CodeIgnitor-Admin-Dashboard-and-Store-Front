<?php
    class Product_model extends CI_Model {
        public function getCategoryList(){
            $this->db->select("name");
            $this->db->from("category");
            return $this->db->get()->result();
        }

        public function getProducts(){
            $this->db->select("*");
            $this->db->from("products");
            return $this->db->get()->result();
        }

        public function getProduct($id){
            $this->db->where("id", $id);
            $this->db->from("products");
            return $this->db->get()->result();
        }

        public function getCategoryProduct($categoryName){
            $this->db->where("product_category", $categoryName);
            $this->db->from("products");
            return $this->db->get()->result();
        }
    }