<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_type_bois extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('type_bois', $data);
            return $this->db->insert_id();
    }

    public function update($type_bois_id, $data){
            $this->db->where('type_bois_id', $type_bois_id);
            $this->db->update('type_bois', $data);
    }
    
    public function delete($type_bois_id) {
        $this->db->where('type_bois_id', $type_bois_id);
        $this->db->delete('type_bois');
    }

    public function getById($type_bois_id) {
       $this->db->select()->from('type_bois');
       $this->db->where('type_bois_id', $type_bois_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('type_bois')->order_by('type_bois_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    

    

}

?>