<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_coefficient_flexion_compose extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('coefficient_flexion_compose', $data);
            return $this->db->insert_id();
    }

    public function update($coefficient_flexion_compose_id, $data){
            $this->db->where('coefficient_flexion_compose_id', $coefficient_flexion_compose_id);
            $this->db->update('coefficient_flexion_compose', $data);
    }
    
    public function delete($coefficient_flexion_compose_id) {
        $this->db->where('coefficient_flexion_compose_id', $coefficient_flexion_compose_id);
        $this->db->delete('coefficient_flexion_compose');
    }

    public function getById($coefficient_flexion_compose_id) {
       $this->db->select()->from('coefficient_flexion_compose');
       $this->db->where('coefficient_flexion_compose_id', $coefficient_flexion_compose_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('coefficient_flexion_compose')->order_by('coefficient_flexion_compose_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getLastCoefficientPrimaryKey() {
       $this->db->select_max('coefficient_flexion_compose_id', 'lasts_id');
       $result = $this->db->get('coefficient_flexion_compose')->result();  
       if($result)
        return $result[0]->lasts_id;
       else
        return 1;
    }
    

    

}

?>