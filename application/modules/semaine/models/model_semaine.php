<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_semaine extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('semaine', $data);
            return $this->db->insert_id();
    }

    public function update($semaine_id, $data){
            $this->db->where('semaine_id', $semaine_id);
            $this->db->update('semaine', $data);
    }
    
    public function delete($semaine_id) {
        $this->db->where('semaine_id', $semaine_id);
        $this->db->delete('semaine');
    }

    public function getById($semaine_id) {
       $this->db->select()->from('semaine');
       $this->db->where('semaine_id', $semaine_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('semaine')->order_by('semaine_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getAllByProgrammeId($programme_id) {
       $this->db->select()->from('semaine')->order_by('semaine_id', 'desc');
       $this->db->where('programme_id', $programme_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>