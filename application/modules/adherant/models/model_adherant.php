<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_adherant extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('adherant', $data);
            return $this->db->insert_id();
    }

    public function update($adherant_id, $data){
            $this->db->where('adherant_id', $adherant_id);
            $this->db->update('adherant', $data);
    }
    
    public function delete($adherant_id) {
        $adherant = $this->getById($adherant_id);
        if($adherant[0]->adherant_photo)
          @unlink($adherant[0]->adherant_photo);

        $this->db->where('adherant_id', $adherant_id);
        $this->db->delete('adherant');
    }

    public function getById($adherant_id) {
       $this->db->select()->from('adherant')->order_by('adherant_created_at', 'desc');
       $this->db->where('adherant_id', $adherant_id);
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

    public function getAllByProgrammeId($programme_id) {
       $this->db->select()->from('adherant')->order_by('adherant_created_at', 'desc');
       $this->db->join('programme_adherant', 'programme_adherant.adherant_id = adherant.adherant_id');
       $this->db->where('programme_adherant.programme_id', $programme_id);
       $query = $this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('adherant')->order_by('adherant_created_at', 'desc');
       $query=$this->db->get();
       return $query->result();
    }


    public function saveSms($data) {
        $this->db->insert('sms', $data);
        return $this->db->insert_id();
    }

    public function updateSms($sms_id, $data){
        $this->db->where('sms_id', $sms_id);
        $this->db->update('sms', $data);
    }
    
    public function getSmsSendingState() {
       $this->db->select_max('sms_id', 'max_id');
       $result = $this->db->get('sms')->result();  
       if($result)
        $sms_id = $result[0]->max_id;
       else
        $sms_id = 1;
       
       $this->db->select()->from('sms');
       $this->db->where('sms_id', $sms_id);
       $query=$this->db->get();
       return $query->result()[0]->sms_sending_state;

    }

    public function getAllBySalleId($salle_id) {
      $this->db->select()->from('adherant')->order_by('adherant_created_at', 'desc');
      $this->db->where('adherant.salle_id', $salle_id);
      $query = $this->db->get();
      return $query->result();
    }

    public function addInSalle($adherant_id, $data) {
        $this->db->where('adherant_id', $adherant_id);
        $this->db->update('adherant', $data);
    }

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>