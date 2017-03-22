<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_batiment extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('batiment', $data);
            return $this->db->insert_id();
    }

    public function update($batiment_id, $data){
            $this->db->where('batiment_id', $batiment_id);
            $this->db->update('batiment', $data);
    }
    
    public function delete($batiment_id) {
        $this->db->where('batiment_id', $batiment_id);
        $this->db->delete('batiment');
    }

    public function getById($batiment_id) {
       $this->db->select()->from('batiment');
       $this->db->where('batiment_id', $batiment_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('batiment')->order_by('batiment_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getAllByProgrammeId($programme_id) {
       $this->db->select()->from('batiment')->order_by('batiment_id', 'desc');
       $this->db->where('programme_id', $programme_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>