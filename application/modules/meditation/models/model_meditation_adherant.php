<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_meditation_adherant extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllByMediationIdAndAdherantId($meditation_id, $adherant_id) {
       $this->db->select()->from('meditation_adherant');
       $this->db->where('meditation_id', $meditation_id);
       $this->db->where('adherant_id', $adherant_id);
       $query = $this->db->get();
       return $query->result();
    }

    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>