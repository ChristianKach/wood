<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_panne extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('panne', $data);
            return $this->db->insert_id();
    }

    public function update($panne_id, $data){
            $this->db->where('panne_id', $panne_id);
            $this->db->update('panne', $data);
    }
    
    public function delete($panne_id) {
        $this->db->where('panne_id', $panne_id);
        $this->db->delete('panne');
    }

    public function getById($panne_id) {
       $this->db->select()->from('panne');
       $this->db->where('panne_id', $panne_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('panne')->order_by('panne_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastPannePrimaryKey() {
       $this->db->select_max('panne_id', 'last_id');
       $result = $this->db->get('panne')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('panne')->order_by('panne_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    public function getAllByCategorieId($categorie_id) {
       $this->db->select()->from('panne')->order_by('panne_id', 'desc');
       $this->db->where('categorie_id', $categorie_id);
       $query = $this->db->get();
       return $query->result();
    }   

   public function getByPoutreId($panne_id) {
       $this->db->select()->from('panne');
       $this->db->where('panne_id', $panne_id);
       $query=$this->db->get();
       return $query->result();
    } 

}


 ?>