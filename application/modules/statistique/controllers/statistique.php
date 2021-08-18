<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Niveau extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('niveau/model_niveau');
    }

    public function index() {
        $data['title'] = 'Niveau';
        $data["js"] = array(
            base_url().'assets/js/niveau.js'
        );

        $data['niveaux'] = $this->model_niveau->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_niveau', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('niveau_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['niveau_libelle'] = $this->input->post('niveau_libelle');

           $annee_id = $this->model_niveau->save($data);

           $this->session->set_flashdata('add', 'Niveau enregistrée!'); 

           redirect('niveau');

        }

        $data['niveaux'] = $this->model_niveau->getAll();

        $data['title'] = 'Niveaux';
        $data["js"] = array(
            base_url().'assets/js/niveau.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_niveau', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$niveau_id = (int) $this->uri->segment(3)) {
            redirect('niveau');
        }

        if(isset($_POST['niveau_id'])) {
            $this->form_validation->set_rules('niveau_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['niveau_id']          = $this->input->post('niveau_id');
               $data['niveau_libelle']     = $this->input->post('niveau_libelle');

               $this->model_niveau->update($this->input->post('niveau_id'), $data);

               $this->session->set_flashdata('update', 'Annee mise à jour!'); 

               redirect('niveau');

                }
            }    


            $niveau = $this->model_niveau->getById($niveau_id);
            if(empty($niveau)) {
                redirect('niveau');
            }
            $niveau = $niveau[0];
            $data['niveau'] = $niveau;
            $data['niveaux'] = $this->model_niveau->getAll();

            $data['title'] = 'Familles';
            $data["js"] = array(
                base_url().'assets/js/niveau.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_niveau', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$niveau_id = (int) $this->uri->segment(3)) {
            redirect('niveau');
        }
        
        try {
            $this->model_niveau->delete($niveau_id);
            $this->session->set_flashdata('delete', 'Niveau supprimé!');
        } catch(Exception $e) {
            redirect('niveau');
        }

        redirect('niveau'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('niveau');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_niveau->delete($i);
      }
      $this->session->set_flashdata('delete', 'Niveau(s) supprimé(s)');
      redirect('niveau');
    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>