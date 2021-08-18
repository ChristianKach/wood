<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_emb_avant extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('emb_avant', $data);
            return $this->db->insert_id();
    }

    public function update($emb_avant_id, $data){
            $this->db->where('emb_avant_id', $emb_avant_id);
            $this->db->update('emb_avant', $data);
    }
    
    public function delete($emb_avant_id) {
        $this->db->where('emb_avant_id', $emb_avant_id);
        $this->db->delete('emb_avant');
    }

    public function getById($emb_avant_id) {
       $this->db->select()->from('emb_avant');
       $this->db->where('emb_avant_id', $emb_avant_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('emb_avant')->order_by('emb_avant_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastAvantPrimaryKey() {
       $this->db->select_max('emb_avant_id', 'last_id');
       $result = $this->db->get('emb_avant')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('emb_avant')->order_by('emb_avant_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    public function getAllByCategorieId($categorie_id) {
       $this->db->select()->from('emb_avant')->order_by('emb_avant_id', 'desc');
       $this->db->where('categorie_id', $categorie_id);
       $query = $this->db->get();
       return $query->result();
    }   

   public function getByEmb_avantId($emb_avant_id) {
       $this->db->select()->from('emb_avant');
       $this->db->where('emb_avant_id', $emb_arriere_id);
       $query=$this->db->get();
       return $query->result();
    } 

}


 ?>