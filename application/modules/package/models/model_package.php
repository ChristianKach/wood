<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_package extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('package', $data);
            return $this->db->insert_id();
    }

    public function update($package_id, $data){
            $this->db->where('package_id', $package_id);
            $this->db->update('package', $data);
    }
    
    public function delete($package_id) {
        $this->db->where('package_id', $package_id);
        $this->db->delete('package');
    }

    public function getById($package_id) {
       $this->db->select()->from('package');
       $this->db->where('package_id', $package_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('package')->order_by('package_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getAllByProgrammeId($programme_id) {
       $this->db->select()->from('package')->order_by('package_id', 'desc');
       $this->db->where('programme_id', $programme_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>