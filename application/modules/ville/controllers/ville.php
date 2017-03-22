<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ville extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('programme/model_programme');
    }

    public function index() {
        $data['title'] = 'Programmes';
        $data["js"] = array(
            base_url().'assets/js/programme.js'
        );

        $data['programmes'] = $this->model_programme->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_programme', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
    
        $this->form_validation->set_rules('programme_libelle', 'Libellé', 'trim|required|xss_clean');
        $this->form_validation->set_rules('programme_theme', 'Thème', 'trim|required|xss_clean');
        $this->form_validation->set_rules('programme_date_start', 'Date de début', 'trim|required|xss_clean');
        $this->form_validation->set_rules('programme_date_end', 'Date de fin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('programme_lieu', 'Lieu', 'trim|required|xss_clean');
        $this->form_validation->set_rules('programme_montant_participation', 'Montant de participation', 'trim|required|numeric|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['programme_libelle'] = $this->input->post('programme_libelle');
           $data['programme_theme'] = $this->input->post('programme_theme');
           $data['programme_date_start'] = formatDateToDB($this->input->post('programme_date_start'));
           $data['programme_date_end'] = formatDateToDB($this->input->post('programme_date_end'));
           $data['programme_lieu'] = $this->input->post('programme_lieu');
           $data['programme_montant_participation'] = $this->input->post('programme_montant_participation');
           $data['programme_created_at'] = date('Y-m-d H:i:s');

           $programme_id = $this->model_programme->save($data);

           $this->session->set_flashdata('add', 'Programme enregistré!'); 

           redirect('programme');

        }

        $data['title'] = 'Programmes';
        $data["js"] = array(
            base_url().'assets/js/programme.js'
        );    

        $data['programmes'] = $this->model_programme->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_programme', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$programme_id = (int) $this->uri->segment(3)) {
            redirect('programme');
        }

    
        if(isset($_POST['programme_id'])) {
            $this->form_validation->set_rules('programme_libelle', 'Libellé', 'trim|required|xss_clean');
            $this->form_validation->set_rules('programme_theme', 'Thème', 'trim|required|xss_clean');
            $this->form_validation->set_rules('programme_date_start', 'Date de début', 'trim|required|xss_clean');
            $this->form_validation->set_rules('programme_date_end', 'Date de fin', 'trim|required|xss_clean');
            $this->form_validation->set_rules('programme_lieu', 'Lieu', 'trim|required|xss_clean');
            $this->form_validation->set_rules('programme_montant_participation', 'Montant de participation', 'trim|required|numeric|xss_clean');
            
            if ($this->form_validation->run()) {
               
               $data['programme_libelle'] = $this->input->post('programme_libelle');
               $data['programme_theme'] = $this->input->post('programme_theme');
               $data['programme_date_start'] = formatDateToDB($this->input->post('programme_date_start'));
               $data['programme_date_end'] = formatDateToDB($this->input->post('programme_date_end'));
               $data['programme_lieu'] = $this->input->post('programme_lieu');
               $data['programme_montant_participation'] = $this->input->post('programme_montant_participation');
               $programme_id = $this->model_programme->update($this->input->post('programme_id'), $data);

               $this->session->set_flashdata('update', 'Programme mise à jour!'); 

               redirect('programme');

            }
        }    

        $programme = $this->model_programme->getById($programme_id);
        if(empty($programme)) {
            redirect('programme');
        }
        $programme = $programme[0];
        $programme->programme_date_start = formatDateToPHP($programme->programme_date_start);
        $programme->programme_date_end = formatDateToPHP($programme->programme_date_end);
        $data['programme'] = $programme;
        $data['programmes'] = $this->model_programme->getAll($programme_id);

        $data['title'] = 'Programmes';
        $data["js"] = array(
            base_url().'assets/js/programme.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_programme', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function delete() {
        if(!$programme_id = (int) $this->uri->segment(3)) {
            redirect('programme');
        }
        
        try {
            $this->model_programme->delete($programme_id);
            $this->session->set_flashdata('delete', 'Programme supprimé!');
        } catch(Exception $e) {
            redirect('programme');
        }

        redirect('programme'); 
    }

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */ ?>