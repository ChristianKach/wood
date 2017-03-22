<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        //$this->load->model('home/home_model');
    }

    public function index() {
        $this->load->view('includes/header');
        $this->load->view('includes/sidebar');
        $this->load->view('includes/topmenu');
        $this->load->view('view_home');
        $this->load->view('includes/footer');
    }

    

    

}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */ ?>