<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_categorie extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('categorie', $data);
            return $this->db->insert_id();
    }

    public function update($categorie_id, $data){
            $this->db->where('categorie_id', $categorie_id);
            $this->db->update('categorie', $data);
    }
    
    public function delete($categorie_id) {
        $this->db->where('categorie_id', $categorie_id);
        $this->db->delete('categorie');
    }

    public function getById($categorie_id) {
       $this->db->select()->from('categorie');
       $this->db->where('categorie_id', $categorie_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('categorie')->order_by('categorie_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }   

}

?>