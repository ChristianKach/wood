<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_famille extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('famille', $data);
            return $this->db->insert_id();
    }

    public function update($famille_id, $data){
            $this->db->where('famille_id', $famille_id);
            $this->db->update('famille', $data);
    }
    
    public function delete($famille_id) {
        $this->db->where('famille_id', $famille_id);
        $this->db->delete('famille');
    }

    public function getById($famille_id) {
       $this->db->select()->from('famille');
       $this->db->where('famille_id', $famille_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('famille')->order_by('famille_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getAllByProgrammeId($programme_id) {
       $this->db->select()->from('famille')->order_by('famille_id', 'desc');
       $this->db->where('programme_id', $programme_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>