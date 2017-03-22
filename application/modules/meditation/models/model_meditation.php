<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_meditation extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('meditation', $data);
            return $this->db->insert_id();
    }

    public function update($meditation_id, $data){
            $this->db->where('meditation_id', $meditation_id);
            $this->db->update('meditation', $data);
    }
    
    public function delete($meditation_id) {
        $this->db->where('meditation_id', $meditation_id);
        $this->db->delete('meditation');
    }

    public function getById($meditation_id) {
       $this->db->select()->from('meditation');
       $this->db->where('meditation_id', $meditation_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('meditation')->order_by('meditation_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getAllBySemaineId($semaine_id) {
       $this->db->select()->from('meditation')->order_by('semaine_id', 'desc');
       $this->db->where('semaine_id', $semaine_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>