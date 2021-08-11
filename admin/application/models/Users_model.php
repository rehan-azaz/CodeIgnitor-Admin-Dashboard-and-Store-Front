<?php
class Users_model extends CI_Model
{

    function __construct() {
        $this->table = 'admin';
        $this->select_column = array('id', 'first_name','last_name','email','image','role');
        $this->order_column = array(null,'first_name','last_name','email',null,'role',null);
    }

    public function getRows($postData){

        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_datatables_query($postData){

        $this->db->from($this->table);

        $i = 0;

        foreach($this->column_search as $item){

            if($postData['search']['value']){

                if($i===0){

                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }


                if(count($this->column_search) - 1 == $i){

                    $this->db->group_end();
                }
            }
            $i++;
        }

        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->like("first_name", $_POST["search"]["value"]);
            $this->db->or_like("last_name", $_POST["search"]["value"]);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else {
            $this->db->order_by('id', 'DESC');
        }
    }

    public function addUser($userData){
        $query = $this->db->insert('admin', $userData);
    }

    public function getEditUser($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function updateUser($id, $userData){
        $this->db->where('id', $id);
        $query = $this->db->update('admin', $userData);
        return $query;
    }

    public function deleteUser($id){
        $this->db->where('id', $id);
        $query = $this->db->delete($this->table);
        return $query;
    }

}