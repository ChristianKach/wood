<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Materiel extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('materiel/model_materiel');
        $this->load->model('programme/model_programme');
    }

    public function index() {
        $data['title'] = 'Matériel';
        $data["js"] = array(
            base_url().'assets/js/materiel.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['materiels'] = $this->model_materiel->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_materiel', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');
        $this->form_validation->set_rules('materiel_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('materiel_marque', 'Marque', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('materiel_date_acquisition', 'Date acquisition',
          'trim|required|max_length[15]|xss_clean');

        $this->form_validation->set_rules('materiel_quantity', 'Qunatité', 'trim|required|integer|xss_clean');

        $this->form_validation->set_rules('materiel_quality', 'Qualité', 'trim|max_length[150]|required|xss_clean');

        $this->form_validation->set_rules('materiel_nombre_reparation', 'Nombre de réception', 'trim|required|integer|xss_clean');

        $this->form_validation->set_rules('materiel_fonctionel', 'Fonctionel', 'trim|max_length[5]|required|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['programme_id'] = $this->input->post('programme_id');
           $data['materiel_libelle'] = $this->input->post('materiel_libelle');
           $data['materiel_marque'] = $this->input->post('materiel_marque');
           $data['materiel_date_acquisition'] = formatDateToDB($this->input->post('materiel_date_acquisition'));
           $data['materiel_quantity'] = $this->input->post('materiel_quantity');
           $data['materiel_quality'] = $this->input->post('materiel_quality');
           $data['materiel_nombre_reparation'] = $this->input->post('materiel_nombre_reparation');
           $data['materiel_fonctionel'] = $this->input->post('materiel_fonctionel');

           $materiel_id = $this->model_materiel->save($data);

           $this->session->set_flashdata('add', 'Matériel enregistré!'); 

           redirect('materiel');

        }

        $data['programmes'] = $this->model_programme->getAll();
        $data['materiels'] = $this->model_materiel->getAll();

        $data['title'] = 'Matériels';
        $data["js"] = array(
            base_url().'assets/js/materiel.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_materiel', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$materiel_id = (int) $this->uri->segment(3)) {
            redirect('materiel');
        }

        if(isset($_POST['materiel_id'])) {
            $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');
            $this->form_validation->set_rules('materiel_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('materiel_marque', 'Marque', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('materiel_date_acquisition', 'Date acquisition',
              'trim|required|max_length[15]|xss_clean');

            $this->form_validation->set_rules('materiel_quantity', 'Qunatité', 'trim|required|integer|xss_clean');

            $this->form_validation->set_rules('materiel_quality', 'Qualité', 'trim|max_length[150]|required|xss_clean');

            $this->form_validation->set_rules('materiel_nombre_reparation', 'Nombre de réception', 'trim|required|integer|xss_clean');

            $this->form_validation->set_rules('materiel_fonctionel', 'Fonctionel', 'trim|max_length[5]|required|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['programme_id'] = $this->input->post('programme_id');
               $data['materiel_libelle'] = $this->input->post('materiel_libelle');
               $data['materiel_marque'] = $this->input->post('materiel_marque');
               $data['materiel_date_acquisition'] = formatDateToDB($this->input->post('materiel_date_acquisition'));
               $data['materiel_quantity'] = $this->input->post('materiel_quantity');
               $data['materiel_quality'] = $this->input->post('materiel_quality');
               $data['materiel_nombre_reparation'] = $this->input->post('materiel_nombre_reparation');
               $data['materiel_fonctionel'] = $this->input->post('materiel_fonctionel');

               $this->model_materiel->update($this->input->post('materiel_id'), $data);

               $this->session->set_flashdata('update', 'Matériel mis à jour!'); 

               redirect('materiel');

                }
            }    

            $data['programmes'] = $this->model_programme->getAll();

            $materiel = $this->model_materiel->getById($materiel_id);
            if(empty($materiel)) {
                redirect('materiel');
            }
            
            $materiel = $materiel[0];
            if($materiel->materiel_date_acquisition)
                $materiel->materiel_date_acquisition = formatDateToPHP($materiel->materiel_date_acquisition);
            
            $data['materiel'] = $materiel;

            $data['programme_id'] = $materiel->programme_id;
            $data['materiels'] = $this->model_materiel->getAll();

            $data['title'] = 'Matériels';
            $data["js"] = array(
                base_url().'assets/js/materiel.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_materiel', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$materiel_id = (int) $this->uri->segment(3)) {
            redirect('materiel');
        }
        
        try {
            $this->model_materiel->delete($materiel_id);
            $this->session->set_flashdata('delete', 'Matériel supprimé!');
        } catch(Exception $e) {
            redirect('materiel');
        }

        redirect('materiel'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('materiel');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_materiel->delete($i);
      }
      $this->session->set_flashdata('delete', 'Matériel(s) supprimé(s)');
      redirect('materiel');
    }


    
    public function programme() {
        $programme_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$programme_id)
          $data_materiel = $this->model_materiel->getAll();
        else
          $data_materiel = $this->model_materiel->getAllByProgrammeId($programme_id);


        $data['title'] = 'Matériels';
        $data["js"] = array(
                base_url().'assets/js/materiel.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['materiels'] = $data_materiel;

        $data['title'] = 'Matériels';
        $data["js"] = array(
            base_url().'assets/js/materiel.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_materiel', $data);
        $this->load->view('home/includes/footer', $data);

    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>