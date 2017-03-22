<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH."third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {

	public function __construct() {

		if(!$this->session->userdata('id_user') && !$this->session->userdata('role_libelle')) {
			redirect('user/logout');
        }
	}
	
}