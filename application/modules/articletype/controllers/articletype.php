<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Articletype extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('articletype/model_articletype');
    }

    public function index() {
        $data['title'] = 'Type article';
        $data["js"] = array(
            base_url().'assets/js/articletype.js'
        );

        $data['article_types'] = $this->model_articletype->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_articletype', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('article_type_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['article_type_libelle'] = $this->input->post('article_type_libelle');

           $package_id = $this->model_articletype->save($data);

           $this->session->set_flashdata('add', 'Type article enregistré!'); 

           redirect('articletype');

        }

        $data['article_types'] = $this->model_articletype->getAll();

        $data['title'] = 'Type article';
        $data["js"] = array(
            base_url().'assets/js/articletype.js'
        );
        
        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_articletype', $data);
        $this->load->view('home/includes/footer', $data);
        
    }

    public function update() {
        if(!$article_type_id = (int) $this->uri->segment(3)) {
            redirect('articletype');
        }

        if(isset($_POST['article_type_id'])) {
            $this->form_validation->set_rules('article_type_id', 'Libellé', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['article_type_libelle'] = $this->input->post('article_type_libelle');

               $this->model_articletype->update($this->input->post('article_type_id'), $data);

               $this->session->set_flashdata('update', 'Type article mis à jour!'); 

               redirect('articletype');

            }
        }    

        $data['article_types'] = $this->model_articletype->getAll();

        $article_type = $this->model_articletype->getById($article_type_id);
        if(empty($article_type)) {
            redirect('articletype');
        }

        $article_type = $article_type[0];
        $data['article_type'] = $article_type;

        $data['title'] = 'Type article';
        $data["js"] = array(
            base_url().'assets/js/articletype.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_articletype', $data);
        $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {
        if(!$article_type_id = (int) $this->uri->segment(3)) {
            redirect('articletype');
        }
        
        try {
            $this->model_articletype->delete($article_type_id);
            $this->session->set_flashdata('delete', 'Package supprimé!');
        } catch(Exception $e) {
            redirect('articletype');
        }

        redirect('articletype'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
          redirect('articletype');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_articletype->delete($i);
      }
      $this->session->set_flashdata('delete', 'Article type supprimé(s)');
      redirect('articletype');
    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>