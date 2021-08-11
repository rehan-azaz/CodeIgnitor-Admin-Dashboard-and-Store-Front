<?php
    class Orders extends CI_Controller{
        public function index(){

            if ($this->session->userdata['username'] === NULL){
                redirect(base_url().'login');
            }
            else{
                $this->load->model('login_model');
                $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
                $title['title'] = "Home | Shopify";
                $this->load->view('templates/header', $title);
                $this->load->view('pages/orders', $data);
                $this->load->view('templates/footer');
            }
        }

        function fetchOrders()
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
                1 => 'total_price',
                2 => 'name',
                3 => 'address',
                4 => 'created',
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
            $orders = $this->db->get("order");
            $data = array();

            foreach ($orders->result() as $rows) {
                    $data[] = array(
                        $rows->id,
                        $rows->total_price,
                        $rows->name,
                        $rows->created,
                        '<a href="orders/orderdetails?order_id='.$rows->id.'" name="details" class="btn btn-info mr-1">Details</a>'
                    );
            }

            $total_orders = $this->totalOrders();
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total_orders,
                "recordsFiltered" => $total_orders,
                "data" => $data
            );
            echo json_encode($output);
            exit();
        }

        public function totalOrders()
        {
            $query = $this->db->select("COUNT(*) as num")->get("order");
            $result = $query->row();
            if(isset($result)) return $result->num;
            return 0;
        }

        public function orderDetails(){
            if ($this->session->userdata['username'] === NULL){
                redirect(base_url().'login');
            }
            else{
                $this->load->model('login_model');
                $data['loggedInUser'] = $this->login_model->loggedInUser($this->session->userdata('username'));
                $this->load->model('order_model');
                $id = $this->input->get('order_id');
                $data['order'] = $this->order_model->getOrder($id);
                $title['title'] = "Home | Shopify";
                $this->load->view('templates/header', $title);
                $this->load->view('pages/orderDetail', $data);
                $this->load->view('templates/footer');
            }
        }
    }