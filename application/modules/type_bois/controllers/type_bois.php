<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Type_bois extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('type_bois/model_type_bois');
    }

    public function index() {
        $data['title'] = 'Type_bois';
        $data["js"] = array(
            base_url().'assets/js/type_bois.js'
        );

        $data['types_bois'] = $this->model_type_bois->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_type_bois', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('type_bois_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['type_bois_libelle'] = $this->input->post('type_bois_libelle');

           $annee_id = $this->model_type_bois->save($data);

           $this->session->set_flashdata('add', 'Type_bois enregistrée!'); 

           redirect('type_bois');

        }

        $data['types_bois'] = $this->model_type_bois->getAll();

        $data['title'] = 'Type_bois';
        $data["js"] = array(
            base_url().'assets/js/type_bois.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_type_bois', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$type_bois_id = (int) $this->uri->segment(3)) {
            redirect('type_bois');
        }

        if(isset($_POST['type_bois_id'])) {
            $this->form_validation->set_rules('type_bois_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['type_bois_id']          = $this->input->post('type_bois_id');
               $data['type_bois_libelle']     = $this->input->post('type_bois_libelle');

               $this->model_type_bois->update($this->input->post('type_bois_id'), $data);

               $this->session->set_flashdata('update', 'Type de bois mise à jour!'); 

               redirect('type_bois');

                }
            }    


            $type_bois = $this->model_type_bois->getById($type_bois_id);
            if(empty($type_bois)) {
                redirect('type_bois');
            }
            $type_bois = $type_bois[0];
            $data['type_bois'] = $type_bois;
            $data['types_bois'] = $this->model_type_bois->getAll();

            $data['title'] = 'Type_bois';
            $data["js"] = array(
                base_url().'assets/js/type_bois.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_type_bois', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$type_bois_id= (int) $this->uri->segment(3)) {
            redirect('type_bois');
        }
        
        try {
            $this->model_type_bois->delete($type_bois_id);
            $this->session->set_flashdata('delete', 'Type de bois supprimé!');
        } catch(Exception $e) {
            redirect('type_bois');
        }

        redirect('type_bois'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('type_bois');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_type_bois->delete($i);
      }
      $this->session->set_flashdata('delete', 'Stabilité(s) supprimé(s)');
      redirect('type_bois');
    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>