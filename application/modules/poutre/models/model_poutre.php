<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_poutre extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('poutre', $data);
            return $this->db->insert_id();
    }

    public function update($poutre_id, $data){
            $this->db->where('poutre_id', $poutre_id);
            $this->db->update('poutre', $data);
    }
    
    public function delete($poutre_id) {
        $this->db->where('poutre_id', $poutre_id);
        $this->db->delete('poutre');
    }

    public function getById($poutre_id) {
       $this->db->select()->from('poutre');
       $this->db->where('poutre_id', $poutre_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('poutre')->order_by('poutre_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastPoutrePrimaryKey() {
       $this->db->select_max('poutre_id', 'last_id');
       $result = $this->db->get('poutre')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('poutre')->order_by('poutre_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    public function getAllByCategorieId($categorie_id) {
       $this->db->select()->from('poutre')->order_by('poutre_id', 'desc');
       $this->db->where('categorie_id', $categorie_id);
       $query = $this->db->get();
       return $query->result();
    }   

   public function getByPoutreId($poutre_id) {
       $this->db->select()->from('poutre');
       $this->db->where('poutre_id', $poutre_id);
       $query=$this->db->get();
       return $query->result();
    } 

}


 ?>