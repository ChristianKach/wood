<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_materiel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('materiel', $data);
            return $this->db->insert_id();
    }

    public function update($materiel_id, $data){
            $this->db->where('materiel_id', $materiel_id);
            $this->db->update('materiel', $data);
    }
    
    public function delete($materiel_id) {
        $this->db->where('materiel_id', $materiel_id);
        $this->db->delete('materiel');
    }

    public function getById($materiel_id) {
       $this->db->select()->from('materiel');
       $this->db->where('materiel_id', $materiel_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('materiel')->order_by('materiel_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getAllByProgrammeId($programme_id) {
       $this->db->select()->from('materiel')->order_by('materiel_id', 'desc');
       $this->db->where('programme_id', $programme_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_materiel.php */ ?>