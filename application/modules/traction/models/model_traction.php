<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_traction extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('traction', $data);
            return $this->db->insert_id();
    }

    public function update($emb_avant_id, $data){
            $this->db->where('traction_id', $emb_avant_id);
            $this->db->update('traction', $data);
    }
    
    public function delete($traction_id) {
        $this->db->where('traction_id', $traction_id);
        $this->db->delete('traction');
    }

    public function getById($traction_id) {
       $this->db->select()->from('traction');
       $this->db->where('traction_id', $traction_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('traction')->order_by('traction_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastTractionPrimaryKey() {
       $this->db->select_max('traction_id', 'last_id');
       $result = $this->db->get('traction')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('traction')->order_by('traction_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    public function getAllByCategorieId($categorie_id) {
       $this->db->select()->from('traction')->order_by('traction_id', 'desc');
       $this->db->where('categorie_id', $categorie_id);
       $query = $this->db->get();
       return $query->result();
    }   

   public function getByTractionId($traction_id) {
       $this->db->select()->from('traction');
       $this->db->where('traction_id', $traction_id);
       $query=$this->db->get();
       return $query->result();
    } 

}


 ?>