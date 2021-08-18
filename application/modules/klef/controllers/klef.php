<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Klef extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('klef/model_klef');
    }

    public function index() {
        $data['title'] = 'Klef';
        $data["js"] = array(
            base_url().'assets/js/klef.js'
        );

        $data['klefs'] = $this->model_klef->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_klef', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('klef_libelle');
        $this->form_validation->set_rules('klef_apui');
        $this->form_validation->set_rules('klef_port');
        
        if ($this->form_validation->run()) {
           $data['klef_libelle'] = $this->input->post('klef_libelle');
           $data['klef_apui'] = $this->input->post('klef_apui');
           $data['klef_port'] = $this->input->post('klef_port');

           $klef_id = $this->model_klef->save($data);

           $this->session->set_flashdata('add', 'Klef enregistré!'); 

           redirect('klef');

        }

        $data['klefs'] = $this->model_klef->getAll();

        $data['title'] = 'Klef';
        $data["js"] = array(
            base_url().'assets/js/klef.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_klef', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$klef_id = (int) $this->uri->segment(3)) {
            redirect('klef');
        }

        if(isset($_POST['klef_id'])) {
            $this->form_validation->set_rules('klef_libelle');
            $this->form_validation->set_rules('klef_apui');
            $this->form_validation->set_rules('klef_port');

            
            if ($this->form_validation->run()) {
               $data['klef_id'] = $this->input->post('klef_id');
               $data['klef_libelle'] = $this->input->post('klef_libelle');
               $data['klef_apui'] = $this->input->post('klef_apui');
               $data['klef_port'] = $this->input->post('klef_port');

               $this->model_klef->update($this->input->post('klef_id'), $data);

               $this->session->set_flashdata('update', 'Klef mis à jour!'); 

               redirect('klef');

                }
            }    


            $klef = $this->model_klef->getById($klef_id);
            if(empty($klef)) {
                redirect('klef');
            }
            $klef = $klef[0];
            $data['klef'] = $klef;
            $data['klefs'] = $this->model_klef->getAll();

            $data['title'] = 'Klef';
            $data["js"] = array(
                base_url().'assets/js/klef.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_klef', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$klef_id= (int) $this->uri->segment(3)) {
            redirect('klef');
        }
        
        try {
            $this->model_klef->delete($klef_id);
            $this->session->set_flashdata('delete', 'Type de bois supprimé!');
        } catch(Exception $e) {
            redirect('klef');
        }

        redirect('klef'); 
    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>