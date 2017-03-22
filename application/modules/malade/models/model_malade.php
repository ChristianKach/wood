<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_malade extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('malade', $data);
            return $this->db->insert_id();
    }

    public function update($malade_id, $data){
            $this->db->where('malade_id', $malade_id);
            $this->db->update('malade', $data);
    }
    
    public function delete($malade_id) {
        $this->db->where('malade_id', $malade_id);
        $this->db->delete('malade');
    }

    public function getById($malade_id) {
       $this->db->select()->from('malade');
       $this->db->where('malade_id', $malade_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('malade')->order_by('malade_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getAllByAdhereantId($adherant_id) {
       $this->db->select()->from('malade')->order_by('adherant_id', 'desc');
       $this->db->where('adherant_id', $adherant_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>