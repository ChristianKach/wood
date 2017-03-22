<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Traitement extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('malade/model_malade');
        $this->load->model('traitement/model_traitement');
        $this->load->model('adherant/model_adherant');
        $this->load->model('programme/model_programme');
        $this->load->model('article/model_article');
    }

    public function index() {
        $data['title'] = 'Traitement';
        $data["js"] = array(
            base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
            base_url().'assets/js/traitement.js'
        );  

        $data["css"] = array(
            base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
        ); 

        $data['traitements'] = $this->model_traitement->getAll();
        $data['malades'] = $this->model_malade->getAll();
        $data['articles'] = $this->model_article->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_traitement', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('malade_id', 'Malade', 'trim|required|xss_clean');

        $this->form_validation->set_rules('traitement_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');

        $this->form_validation->set_rules('traitement_point_priere', 'Point de prière', 'trim|required|xss_clean');

        $this->form_validation->set_rules('traitement_date_start', 'Date début du traitement', 'trim|required|xss_clean');

        $this->form_validation->set_rules('traitement_date_end', 'Date find du traitement', 'trim|required|xss_clean');

        $this->form_validation->set_rules('traitement_next_rendez_vous', 'Date du prochain rendez-vous', 'trim|required|xss_clean');
 
        
        if ($this->form_validation->run()) {
           $data['malade_id'] = $this->input->post('malade_id');
           $data['traitement_libelle'] = $this->input->post('traitement_libelle');
           $data['traitement_point_priere'] = $this->input->post('traitement_point_priere');
           $data['traitement_date_start'] = formatDateToDB($this->input->post('traitement_date_start'));
           $data['traitement_date_end'] = formatDateToDB($this->input->post('traitement_date_end'));
           $data['traitement_next_rendez_vous'] = formatDateToDB($this->input->post('traitement_next_rendez_vous'));

           $data['traitement_ordonnance'] = $this->input->post('traitement_ordonnance');
           $data['traitement_deliberation_final'] = $this->input->post('traitement_deliberation_final');
           $data['article_id'] = $this->input->post('article_id'); 

           $malade_id = $this->model_traitement->save($data);

           $this->session->set_flashdata('add', 'Traitément enregistrée!'); 

           redirect('traitement');

        }

        $data['title'] = 'Traitements';
        $data["js"] = array(
            base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
            base_url().'assets/js/traitement.js'
        );  

        $data["css"] = array(
            base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
        ); 

        $data['traitements'] = $this->model_traitement->getAll();
        $data['malades'] = $this->model_malade->getAll();
        $data['articles'] = $this->model_article->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_traitement', $data);
        $this->load->view('home/includes/footer', $data);

    }

    public function update() {
        if(!$traitement_id = (int) $this->uri->segment(3)) {
            redirect('traitement');
        }

        if(isset($_POST['traitement_id'])) {
            $this->form_validation->set_rules('malade_id', 'Malade', 'trim|required|xss_clean');

            $this->form_validation->set_rules('traitement_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');

            $this->form_validation->set_rules('traitement_point_priere', 'Point de prière', 'trim|required|xss_clean');

            $this->form_validation->set_rules('traitement_date_start', 'Date début du traitement', 'trim|required|xss_clean');

            $this->form_validation->set_rules('traitement_date_end', 'Date find du traitement', 'trim|required|xss_clean');

            $this->form_validation->set_rules('traitement_next_rendez_vous', 'Date du prochain rendez-vous', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['malade_id'] = $this->input->post('malade_id');
               $data['traitement_libelle'] = $this->input->post('traitement_libelle');
               $data['traitement_point_priere'] = $this->input->post('traitement_point_priere');
               $data['traitement_date_start'] = formatDateToDB($this->input->post('traitement_date_start'));
               $data['traitement_date_end'] = formatDateToDB($this->input->post('traitement_date_end'));
               $data['traitement_next_rendez_vous'] = formatDateToDB($this->input->post('traitement_next_rendez_vous'));

               $data['traitement_ordonnance'] = $this->input->post('traitement_ordonnance');
               $data['traitement_deliberation_final'] = $this->input->post('traitement_deliberation_final');
               $data['article_id'] = $this->input->post('article_id');

               $this->model_traitement->update($this->input->post('traitement_id'), $data);

               $this->session->set_flashdata('update', 'Traitement mis à jour!'); 

               redirect('traitement');

                }
            }    

            $traitement = $this->model_traitement->getById($traitement_id);
            if(empty($traitement)) {
                redirect('traitement');
            }
            $traitement = $traitement[0];
            $data['traitement'] = $traitement;

            if($traitement->traitement_date_start)
                $traitement->traitement_date_start = formatDateToPHP($traitement->traitement_date_start);

            if($traitement->traitement_date_end)
                $traitement->traitement_date_end = formatDateToPHP($traitement->traitement_date_end);

            if($traitement->traitement_next_rendez_vous)
                $traitement->traitement_next_rendez_vous = formatDateToPHP($traitement->traitement_next_rendez_vous);

            $data['malade_id'] = $traitement->malade_id;
            if($traitement->article_id)
                $data['article_id'] = $traitement->article_id;

            $data['traitements'] = $this->model_traitement->getAll();
            $data['malades'] = $this->model_malade->getAll();
            $data['articles'] = $this->model_article->getAll();

           

            $data['title'] = 'Traitements';
            $data["js"] = array(
                base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
                base_url().'assets/js/traitement.js'
            );  

            $data["css"] = array(
                base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
            ); 
            
            

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_traitement', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$traitement_id = (int) $this->uri->segment(3)) {
            redirect('traitement');
        }
        
        try {
            $this->model_traitement->delete($traitement_id);
            $this->session->set_flashdata('delete', 'Traitement supprimé!');
        } catch(Exception $e) {
            redirect('traitement');
        }

        redirect('traitement'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('traitement');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_traitement->delete($i);
      }
      $this->session->set_flashdata('delete', 'Traitement(s) supprimé(s)');
      redirect('traitement');
    }


    
    public function malade() {
        $malade_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$malade_id)
          $data_traitements = $this->model_traitement->getAll();
        else
          $data_traitements = $this->model_traitement->getAllByMaladeId($malade_id);


        $data['title'] = 'Traitements';
        $data["js"] = array(
            base_url().'assets/template/vendors/select2/dist/js/select2.full.min.js',
            base_url().'assets/js/traitement.js'
        );  

        $data["css"] = array(
            base_url().'assets/template/vendors/select2/dist/css/select2.min.css'
        ); 

        $data['traitements'] = $data_traitements;
        $data['malades'] = $this->model_malade->getAll();
        $data['articles'] = $this->model_article->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_traitement', $data);
        $this->load->view('home/includes/footer', $data);

    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>