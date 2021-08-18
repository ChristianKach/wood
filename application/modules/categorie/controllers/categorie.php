<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Categorie';
        $data["js"] = array(
            base_url().'assets/js/categorie.js'
        );

        $data['categories'] = $this->model_categorie->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_categorie', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('categorie_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['categorie_libelle'] = $this->input->post('categorie_libelle');

           $annee_id = $this->model_categorie->save($data);

           $this->session->set_flashdata('add', 'Categorie enregistrée!'); 

           redirect('categorie');

        }

        $data['categories'] = $this->model_categorie->getAll();

        $data['title'] = 'Niveaux';
        $data["js"] = array(
            base_url().'assets/js/categorie.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_categorie', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$categorie_id = (int) $this->uri->segment(3)) {
            redirect('categorie');
        }

        if(isset($_POST['niveau_id'])) {
            $this->form_validation->set_rules('categorie_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['categorie_id']          = $this->input->post('categorie_id');
               $data['categorie_libelle']     = $this->input->post('categorie_libelle');

               $this->model_categorie->update($this->input->post('categorie_id'), $data);

               $this->session->set_flashdata('update', 'Annee mise à jour!'); 

               redirect('categorie');

                }
            }    


            $categorie = $this->model_categorie->getById($categorie_id);
            if(empty($categorie)) {
                redirect('categorie');
            }
            $categorie = $categorie[0];
            $data['categorie'] = $categorie;
            $data['categories'] = $this->model_categorie->getAll();

            $data['title'] = 'Categorie';
            $data["js"] = array(
                base_url().'assets/js/categorie.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_categorie', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$categorie_id = (int) $this->uri->segment(3)) {
            redirect('categorie');
        }
        
        try {
            $this->model_categorie->delete($categorie_id);
            $this->session->set_flashdata('delete', 'Categorie supprimé!');
        } catch(Exception $e) {
            redirect('categorie');
        }

        redirect('categorie'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('categorie');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_categorie->delete($i);
      }
      $this->session->set_flashdata('delete', 'Categorie(s) supprimé(s)');
      redirect('categorie');
    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>