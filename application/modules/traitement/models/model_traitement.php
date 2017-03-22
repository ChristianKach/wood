<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_traitement extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('traitement', $data);
            return $this->db->insert_id();
    }

    public function update($traitement_id, $data){
            $this->db->where('traitement_id', $traitement_id);
            $this->db->update('traitement', $data);
    }
    
    public function delete($traitement_id) {
        $this->db->where('traitement_id', $traitement_id);
        $this->db->delete('traitement');
    }

    public function getById($traitement_id) {
       $this->db->select()->from('traitement');
       $this->db->where('traitement_id', $traitement_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('traitement')->order_by('traitement_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getAllByMaladeId($malade_id) {
       $this->db->select()->from('traitement')->order_by('traitement_id', 'desc');
       $this->db->where('malade_id', $malade_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>