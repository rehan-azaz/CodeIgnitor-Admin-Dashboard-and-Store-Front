<?php
class Category_model extends CI_Model
{

    function __construct() {
        $this->table = 'category';
        $this->select_column = array('id', 'name','image','description');
        $this->order_column = array(null,'name',null,'description',null);
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
            $this->db->like("name", $_POST["search"]["value"]);
            $this->db->or_like("description", $_POST["search"]["value"]);
        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else {
            $this->db->order_by('id', 'DESC');
        }
    }

    public function addCategory($categoryData){
        $query = $this->db->insert('category', $categoryData);
    }

    public function getEditCategory($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function updateCategory($id, $categoryData){
        $this->db->where('id', $id);
        $query = $this->db->update('category', $categoryData);
        return $query;
    }
    
    public function deleteCategory($id){
        $this->db->where('id', $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
}