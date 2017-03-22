<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_programme_adherant extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('programme_adherant', $data);
            return $this->db->insert_id();
    }

    public function update($programme_id, $adherant_id){
        $data['programme_id'] = $programme_id;
        $data['adherant_id'] = $adherant_id;
        $this->db->where('adherant_id', $adherant_id);
        $this->db->update('programme_adherant', $data);
    }

    public function deleteAllByProgrammeId($programme_id) {
        $this->db->where('programme_id', $programme_id);
        $this->db->delete('programme_adherant');
    }
    

    public function getByAdherantId($adherant_id) {
       $this->db->select()->from('programme_adherant');
       $this->db->where('adherant_id', $adherant_id);
       $query = $this->db->get();
       return $query->result();
    }

    public function getAllAdherantsByProgrammeId($programme_id) {
       $this->db->select('programme_adherant.adherant_id')->from('programme_adherant');
       $this->db->join('adherant', 'adherant.adherant_id = programme_adherant.adherant_id');
       $this->db->where('programme_adherant.programme_id', $programme_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getNextPrimaryKey() {
       $this->db->select_max('adherant_id', 'max_id');
       $result = $this->db->get('adherant')->result();  
       if($result)
        return $result[0]->max_id + 1;
       else
        return 1;
    }

    public function getAll() {
       $this->db->select()->from('adherant')->order_by('adherant_created_at', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>