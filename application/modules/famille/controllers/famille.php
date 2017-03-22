<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Famille extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('famille/model_famille');
    }

    public function index() {
        $data['title'] = 'Famille';
        $data["js"] = array(
            base_url().'assets/js/famille.js'
        );

        $data['familles'] = $this->model_famille->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_famille', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('famille_nom', 'Nom', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['famille_nom'] = $this->input->post('famille_nom');

           $famille_id = $this->model_famille->save($data);

           $this->session->set_flashdata('add', 'Famille enregistrée!'); 

           redirect('famille');

        }

        $data['familles'] = $this->model_famille->getAll();

        $data['title'] = 'Familles';
        $data["js"] = array(
            base_url().'assets/js/famille.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_famille', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$famille_id = (int) $this->uri->segment(3)) {
            redirect('famille');
        }

        if(isset($_POST['famille_id'])) {
            $this->form_validation->set_rules('famille_nom', 'Nom', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['famille_id']          = $this->input->post('famille_id');
               $data['famille_nom']     = $this->input->post('famille_nom');

               $this->model_famille->update($this->input->post('famille_id'), $data);

               $this->session->set_flashdata('update', 'Famille mise à jour!'); 

               redirect('famille');

                }
            }    


            $famille = $this->model_famille->getById($famille_id);
            if(empty($famille)) {
                redirect('famille');
            }
            $famille = $famille[0];
            $data['famille'] = $famille;
            $data['familles'] = $this->model_famille->getAll();

            $data['title'] = 'Familles';
            $data["js"] = array(
                base_url().'assets/js/famille.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_famille', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$famille_id = (int) $this->uri->segment(3)) {
            redirect('famille');
        }
        
        try {
            $this->model_famille->delete($famille_id);
            $this->session->set_flashdata('delete', 'Famille supprimé!');
        } catch(Exception $e) {
            redirect('famille');
        }

        redirect('famille'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('famille');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_famille->delete($i);
      }
      $this->session->set_flashdata('delete', 'Famille(s) supprimé(s)');
      redirect('famille');
    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>