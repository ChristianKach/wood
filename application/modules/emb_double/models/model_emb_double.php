<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_emb_double extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('emb_double', $data);
            return $this->db->insert_id();
    }

    public function update($emb_double_id, $data){
            $this->db->where('emb_double_id', $emb_double_id);
            $this->db->update('emb_double', $data);
    }
    
    public function delete($emb_double_id) {
        $this->db->where('emb_double_id', $emb_double_id);
        $this->db->delete('emb_double');
    }

    public function getById($emb_double_id) {
       $this->db->select()->from('emb_double');
       $this->db->where('emb_double_id', $emb_double_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('emb_double')->order_by('emb_double_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastDoublePrimaryKey() {
       $this->db->select_max('emb_double_id', 'last_id');
       $result = $this->db->get('emb_double')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('emb_double')->order_by('emb_double_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    public function getAllByCategorieId($categorie_id) {
       $this->db->select()->from('emb_double')->order_by('emb_double_id', 'desc');
       $this->db->where('categorie_id', $categorie_id);
       $query = $this->db->get();
       return $query->result();
    }   

   public function getByEmb_avantId($emb_double_id) {
       $this->db->select()->from('emb_double');
       $this->db->where('emb_double_id', $emb_double_id);
       $query=$this->db->get();
       return $query->result();
    } 

}


 ?>