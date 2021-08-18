<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bois extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('bois', $data);
            return $this->db->insert_id();
    }

    public function update($bois_id, $data){
            $this->db->where('bois_id', $bois_id);
            $this->db->update('bois', $data);
    }
    
    public function delete($bois_id) {
        $this->db->where('bois_id', $bois_id);
        $this->db->delete('bois');
    }

    public function getById($bois_id) {
       $this->db->select()->from('bois'); 
       $this->db->where('bois_id', $bois_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('bois')->order_by('bois_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getNextPrimaryKey() {
       $this->db->select_max('bois_id', 'max_id');
       $result = $this->db->get('bois')->result();  
       if($result)
        return $result[0]->max_id + 1;
       else
        return 1;
    }
    public function getAllByBoisId($bois_id) {
       $this->db->select()->from('emb_arriere')->order_by('emb_arriere_id', 'desc');
       $this->db->where('bois_id', $bois_id);
       $query = $this->db->get();
       return $query->result();
    }
    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>