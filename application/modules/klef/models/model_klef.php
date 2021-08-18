<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_klef extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('klef', $data);
            return $this->db->insert_id();
    }

    public function update($klef_id, $data){
            $this->db->where('klef_id', $type_bois_id);
            $this->db->update('klef', $data);
    }
    
    public function delete($klef_id) {
        $this->db->where('klef_id', $klef_id);
        $this->db->delete('klef');
    }

    public function getById($klef_id) {
       $this->db->select()->from('klef');
       $this->db->where('klef_id', $klef_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('klef')->order_by('klef_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    

    

}

?>