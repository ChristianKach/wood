<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Semaine extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('semaine/model_semaine');
        $this->load->model('programme/model_programme');
    }

    public function index() {
        $data['title'] = 'Semaines';
        $data["js"] = array(
            base_url().'assets/js/semaine.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['semaines'] = $this->model_semaine->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_semaine', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');
        $this->form_validation->set_rules('semaine_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('semaine_date_range', 'Date', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['programme_id'] = $this->input->post('programme_id');
           $data['semaine_libelle'] = $this->input->post('semaine_libelle');
           $data['semaine_date_range'] = $this->input->post('semaine_date_range');

           $semaine_id = $this->model_semaine->save($data);

           $this->session->set_flashdata('add', 'Semaine enregistrée!'); 

           redirect('semaine');

        }

        $data['programmes'] = $this->model_programme->getAll();
        $data['semaines'] = $this->model_semaine->getAll();

        $data['title'] = 'Semaines';
        $data["js"] = array(
            base_url().'assets/js/semaine.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_semaine', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$semaine_id = (int) $this->uri->segment(3)) {
            redirect('semaine');
        }

        if(isset($_POST['semaine_id'])) {
            $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');
            $this->form_validation->set_rules('semaine_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('semaine_date_range', 'Date', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['programme_id']        = $this->input->post('programme_id');
               $data['semaine_id']          = $this->input->post('semaine_id');
               $data['semaine_libelle']     = $this->input->post('semaine_libelle');
               $data['semaine_date_range'] = $this->input->post('semaine_date_range');

               $this->model_semaine->update($this->input->post('semaine_id'), $data);

               $this->session->set_flashdata('update', 'Semaine mise à jour!'); 

               redirect('semaine');

                }
            }    

            $data['programmes'] = $this->model_programme->getAll();

            $semaine = $this->model_semaine->getById($semaine_id);
            if(empty($semaine)) {
                redirect('semaine');
            }
            $semaine = $semaine[0];
            $data['semaine'] = $semaine;
            $data['programme_id'] = $semaine->programme_id;
            $data['semaines'] = $this->model_semaine->getAll();

            $data['title'] = 'Semaines';
            $data["js"] = array(
                base_url().'assets/js/semaine.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_semaine', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$semaine_id = (int) $this->uri->segment(3)) {
            redirect('semaine');
        }
        
        try {
            $this->model_semaine->delete($semaine_id);
            $this->session->set_flashdata('delete', 'Semaine supprimée!');
        } catch(Exception $e) {
            redirect('semaine');
        }

        redirect('semaine'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('semaine');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_semaine->delete($i);
      }
      $this->session->set_flashdata('delete', 'Semaine(s) supprimée(s)');
      redirect('semaine');
    }


    
    public function programme() {
        $programme_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$programme_id)
          $data_semaine = $this->model_semaine->getAll();
        else
          $data_semaine = $this->model_semaine->getAllByProgrammeId($programme_id);


        $data['title'] = 'Semaines';
        $data["js"] = array(
                base_url().'assets/js/semaine.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['semaines'] = $data_semaine;

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_semaine', $data);
        $this->load->view('home/includes/footer', $data);

    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>