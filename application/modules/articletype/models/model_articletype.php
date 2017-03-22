<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_articletype extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('article_type', $data);
            return $this->db->insert_id();
    }

    public function update($article_type_id, $data){
            $this->db->where('article_type_id', $article_type_id);
            $this->db->update('article_type', $data);
    }
    
    public function delete($article_type_id) {
        $this->db->where('article_type_id', $article_type_id);
        $this->db->delete('article_type');
    }

    public function getById($article_type_id) {
       $this->db->select()->from('article_type');
       $this->db->where('article_type_id', $article_type_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('article_type')->order_by('article_type_id', 'desc');
       $query = $this->db->get();
       return $query->result();
    }


    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>