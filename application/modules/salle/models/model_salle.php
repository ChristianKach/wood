<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_salle extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('salle', $data);
            return $this->db->insert_id();
    }

    public function update($salle_id, $data){
            $this->db->where('salle_id', $salle_id);
            $this->db->update('salle', $data);
    }
    
    public function delete($salle_id) {
        $this->db->where('salle_id', $salle_id);
        $this->db->delete('salle');
    }

    public function getById($salle_id) {
       $this->db->select()->from('salle');
       $this->db->where('salle_id', $salle_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('salle')->order_by('salle_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getAllByBatimentId($batiment_id) {
       $this->db->select()->from('salle')->order_by('salle_id', 'desc');
       $this->db->where('batiment_id', $batiment_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>