<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coefficient extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('coefficient/model_coefficient');
    }

    public function index() {
        $data['title'] = 'Coefficient';
        $data["js"] = array(
            base_url().'assets/js/coefficient.js'
        );

        $data['coefficients'] = $this->model_coefficient->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_coefficient', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('kdef');
        $this->form_validation->set_rules('vitesse_emb_ar');
        $this->form_validation->set_rules('cm');
        $this->form_validation->set_rules('c0');
        $this->form_validation->set_rules('c1');
        $this->form_validation->set_rules('c2');
        $this->form_validation->set_rules('klef');
        $this->form_validation->set_rules('charg');
        $this->form_validation->set_rules('km');
        $this->form_validation->set_rules('khy');
        $this->form_validation->set_rules('khz');
        
        if ($this->form_validation->run()) {
           $data['kdef'] = $this->input->post('kdef');
           $data['vitesse_emb_ar'] = $this->input->post('vitesse_emb_ar');
           $data['cm'] = $this->input->post('cm');
           $data['c0'] = $this->input->post('c0');
           $data['c1'] = $this->input->post('c1');
           $data['c2'] = $this->input->post('c2');
           $data['klef'] = $this->input->post('klef');
           $data['charg'] = $this->input->post('charg');
           $data['km'] = $this->input->post('km');
           $data['khy'] = $this->input->post('khy');
           $data['khz'] = $this->input->post('khz');

           $coefficient_id = $this->model_coefficient->save($data);

           $this->session->set_flashdata('add', 'Coefficient enregistré!'); 

           redirect('coefficient');

        }

        $data['coefficients'] = $this->model_coefficient->getAll();

        $data['title'] = 'coefficients';
        $data["js"] = array(
            base_url().'assets/js/coefficient.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_coefficient', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$coefficient_id = (int) $this->uri->segment(3)) {
            redirect('coefficient');
        }

        if(isset($_POST['coefficient_id'])) {
            $this->form_validation->set_rules('kdef');
            $this->form_validation->set_rules('kdef');
            $this->form_validation->set_rules('cm');
            $this->form_validation->set_rules('c0');
            $this->form_validation->set_rules('c1');
            $this->form_validation->set_rules('c2');
            $this->form_validation->set_rules('klef');
            $this->form_validation->set_rules('charg');
            $this->form_validation->set_rules('km');
            $this->form_validation->set_rules('khy');
            $this->form_validation->set_rules('khz');
            
            if ($this->form_validation->run()) {
               $data['coefficient_id'] = $this->input->post('coefficient_id');
               $data['kdef'] = $this->input->post('kdef');
               $data['vitesse_emb_ar'] = $this->input->post('vitesse_emb_ar');
               $data['cm'] = $this->input->post('cm');
               $data['c0'] = $this->input->post('c0');
               $data['c1'] = $this->input->post('c1');
               $data['c2'] = $this->input->post('c2');
               $data['klef'] = $this->input->post('klef');
               $data['charg'] = $this->input->post('charg');
               $data['km'] = $this->input->post('km');
               $data['khy'] = $this->input->post('khy');
               $data['khz'] = $this->input->post('khz');

               $this->model_coefficient->update($this->input->post('coefficient_id'), $data);

               $this->session->set_flashdata('update', 'Tabilite mise à jour!'); 

               redirect('coefficient');

                }
            }    


            $coefficient = $this->model_coefficient->getById($coefficient_id);
            if(empty($coefficient)) {
                redirect('coefficient');
            }
            $coefficient = $coefficient[0];
            $data['coefficient'] = $coefficient;
            $data['coefficients'] = $this->model_coefficient->getAll();

            $data['title'] = 'coefficient';
            $data["js"] = array(
                base_url().'assets/js/coefficient.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_coefficient', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$coefficient_id= (int) $this->uri->segment(3)) {
            redirect('coefficient');
        }
        
        try {
            $this->model_klef->delete($coefficient_id);
            $this->session->set_flashdata('delete', 'Coefficient supprimé!');
        } catch(Exception $e) {
            redirect('coefficient');
        }

        redirect('coefficient'); 
    }
    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>