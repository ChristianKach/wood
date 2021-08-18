<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkConnexion($user_username, $user_password) {
       $this->db->select('user_id, user_username, role.role_libelle')->from('user');
       $this->db->join('role', 'role.role_id = user.role_id');
       $this->db->where('user.user_username', $user_username);
       $this->db->where('user.user_password', $user_password);
       $query = $this->db->get();
       if(!$data = $query->first_row()) return false;
       else return $data;
    }
}
?>