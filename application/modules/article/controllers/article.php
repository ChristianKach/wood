<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article/model_article');
        $this->load->model('articletype/model_articletype');
    }

    public function index() {
        $data['title'] = 'Articles';
        $data["js"] = array(
            base_url().'assets/js/article.js'
        );

        $data['articles'] = $this->model_article->getAll();
        $data['article_types'] = $this->model_articletype->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_article', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('article_type_id', 'Type article', 'trim|required|xss_clean');

        $this->form_validation->set_rules('article_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');

        $this->form_validation->set_rules('article_unit_price', 'Prix unitaire', 'trim|required|numeric|xss_clean');

        $this->form_validation->set_rules('article_quantity', 'Quantié', 'trim|required|integer|xss_clean');

        $this->form_validation->set_rules('article_date_reception', 'Date de réception', 'trim|required|xss_clean|max_length[15]');
        
        if ($this->form_validation->run()) {
           $data['article_type_id'] = $this->input->post('article_type_id');
           $data['article_libelle'] = $this->input->post('article_libelle');
           $data['article_unit_price'] = $this->input->post('article_unit_price');
           $data['article_quantity'] = $this->input->post('article_quantity');
           $data['article_date_reception'] = formatDateToDB($this->input->post('article_date_reception'));
           
           
           $article_id = $this->model_article->save($data);
           // if($adherant_id) {
           //     $data_programme['programme_id'] = $this->input->post('programme_id');
           //     $data_programme['adherant_id'] = $adherant_id;
           //     $this->model_programme_adherant->save($data_programme);
           // }

           $this->session->set_flashdata('add', 'Article enregistré!'); 

           redirect('article');

        }

        $data['title'] = 'Article';
        $data["js"] = array(
            base_url().'assets/js/article.js'
        );

        $data['articles'] = $this->model_article->getAll();
        $data['article_types'] = $this->model_articletype->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_article', $data);
        $this->load->view('home/includes/footer', $data);    

        
    }

    public function update() {
        if(!$article_id = (int) $this->uri->segment(3)) {
            redirect('article');
        }

        if(isset($_POST['article_id'])) {
            
            $this->form_validation->set_rules('article_type_id', 'Type article', 'trim|required|xss_clean');

            $this->form_validation->set_rules('article_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');

            $this->form_validation->set_rules('article_unit_price', 'Prix unitaire', 'trim|required|numeric|xss_clean');

            $this->form_validation->set_rules('article_quantity', 'Quantié', 'trim|required|integer|xss_clean');

            $this->form_validation->set_rules('article_date_reception', 'Date de réception', 'trim|required|xss_clean|max_length[15]');
            

            if ($this->form_validation->run()) {
               $data['article_type_id'] = $this->input->post('article_type_id');
               $data['article_libelle'] = $this->input->post('article_libelle');
               $data['article_unit_price'] = $this->input->post('article_unit_price');
               $data['article_quantity'] = $this->input->post('article_quantity');
               $data['article_date_reception'] = formatDateToDB($this->input->post('article_date_reception'));
               
               
               $article_id = $this->model_article->update($this->input->post('article_id'), $data);
               // if($adherant_id) {
               //     $data_programme['programme_id'] = $this->input->post('programme_id');
               //     $data_programme['adherant_id'] = $adherant_id;
               //     $this->model_programme_adherant->save($data_programme);
               // }

               $this->session->set_flashdata('update', 'Adhérant mis à jour!'); 

               redirect('article');

                }
            }    

            $article = $this->model_article->getById($article_id);
            if(empty($article)) {
                redirect('article');
            }

            $article = $article[0];
            if($article->article_date_reception)
                $article->article_date_reception = formatDateToPHP($article->article_date_reception);

            $data['title'] = 'Article';
            $data["js"] = array(
                base_url().'assets/js/article.js'
            );

            $data['article_type_id'] = $article->article_type_id;
            $data['article'] = $article;

            $data['articles'] = $this->model_article->getAll();
            $data['article_types'] = $this->model_articletype->getAll();

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_article', $data);
            $this->load->view('home/includes/footer', $data); 
    }

    
    public function delete() {

        if(!$article_id = (int) $this->uri->segment(3)) {
            redirect('article');
        }
        
        try {
            $this->model_article->delete($article_id);
            $this->session->set_flashdata('delete', 'Article supprimé!');
        } catch(Exception $e) {
            redirect('article');
        }

        redirect('article'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('article');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_article->delete($i);
      }
      $this->session->set_flashdata('delete', 'Article supprimé(s)');
      redirect('article');
    }


    public function articletype() {
        $article_type_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$article_type_id)
          $data_article = $this->model_article->getAll();
        else
          $data_article = $this->model_article->getAllByArticleTypeId($article_type_id);


        $data['title'] = 'Articles';
        $data["js"] = array(
                base_url().'assets/js/article.js'
        );
        
        $data['article_types'] = $this->model_articletype->getAll();
        $data['articles'] = $data_article;

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_article', $data);
        $this->load->view('home/includes/footer', $data);

    }
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>