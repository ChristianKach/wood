<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Batiment extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('batiment/model_batiment');
        $this->load->model('programme/model_programme');
    }

    public function index() {
        $data['title'] = 'Batiments';
        $data["js"] = array(
            base_url().'assets/js/batiment.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['batiments'] = $this->model_batiment->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_batiment', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');
        $this->form_validation->set_rules('batiment_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['programme_id'] = $this->input->post('programme_id');
           $data['batiment_libelle'] = $this->input->post('batiment_libelle');
           $data['batiment_number_room'] = $this->input->post('batiment_number_room');

           $batiment_id = $this->model_batiment->save($data);

           $this->session->set_flashdata('add', 'Batiment enregistré!'); 

           redirect('batiment');

        }

        $data['programmes'] = $this->model_programme->getAll();
        $data['batiments'] = $this->model_batiment->getAll();

        $data['title'] = 'Batiments';
        $data["js"] = array(
            base_url().'assets/js/batiment.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_batiment', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$batiment_id = (int) $this->uri->segment(3)) {
            redirect('batiment');
        }

        if(isset($_POST['batiment_id'])) {
            $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');
            $this->form_validation->set_rules('batiment_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');

            
            if ($this->form_validation->run()) {
               $data['programme_id']        = $this->input->post('programme_id');
               $data['batiment_id']          = $this->input->post('batiment_id');
               $data['batiment_libelle']     = $this->input->post('batiment_libelle');
               $data['batiment_number_room']     = $this->input->post('batiment_number_room');

               $this->model_batiment->update($this->input->post('batiment_id'), $data);

               $this->session->set_flashdata('update', 'Batiment mis à jour!'); 

               redirect('batiment');

                }
            }    

            $data['programmes'] = $this->model_programme->getAll();

            $batiment = $this->model_batiment->getById($batiment_id);
            if(empty($batiment)) {
                redirect('batiment');
            }
            $batiment = $batiment[0];
            $data['batiment'] = $batiment;
            $data['programme_id'] = $batiment->programme_id;
            $data['batiments'] = $this->model_batiment->getAll();

            $data['title'] = 'Batiments';
            $data["js"] = array(
                base_url().'assets/js/batiment.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_batiment', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$batiment_id = (int) $this->uri->segment(3)) {
            redirect('batiment');
        }
        
        try {
            $this->model_batiment->delete($batiment_id);
            $this->session->set_flashdata('delete', 'Batiment supprimé!');
        } catch(Exception $e) {
            redirect('batiment');
        }

        redirect('batiment'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('batiment');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_batiment->delete($i);
      }
      $this->session->set_flashdata('delete', 'Batiment(s) supprimé(s)');
      redirect('batiment');
    }


    
    public function programme() {
        $programme_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$programme_id)
          $data_batiment = $this->model_batiment->getAll();
        else
          $data_batiment = $this->model_batiment->getAllByProgrammeId($programme_id);


        $data['title'] = 'Batiments';
        $data["js"] = array(
                base_url().'assets/js/batiment.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['batiments'] = $data_batiment;

        $data['title'] = 'Batiments';
        $data["js"] = array(
            base_url().'assets/js/batiment.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_batiment', $data);
        $this->load->view('home/includes/footer', $data);

    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>