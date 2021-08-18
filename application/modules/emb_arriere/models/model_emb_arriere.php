<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_emb_arriere extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('emb_arriere', $data);
            return $this->db->insert_id();
    }

    public function update($emb_arriere_id, $data){
            $this->db->where('emb_arriere_id', $emb_arriere_id);
            $this->db->update('emb_arriere', $data);
    }
    
    public function delete($emb_arriere_id) {
        $this->db->where('emb_arriere_id', $emb_arriere_id);
        $this->db->delete('emb_arriere');
    }

    public function getById($emb_arriere_id) {
       $this->db->select()->from('emb_arriere');
       $this->db->where('emb_arriere_id', $emb_arriere_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('emb_arriere')->order_by('emb_arriere_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('emb_arriere')->order_by('emb_arriere_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    } 

   public function getByEmb_arriereId($emb_arriere_id) {
       $this->db->select()->from('emb_arriere');
       $this->db->where('emb_arriere_id', $emb_arriere_id);
       $query=$this->db->get();
       return $query->result();
    } 

    public function getLastPrimaryKey() {
       $this->db->select_max('emb_arriere_id', 'last_id');
       $result = $this->db->get('emb_arriere')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }
    public function getLastAvantPrimaryKey() {
       $this->db->select_max('emb_avant_id', 'last_id');
       $result = $this->db->get('emb_avant')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

    public function getAl() {
       
       $this->db->select('*');
       $this->db->from('emb_arriere');
       $this->db->join('bois', 'bois.bois_id = emb_arriere.bois_id');
       $this->db->join('categorie', 'categorie.id = bois.id');
       $query=$this->db->get();
       return $query->result();

    }


}


 ?>