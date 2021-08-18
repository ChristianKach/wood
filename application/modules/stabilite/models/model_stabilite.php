<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_stabilite extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('stabilite', $data);
            return $this->db->insert_id();
    }

    public function update($stabilite_id, $data){
            $this->db->where('stabilite_id', $stabilite_id);
            $this->db->update('stabilite', $data);
    }
    
    public function delete($stabilite_id) {
        $this->db->where('stabilite_id', $stabilite_id);
        $this->db->delete('stabilite');
    }

    public function getById($stabilite_id) {
       $this->db->select()->from('stabilite');
       $this->db->where('stabilite_id', $stabilite_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('stabilite')->order_by('stabilite_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    

    

}

?>