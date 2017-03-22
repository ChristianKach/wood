<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Presence extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('adherant/model_adherant');
        $this->load->model('programme/model_programme');
        $this->load->model('programme/model_programme_adherant');
        $this->load->model('semaine/model_semaine');
        $this->load->model('meditation/model_meditation');
        $this->load->model('presence/model_meditation_adherant');
    }

    public function index() {
        $data['title'] = 'Meditation - présence';
        $data["js"] = array(
            base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
            base_url().'assets/js/presence.js'
        );

        $data["css"] = array(
            base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['semaines'] = $this->model_semaine->getAll();
        $data['meditations'] = $this->model_meditation->getAll();
        $data['adherants'] = $this->model_adherant->getAll();

        $data['adherants_selected'] = [];

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_presence', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function addmeditation() {
        $this->form_validation->set_rules('meditation_id', 'Méditation', 'trim|required|xss_clean');

        if(!isset($_POST['adherants_selected'])) {
            $this->form_validation->set_rules('adherant_selected', 'Adhérant sélectionné', 'trim|required|xss_clean');
        }
        
        

        if ($this->form_validation->run()) {
           $data['meditation_id'] = $this->input->post('meditation_id');
           $meditation_id = $this->input->post('meditation_id');

           if(!isset($_POST['adherants_selected'])) {
               $adherant_selected = $this->input->post('adherant_selected');
               $data_meditationadherant['meditation_id'] = $meditation_id;
               $data_meditationadherant['presence'] = $this->input->post('presence');
               $data_meditationadherant['annciennete'] = $this->input->post('annciennete');

               $this->model_meditation_adherant->save($adherant_selected, $data_meditationadherant);

           } else {
             $adherants_selected = $this->input->post('adherants_selected');
             foreach($adherants_selected as $adherant_id) {
                 $data_meditationadherant['meditation_id'] = $meditation_id;
                 $data_meditationadherant['presence'] = $this->input->post('presence');
                 $data_meditationadherant['annciennete'] = $this->input->post('annciennete');

                 $this->model_meditation_adherant->save($adherant_id, $data_meditationadherant);
             }
           }

           $this->session->set_flashdata('add', 'Adhérant(s) ajouté(s)!'); 

           redirect('presence');

        }


        $data['title'] = 'Meditation - Présence';
        $data["js"] = array(
            base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
            base_url().'assets/js/presence.js'
        );


        $data["css"] = array(
            base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
        );

        
        $data['programmes'] = $this->model_programme->getAll();
        $data['semaines'] = $this->model_semaine->getAll();
        $data['meditations'] = $this->model_meditation->getAll();
        $data['adherants'] = $this->model_adherant->getAll();

        if($adherant_id = (int) $this->uri->segment(3)) {
            $adherant = $this->model_adherant->getById($adherant_id);
            if($adherant) {
                $data['salle_id'] = $adherant[0]->salle_id;
                $data['adherants_selected'] = $adherant;
            }
        } else {
            $data['adherants_selected'] = [];
        }

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_presence', $data);
        $this->load->view('home/includes/footer', $data);
    }


    
    public function programme() {
        $programme_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$programme_id)
          $data_adherant = $this->model_adherant->getAll();
        else
          $data_adherant = $this->model_adherant->getAllByProgrammeId($programme_id);

        
        $data['title'] = 'Méditation - Présence';
        $data["js"] = array(
            base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
            base_url().'assets/js/presence.js'
        );

        $data["css"] = array(
            base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
        );

        
        $data['programmes'] = $this->model_programme->getAll();
        $data['semaines'] = $this->model_semaine->getAll();
        $data['meditations'] = $this->model_meditation->getAll();
        $data['adherants'] = $data_adherant;

        $data['adherants_selected'] = [];

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_presence', $data);
        $this->load->view('home/includes/footer', $data);

    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>