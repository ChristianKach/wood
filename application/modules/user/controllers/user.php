<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/model_user');
    }

    public function index() {
        $data['title'] = 'Connexion';
        $data["js"] = array(
            //base_url().'assets/js/connexion.js'
        );
    }

    public function connexion() {
        $data['title'] = 'Connexion';
        $data["js"] = array(
            //base_url().'assets/js/connexion.js'
        );

        if(isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('user_username', 'Login', 'trim|required|xss_clean');
            $this->form_validation->set_rules('user_password', 'Mot de passe', 'trim|required|xss_clean');

            if ($this->form_validation->run()) {
                $user_username = $this->input->post('user_username');
                $user_password = $this->input->post('user_password');
                if($user_data = $this->model_user->checkConnexion($user_username, $user_password)) {
                    $this->session->set_userdata('user_id', $user_data->user_id);
                    $this->session->set_userdata('user_username', $user_data->user_username);
                    $this->session->set_userdata('role_libelle', $user_data->role_libelle);
                    redirect('home');
                } else {
                    $data['error'] = 'Error: login et/ou mot de passe incorrect.';
                    $this->load->view('user/view_login', $data);
                }
            }
        }

        $this->load->view('user/view_login', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('user/connexion');
    }

    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */ ?>