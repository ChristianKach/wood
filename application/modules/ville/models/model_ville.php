<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ville extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function getAll() {
       $this->db->select()->from('ville')->order_by('ville_libelle', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    


    

}

/* End of file model_programme.php */
/* Location: ./application/modules/common/models/model_ville.php */ ?>