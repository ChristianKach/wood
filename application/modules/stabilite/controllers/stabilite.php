<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stabilite extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('stabilite/model_stabilite');
    }

    public function index() {
        $data['title'] = 'Stabilite';
        $data["js"] = array(
            base_url().'assets/js/stabilite.js'
        );

        $data['stabilites'] = $this->model_stabilite->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_stabilite', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('stabilite_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['stabilite_libelle'] = $this->input->post('stabilite_libelle');

           $stabilite_id = $this->model_stabilite->save($data);

           $this->session->set_flashdata('add', 'Stabilite enregistrée!'); 

           redirect('stabilite');

        }

        $data['stabilites'] = $this->model_stabilite->getAll();

        $data['title'] = 'stabilites';
        $data["js"] = array(
            base_url().'assets/js/stabilite.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_stabilite', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$stabilite_id = (int) $this->uri->segment(3)) {
            redirect('stabilite');
        }

        if(isset($_POST['stabilite_id'])) {
            $this->form_validation->set_rules('stabilite_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['stabilite_id']          = $this->input->post('stabilite_id');
               $data['stabilite_libelle']     = $this->input->post('stabilite_libelle');

               $this->model_stabilite->update($this->input->post('stabilite_id'), $data);

               $this->session->set_flashdata('update', 'Tabilite mise à jour!'); 

               redirect('stabilite');

                }
            }    


            $stabilite = $this->model_stabilite->getById($stabilite_id);
            if(empty($stabilite)) {
                redirect('stabilite');
            }
            $stabilite = $stabilite[0];
            $data['stabilite'] = $stabilite;
            $data['stabilites'] = $this->model_stabilite->getAll();

            $data['title'] = 'stabilite';
            $data["js"] = array(
                base_url().'assets/js/stabilite.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_stabilite', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$stabilite_id= (int) $this->uri->segment(3)) {
            redirect('stabilite');
        }
        
        try {
            $this->model_stabilite->delete($stabilite_id);
            $this->session->set_flashdata('delete', 'Stabilite supprimée!');
        } catch(Exception $e) {
            redirect('stabilite');
        }

        redirect('stabilite'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('stabilite');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_stabilite->delete($i);
      }
      $this->session->set_flashdata('delete', 'Stabilité(s) supprimé(s)');
      redirect('stabilite');
    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>