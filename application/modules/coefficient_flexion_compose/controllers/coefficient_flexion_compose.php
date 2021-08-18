<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coefficient_flexion_compose extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('coefficient_flexion_compose/model_coefficient_flexion_compose');
    }

    public function index() {
        $data['title'] = 'Coefficient';
        $data["js"] = array(
            base_url().'assets/js/coefficient_flexion_compose.js'
        );

        $data['coefficient_flexion_composes'] = $this->model_coefficient_flexion_compose->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_coefficient_flexion_compose', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('kdef');
        $this->form_validation->set_rules('cm');
        $this->form_validation->set_rules('c0');
        $this->form_validation->set_rules('c1');
        $this->form_validation->set_rules('c2');
        
        if ($this->form_validation->run()) {
           $data['kdef'] = $this->input->post('kdef');
           $data['cm'] = $this->input->post('cm');
           $data['c0'] = $this->input->post('c0');
           $data['c1'] = $this->input->post('c1');
           $data['c2'] = $this->input->post('c2');

           $coefficient_flexion_compose_id = $this->model_coefficient_flexion_compose->save($data);

           $this->session->set_flashdata('add', 'Coefficient enregistré!'); 

           redirect('coefficient_flexion_compose');

        }

        $data['coefficient_flexion_composes'] = $this->model_coefficient_flexion_compose->getAll();

        $data['title'] = 'coefficients';
        $data["js"] = array(
            base_url().'assets/js/coefficient_flexion_compose.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_coefficient_flexion_compose', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$coefficient_flexion_compose_id = (int) $this->uri->segment(3)) {
            redirect('coefficient_flexion_compose');
        }

        if(isset($_POST['coefficient_flexion_compose_id'])) {
            $this->form_validation->set_rules('kdef');
            $this->form_validation->set_rules('cm');
            $this->form_validation->set_rules('c0');
            $this->form_validation->set_rules('c1');
            $this->form_validation->set_rules('c2');
            
            if ($this->form_validation->run()) {
               $data['coefficient_flexion_compose_id'] = $this->input->post('coefficient_flexion_compose_id');
               $data['kdef'] = $this->input->post('kdef');
               $data['cm'] = $this->input->post('cm');
               $data['c0'] = $this->input->post('c0');
               $data['c1'] = $this->input->post('c1');
               $data['c2'] = $this->input->post('c2');

               $this->model_coefficient_flexion_compose->update($this->input->post('coefficient_flexion_compose_id'), $data);

               $this->session->set_flashdata('update', 'Coefficient mis à jour!'); 

               redirect('coefficient_flexion_compose');

                }
            }    


            $coefficient_flexion_compose = $this->model_coefficient_flexion_compose->getById($coefficient_flexion_compose_id);
            if(empty($coefficient_flexion_compose)) {
                redirect('coefficient_flexion_compose');
            }
            $coefficient_flexion_compose = $coefficient_flexion_compose[0];
            $data['coefficient_flexion_compose'] = $coefficient_flexion_compose;
            $data['coefficient_flexion_composes'] = $this->model_coefficient_flexion_compose->getAll();

            $data['title'] = 'coefficient_flexion_compose';
            $data["js"] = array(
                base_url().'assets/js/coefficient_flexion_compose.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_coefficient_flexion_compose', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$coefficient_flexion_compose_id= (int) $this->uri->segment(3)) {
            redirect('coefficient_flexion_compose');
        }
        
        try {
            $this->model_klef->delete($coefficient_flexion_compose_id);
            $this->session->set_flashdata('delete', 'Coefficient supprimé!');
        } catch(Exception $e) {
            redirect('coefficient_flexion_compose');
        }

        redirect('coefficient_flexion_compose'); 
    }
    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>