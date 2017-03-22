<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_situation_matrimoniale extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function getAll() {
       $this->db->select()->from('situation_matrimoniale')->order_by('situation_matrimoniale_id', 'asc');
       $query=$this->db->get();
       return $query->result();
    }

    


    

}

/* End of file model_programme.php */
/* Location: ./application/modules/common/models/model_pays.php */ ?>