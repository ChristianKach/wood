<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_article extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('article', $data);
            return $this->db->insert_id();
    }

    public function update($article_id, $data){
            $this->db->where('article_id', $article_id);
            $this->db->update('article', $data);
    }
    
    public function delete($article_id) {
        $this->db->where('article_id', $article_id);
        $this->db->delete('article');
    }

    public function getById($article_id) {
       $this->db->select()->from('article')->order_by('article_created_at', 'desc');
       $this->db->where('article_id', $article_id);
       $query=$this->db->get();
       return $query->result();
    }


    public function getAllByProgrammeId($programme_id) {
       $this->db->select()->from('article')->order_by('article_created_at', 'desc');
       $this->db->join('programme_article', 'programme_article.article_id = article.article_id');
       $this->db->where('programme_article.programme_id', $programme_id);
       $query = $this->db->get();
       return $query->result();
    }

    public function getAllByArticleTypeId($article_type_id) {
       $this->db->select()->from('article')->order_by('article_created_at', 'desc');
       $this->db->where('article.article_type_id', $article_type_id);
       $query = $this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('article')->order_by('article_created_at', 'desc');
       $query=$this->db->get();
       return $query->result();
    }


    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>