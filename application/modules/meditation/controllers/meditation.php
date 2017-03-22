<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Meditation extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('meditation/model_meditation');
        $this->load->model('programme/model_programme');
        $this->load->model('semaine/model_semaine');
    }

    public function index() {
        $data['title'] = 'Méditations';
        $data["js"] = array(
            base_url().'assets/js/meditation.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['semaines'] = $this->model_semaine->getAll();
        $data['meditations'] = $this->model_meditation->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_meditation', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('semaine_id', 'semaine', 'trim|required|xss_clean');
        $this->form_validation->set_rules('meditation_theme', 'Thème', 'trim|required|max_length[150]|xss_clean');

        $this->form_validation->set_rules('meditation_date', 'Date', 'trim|required|max_length[10]|xss_clean');

        $this->form_validation->set_rules('meditation_heure_debut', 'Heure de début', 'trim|required|max_length[10]|xss_clean');

        $this->form_validation->set_rules('meditation_heure_fin', 'Heure de fin', 'trim|required|max_length[10]|xss_clean');

        if ($this->form_validation->run()) {
           $data['semaine_id'] = $this->input->post('semaine_id');
           $data['meditation_theme'] = $this->input->post('meditation_theme');
           $data['meditation_date'] = formatDateToDB($this->input->post('meditation_date'));
           $data['meditation_heure_debut'] = $this->input->post('meditation_heure_debut');
           $data['meditation_heure_fin'] = $this->input->post('meditation_heure_fin');
           $data['meditation_predicateur'] = $this->input->post('meditation_predicateur');

           $meditation_id = $this->model_meditation->save($data);

           $this->session->set_flashdata('add', 'Méditation enregistrée!'); 

           redirect('meditation');

        }

        $data['programmes'] = $this->model_programme->getAll();
        $data['semaines'] = $this->model_semaine->getAll();
        $data['meditations'] = $this->model_meditation->getAll();

        $data['title'] = 'Méditations';
        $data["js"] = array(
            base_url().'assets/js/meditation.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_meditation', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$meditation_id = (int) $this->uri->segment(3)) {
            redirect('meditation');
        }

        if(isset($_POST['meditation_id'])) {
            $this->form_validation->set_rules('semaine_id', 'semaine', 'trim|required|xss_clean');
        $this->form_validation->set_rules('meditation_theme', 'Thème', 'trim|required|max_length[150]|xss_clean');

        $this->form_validation->set_rules('meditation_date', 'Date', 'trim|required|max_length[10]|xss_clean');

        $this->form_validation->set_rules('meditation_heure_debut', 'Heure de début', 'trim|required|max_length[10]|xss_clean');

        $this->form_validation->set_rules('meditation_heure_fin', 'Heure de fin', 'trim|required|max_length[10]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['semaine_id'] = $this->input->post('semaine_id');
               $data['meditation_theme'] = $this->input->post('meditation_theme');
               $data['meditation_date'] = formatDateToDB($this->input->post('meditation_date'));
               $data['meditation_heure_debut'] = $this->input->post('meditation_heure_debut');
               $data['meditation_heure_fin'] = $this->input->post('meditation_heure_fin');
               $data['meditation_predicateur'] = $this->input->post('meditation_predicateur');

               $this->model_meditation->update($this->input->post('meditation_id'), $data);

               $this->session->set_flashdata('update', 'Méditation mise à jour!'); 

               redirect('meditation');

                }
            }    

            $data['programmes'] = $this->model_programme->getAll();

            $meditation = $this->model_meditation->getById($meditation_id);
            if(empty($meditation)) {
                redirect('meditation');
            }

            $meditation = $meditation[0];

            if($meditation->meditation_date)
                $meditation->meditation_date = formatDateToPHP($meditation->meditation_date);

            $data['meditation'] = $meditation;
            $data['semaine_id'] = $meditation->semaine_id;
            $data['semaines'] = $this->model_semaine->getAll();
            $data['meditations'] = $this->model_meditation->getAll();

            $data['title'] = 'Méditations';
            $data["js"] = array(
                base_url().'assets/js/meditation.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_meditation', $data);
            $this->load->view('home/includes/footer', $data);
    }

    public function getAllByProgrammeId() {
        $programme_id = $this->input->get("programme_id");
        $data = $this->model_semaine->getAllByProgrammeId($programme_id);
        sendJSON(true, $data, '');
    }

    public function getAllBySemaineId() {
        $semaine_id = $this->input->get("semaine_id");
        $data = $this->model_meditation->getAllBySemaineId($semaine_id);
        sendJSON(true, $data, '');
    }

    
    public function delete() {

        if(!$meditation_id = (int) $this->uri->segment(3)) {
            redirect('meditation');
        }
        
        try {
            $this->model_meditation->delete($meditation_id);
            $this->session->set_flashdata('delete', 'Méditation supprimée!');
        } catch(Exception $e) {
            redirect('meditation');
        }

        redirect('meditation'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('meditation');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_meditation->delete($i);
      }
      $this->session->set_flashdata('delete', 'Méditation(s) supprimée(s)');
      redirect('meditation');
    }


    
    public function semaine() {
        $semaine_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$semaine_id)
          $data_meditation = $this->model_meditation->getAll();
        else
          $data_meditation = $this->model_meditation->getAllBySemaineId($semaine_id);


        $data['title'] = 'Méditations';
        $data["js"] = array(
                base_url().'assets/js/meditation.js'
        );
        
        $data['programmes'] = $this->model_programme->getAll();
        $data['semaines'] = $this->model_semaine->getAll();
        $data['meditations'] = $data_meditation;

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_meditation', $data);
        $this->load->view('home/includes/footer', $data);

    }

  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>