<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_programme extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function save($data){
            $this->db->insert('programme', $data);
            return $this->db->insert_id();
    }

    function update($programme_id, $data){
            $this->db->where('programme_id', $programme_id);
            $this->db->update('programme', $data);
    }


    public function getById($programme_id) {
       $this->db->select()->from('programme')->order_by('programme_created_at','desc');
       $this->db->where('programme_id', $programme_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('programme')->order_by('programme_created_at','desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function delete($programme_id) {
        $this->db->where('programme_id', $programme_id);
        $this->db->delete('programme');
    }


    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>