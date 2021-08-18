<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_compression extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('compression', $data);
            return $this->db->insert_id();
    }

    public function update($compression_id, $data){
            $this->db->where('compression_id', $compression_id);
            $this->db->update('compression', $data);
    }
    
    public function delete($compression_id) {
        $this->db->where('compression_id', $compression_id);
        $this->db->delete('compression');
    }

    public function getById($compression_id) {
       $this->db->select()->from('compression');
       $this->db->where('compression_id', $compression_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('compression')->order_by('compression_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }
    public function getLastCompressionPrimaryKey() {
       $this->db->select_max('compression_id', 'last_id');
       $result = $this->db->get('compression')->result();  
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