<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_niveau extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('niveau', $data);
            return $this->db->insert_id();
    }

    public function update($niveau_id, $data){
            $this->db->where('niveau_id', $niveau_id);
            $this->db->update('niveau', $data);
    }
    
    public function delete($niveau_id) {
        $this->db->where('niveau_id', $niveau_id);
        $this->db->delete('niveau');
    }

    public function getById($niveau_id) {
       $this->db->select()->from('niveau');
       $this->db->where('niveau_id', $niveau_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('niveau')->order_by('niveau_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    

    

}

?>