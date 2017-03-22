<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Salleadherant extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('adherant/model_adherant');
        $this->load->model('salle/model_salle');
    }

    public function index() {
        $data['title'] = 'Salle - Adhérant';
        $data["js"] = array(
            base_url().'assets/js/salleadherant.js'
        );

        $data['salles'] = $this->model_salle->getAll();
        $data['adherants'] = $this->model_adherant->getAll();
        $data['adherants_selected'] = [];

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_salleadherant', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function addinsalle() {
        $this->form_validation->set_rules('salle_id', 'salle', 'trim|required|xss_clean');

        if(!isset($_POST['adherants_selected'])) {
            $this->form_validation->set_rules('adherant_selected', 'Adhérant sélectionné', 'trim|required|xss_clean');
        }
        
        
        
        if ($this->form_validation->run()) {
           $data['salle_id'] = $this->input->post('salle_id');

           $salle_id = $this->input->post('salle_id');
           $salle = $this->model_salle->getById($salle_id);
           if($salle) {
               $salle_max_personne = $salle[0]->salle_max_personne;
               $count_adherant_by_salle = count($this->model_adherant->getAllBySalleId($salle_id));
               if($count_adherant_by_salle >= $salle_max_personne) {
                   $this->session->set_flashdata('error', 
                    'Enregistrement impossible: nombre maximum de personne dans cette salle est atteint!'); 
                   redirect('salleadherant');
               }
           }
           
           if(!isset($_POST['adherants_selected'])) {
               $adherant_selected = $this->input->post('adherant_selected');
               $data_salleadherant['salle_id'] = $salle_id;

               if($count_adherant_by_salle >= $salle_max_personne) {
                   $this->session->set_flashdata('error', 
                    'Enregistrement impossible: nombre maximum de personne dans cette salle est atteint!'); 
                   redirect('salleadherant');
               }

               $this->model_adherant->addInSalle($adherant_selected, $data_salleadherant);
           } else {
             $adherants_selected = $this->input->post('adherants_selected');
             foreach($adherants_selected as $adherant_id) {
                 $data_salleadherant['salle_id'] = $salle_id;

                 if($count_adherant_by_salle >= $salle_max_personne) {
                   $this->session->set_flashdata('error', 
                    'Enregistrement impossible: nombre maximum de personne dans cette salle est atteint!'); 
                   redirect('salleadherant');
                 }

                 $this->model_adherant->addInSalle($adherant_id, $data_salleadherant);
             }
           }

           $this->session->set_flashdata('add', 'Adhérant(s) ajouté(s)!'); 

           redirect('salleadherant');

        }


        $data['title'] = 'Salles';
        $data["js"] = array(
            base_url().'assets/js/salle.js'
        );

        $data['salles'] = $this->model_salle->getAll();
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
        $this->load->view('view_salleadherant', $data);
        $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$salle_id = (int) $this->uri->segment(3)) {
            redirect('salle');
        }
        
        try {
            $this->model_salle->delete($salle_id);
            $this->session->set_flashdata('delete', 'Salle supprimée!');
        } catch(Exception $e) {
            redirect('salle');
        }

        redirect('salle'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('salle');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_salle->delete($i);
      }
      $this->session->set_flashdata('delete', 'salle(s) supprimée(s)');
      redirect('salle');
    }


    
    public function salle() {
        $salle_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$salle_id)
          $data_adherant = $this->model_adherant->getAll();
        else
          $data_adherant = $this->model_adherant->getAllBySalleId($salle_id);


        $data['title'] = 'Salle - Adhérant';
        $data["js"] = array(
                base_url().'assets/js/salle.js'
        );

        $data['salles'] = $this->model_salle->getAll();
        $data['adherants'] = $data_adherant;

        $data['title'] = 'Salle - Adhérant';
        $data["js"] = array(
            base_url().'assets/js/salleadherant.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_salleadherant', $data);
        $this->load->view('home/includes/footer', $data);

    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>