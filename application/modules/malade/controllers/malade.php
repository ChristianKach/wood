<?php defined('BASEPATH') OR exit('No direct script access allowed');

class malade extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('malade/model_malade');
        $this->load->model('adherant/model_adherant');
        $this->load->model('programme/model_programme');
    }

    public function index() {
        $data['title'] = 'Malades';
        $data["js"] = array(
            base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
            base_url().'assets/js/malade.js'
        );  

        $data["css"] = array(
            base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
        ); 

        $data['adherants'] = $this->model_adherant->getAll();
        $data['malades'] = $this->model_malade->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_malade', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('adherant_id', 'Adhérant', 'trim|required|xss_clean');
        $this->form_validation->set_rules('maladie_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['adherant_id'] = $this->input->post('adherant_id');
           $data['maladie_libelle'] = $this->input->post('maladie_libelle');
           $data['maladie_healed'] = $this->input->post('maladie_healed');

           $malade_id = $this->model_malade->save($data);

           $this->session->set_flashdata('add', 'Malade enregistrée!'); 

           redirect('malade');

        }

        $data['title'] = 'Malades';
        $data["js"] = array(
            base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
            base_url().'assets/js/malade.js'
        );  

        $data["css"] = array(
            base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
        ); 

        $data['adherants'] = $this->model_adherant->getAll();
        $data['malades'] = $this->model_malade->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_malade', $data);
        $this->load->view('home/includes/footer', $data);

    }

    public function update() {
        if(!$malade_id = (int) $this->uri->segment(3)) {
            redirect('malade');
        }

        if(isset($_POST['malade_id'])) {
            $this->form_validation->set_rules('adherant_id', 'Adhérant', 'trim|required|xss_clean');
        $this->form_validation->set_rules('maladie_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['adherant_id'] = $this->input->post('adherant_id');
               $data['maladie_libelle'] = $this->input->post('maladie_libelle');
               $data['maladie_healed'] = $this->input->post('maladie_healed');

               $this->model_malade->update($this->input->post('malade_id'), $data);

               $this->session->set_flashdata('update', 'Malade mise à jour!'); 

               redirect('malade');

                }
            }    

            $malade = $this->model_malade->getById($malade_id);
            if(empty($malade)) {
                redirect('malade');
            }
            $malade = $malade[0];
            $data['malade'] = $malade;
            $data['adherant_id'] = $malade->adherant_id;

            $data['malades'] = $this->model_malade->getAll();
            $data['adherants'] = $this->model_adherant->getAll();

           

            $data['title'] = 'Malades';
            $data["js"] = array(
                base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
                base_url().'assets/js/malade.js'
            );  

            $data["css"] = array(
                base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
            ); 
            
            

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_malade', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$malade_id = (int) $this->uri->segment(3)) {
            redirect('malade');
        }
        
        try {
            $this->model_malade->delete($malade_id);
            $this->session->set_flashdata('delete', 'Malade supprimée!');
        } catch(Exception $e) {
            redirect('malade');
        }

        redirect('malade'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('malade');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_malade->delete($i);
      }
      $this->session->set_flashdata('delete', 'Malade(s) supprimée(s)');
      redirect('malade');
    }


    
    public function adherant() {
        $adherant_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$adherant_id)
          $data_malade = $this->model_malade->getAll();
        else
          $data_malade = $this->model_malade->getAllByAdhereantId($adherant_id);


        $data['title'] = 'Malades';
        $data["js"] = array(
            base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
            base_url().'assets/js/malade.js'
        );  

        $data["css"] = array(
            base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
        ); 

        $data['adherants'] = $this->model_adherant->getAll();
        $data['malades'] = $data_malade;

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_malade', $data);
        $this->load->view('home/includes/footer', $data);

    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>