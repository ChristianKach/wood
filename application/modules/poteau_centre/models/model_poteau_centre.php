<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_poteau_centre extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('poteau_centre', $data);
            return $this->db->insert_id();
    }

    public function update($poteau_centre_id, $data){
            $this->db->where('poteau_centre_id', $poteau_centre_id);
            $this->db->update('poteau_centre', $data);
    }
    
    public function delete($poteau_centre_id) {
        $this->db->where('poteau_centre_id', $poteau_centre_id);
        $this->db->delete('poteau_centre');
    }

    public function getById($poteau_centre_id) {
       $this->db->select()->from('poteau_centre');
       $this->db->where('poteau_centre_id', $poteau_centre_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('poteau_centre')->order_by('poteau_centre_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastPoteauCentrePrimaryKey() {
       $this->db->select_max('poteau_centre_id', 'last_id');
       $result = $this->db->get('poteau_centre')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('poteau_centre')->order_by('poteau_centre_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    public function getAllByCategorieId($categorie_id) {
       $this->db->select()->from('poteau_centre')->order_by('poteau_centre_id', 'desc');
       $this->db->where('categorie_id', $categorie_id);
       $query = $this->db->get();
       return $query->result();
    }   

   public function getByPoteauCentreId($poteau_centre_id) {
       $this->db->select()->from('poteau_centre');
       $this->db->where('poteau_centre_id', $emb_arriere_id);
       $query=$this->db->get();
       return $query->result();
    } 

}


 ?>