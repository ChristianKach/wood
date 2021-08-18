<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_coefficient extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('coefficient', $data);
            return $this->db->insert_id();
    }

    public function update($coefficient_id, $data){
            $this->db->where('coefficient_id', $coefficient_id);
            $this->db->update('coefficient', $data);
    }
    
    public function delete($coefficient_id) {
        $this->db->where('coefficient_id', $coefficient_id);
        $this->db->delete('coefficient');
    }

    public function getById($coefficient_id) {
       $this->db->select()->from('coefficient');
       $this->db->where('coefficient_id', $coefficient_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('coefficient')->order_by('coefficient_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getLastCoefficientPrimaryKey() {
       $this->db->select_max('coefficient_id', 'lasts_id');
       $result = $this->db->get('coefficient')->result();  
       if($result)
        return $result[0]->lasts_id;
       else
        return 1;
    }
    

    

}

?>