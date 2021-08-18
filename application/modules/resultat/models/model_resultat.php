<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_resultat extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('resultat', $data);
            return $this->db->insert_id();
    }

    public function update($resultat_id, $data){
            $this->db->where('resultat_id', $resultat_id);
            $this->db->update('resultat', $data);
    }
    
    public function delete($resultat_id) {
        $this->db->where('resultat_id', $resultat_id);
        $this->db->delete('resultat');
    }

    public function getByEmb_arriereId($emb_arriere_id) {
       $this->db->select()->from('emb_arriere');
       $this->db->where('emb_arriere_id', $emb_arriere_id);
       $query=$this->db->get();
       return $query->result();
    }
    
    public function getById($emb_arriere_id) {
       $this->db->select()->from('emb_arriere');
       $this->db->where('emb_arriere_id', $emb_arriere_id);
       $query=$this->db->get();
       return $query->result();
    }
}

?>