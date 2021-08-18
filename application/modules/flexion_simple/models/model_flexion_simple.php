<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_flexion_simple extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('flexion_simple', $data);
            return $this->db->insert_id();
    }

    public function update($flexion_simple_id, $data){
            $this->db->where('flexion_simple_id', $flexion_simple_id);
            $this->db->update('flexion_simple', $data);
    }
    
    public function delete($flexion_simple_id) {
        $this->db->where('flexion_simple_id', $flexion_simple_id);
        $this->db->delete('flexion_simple');
    }

    public function getById($flexion_simple_id) {
       $this->db->select()->from('flexion_simple');
       $this->db->where('flexion_simple_id', $flexion_simple_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('flexion_simple')->order_by('flexion_simple_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastFlexionSimplePrimaryKey() {
       $this->db->select_max('flexion_simple_id', 'last_id');
       $result = $this->db->get('flexion_simple')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('flexion_simple')->order_by('flexion_simple_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    public function getAllByCategorieId($categorie_id) {
       $this->db->select()->from('flexion_simple')->order_by('flexion_simple_id', 'desc');
       $this->db->where('categorie_id', $categorie_id);
       $query = $this->db->get();
       return $query->result();
    }   

   public function getByFlexionSimpleId($flexion_simple_id) {
       $this->db->select()->from('flexion_simple');
       $this->db->where('flexion_simple_id', $flexion_simple_id);
       $query=$this->db->get();
       return $query->result();
    } 

}


 ?>