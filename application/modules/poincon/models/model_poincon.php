<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_poincon extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('poincon', $data);
            return $this->db->insert_id();
    }

    public function update($poincon_id, $data){
            $this->db->where('poincon_id', $poincon_id);
            $this->db->update('poincon', $data);
    }
    
    public function delete($poincon_id) {
        $this->db->where('poincon_id', $poincon_id);
        $this->db->delete('poincon');
    }

    public function getById($poincon_id) {
       $this->db->select()->from('poincon');
       $this->db->where('poincon_id', $poincon_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('poincon')->order_by('poincon_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastPoinconPrimaryKey() {
       $this->db->select_max('poincon_id', 'last_id');
       $result = $this->db->get('poincon')->result();  
       if($result)
        return $result[0]->last_id;
       else
        return 1;
    }

     public function getAllByBoisId($bois_id) {
       $this->db->select()->from('poincon')->order_by('poincon_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    public function getAllByCategorieId($categorie_id) {
       $this->db->select()->from('poincon')->order_by('poincon_id', 'desc');
       $this->db->where('categorie_id', $categorie_id);
       $query = $this->db->get();
       return $query->result();
    }   

   public function getByPoinconId($poincon_id) {
       $this->db->select()->from('poincon');
       $this->db->where('poincon_id', $poincon_id);
       $query=$this->db->get();
       return $query->result();
    } 

}


 ?>