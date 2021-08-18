<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_flexion_compose extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('flexion_compose', $data);
            return $this->db->insert_id();
    }

    public function update($flexion_compose_id, $data){
            $this->db->where('flexion_compose_id', $flexion_compose_id);
            $this->db->update('flexion_compose', $data);
    }
    
    public function delete($flexion_compose_id) {
        $this->db->where('flexion_compose_id', $flexion_compose_id);
        $this->db->delete('flexion_compose');
    }

    public function getById($flexion_compose_id) {
       $this->db->select()->from('flexion_compose');
       $this->db->where('flexion_compose_id', $flexion_compose_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('flexion_compose')->order_by('flexion_compose_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastFlexionComposePrimaryKey() {
       $this->db->select_max('flexion_compose_id', 'last_id');
       $result = $this->db->get('flexion_compose')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('flexion_compose')->order_by('flexion_compose_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    public function getAllByCategorieId($categorie_id) {
       $this->db->select()->from('flexion_compose')->order_by('flexion_compose_id', 'desc');
       $this->db->where('categorie_id', $categorie_id);
       $query = $this->db->get();
       return $query->result();
    }   

   public function getByflexion_composeId($flexion_compose_id) {
       $this->db->select()->from('flexion_compose');
       $this->db->where('flexion_compose_id', $flexion_compose_id);
       $query=$this->db->get();
       return $query->result();
    } 

}


 ?>