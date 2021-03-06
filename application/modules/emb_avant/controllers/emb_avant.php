<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Emb_avant extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('emb_avant/model_emb_avant');
        $this->load->model('bois/model_bois');
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Emb_avant';
        $data["js"] = array(
            base_url().'assets/js/emb_avant.js'
        );
        
        $data['emb_avants'] = $this->model_emb_avant->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();


        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_emb_avant', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('angle_emb_ar');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('classe_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lent_emb_ar');
        $this->form_validation->set_rules('haut_emb_ar');
        $this->form_validation->set_rules('htal_emb_ar');
        $this->form_validation->set_rules('ltal_emb_ar');
        $this->form_validation->set_rules('barb_emb_ar');
        $this->form_validation->set_rules('harb_emb_ar');
        $this->form_validation->set_rules('lf_emb_ar');
        $this->form_validation->set_rules('fd_emb_ar');
        $this->form_validation->set_rules('ft_emb_ar');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['angle_emb_ar'] = $this->input->post('angle_emb_ar');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['classe_emb_ar'] = $this->input->post('classe_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lent_emb_ar'] = $this->input->post('lent_emb_ar');
           $data['haut_emb_ar'] = $this->input->post('haut_emb_ar');
           $data['htal_emb_ar'] = $this->input->post('htal_emb_ar');
           $data['ltal_emb_ar'] = $this->input->post('ltal_emb_ar');
           $data['barb_emb_ar'] = $this->input->post('barb_emb_ar');
           $data['harb_emb_ar'] = $this->input->post('harb_emb_ar');
           $data['lf_emb_ar'] = $this->input->post('lf_emb_ar');
           $data['fd_emb_ar'] = $this->input->post('fd_emb_ar');
           $data['ft_emb_ar'] = $this->input->post('ft_emb_ar');

           $emb_avant_id = $this->model_emb_avant->save($data);

           $this->session->set_flashdata('add', 'Embr??vement Avant enregistr??!'); 

           redirect('resultat/emb_avant');

        }

        $data['emb_avants'] = $this->model_emb_avant->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Emb_avant';
        $data["js"] = array(
            base_url().'assets/js/emb_avant.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_emb_avant', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
      if(!$emb_avant_id = (int) $this->uri->segment(3)) {
            redirect('resultat/emb_avant');
        }
        if(isset($_POST['emb_avant_id'])) {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('angle_emb_ar');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('classe_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lent_emb_ar');
        $this->form_validation->set_rules('haut_emb_ar');
        $this->form_validation->set_rules('htal_emb_ar');
        $this->form_validation->set_rules('ltal_emb_ar');
        $this->form_validation->set_rules('barb_emb_ar');
        $this->form_validation->set_rules('harb_emb_ar');
        $this->form_validation->set_rules('lf_emb_ar');
        $this->form_validation->set_rules('fd_emb_ar');
        $this->form_validation->set_rules('ft_emb_ar');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['angle_emb_ar'] = $this->input->post('angle_emb_ar');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['classe_emb_ar'] = $this->input->post('classe_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lent_emb_ar'] = $this->input->post('lent_emb_ar');
           $data['haut_emb_ar'] = $this->input->post('haut_emb_ar');
           $data['htal_emb_ar'] = $this->input->post('htal_emb_ar');
           $data['ltal_emb_ar'] = $this->input->post('ltal_emb_ar');
           $data['barb_emb_ar'] = $this->input->post('barb_emb_ar');
           $data['harb_emb_ar'] = $this->input->post('harb_emb_ar');
           $data['lf_emb_ar'] = $this->input->post('lf_emb_ar');
           $data['fd_emb_ar'] = $this->input->post('fd_emb_ar');
           $data['ft_emb_ar'] = $this->input->post('ft_emb_ar');

           $this->model_emb_avant->update($this->input->post('emb_avant_id'), $data);
           $this->session->set_flashdata('update', 'Embrevement avant mis ?? jour!'); 
           redirect('resultat/emb_avant');

        }
    }
        $emb_avant = $this->model_emb_avant->getById($emb_avant_id);
            if(empty($emb_avant)) {
                redirect('emb_avant');
        }
        $emb_avant = $emb_avant[0];
        $data['emb_avant'] = $emb_avant;
        $data['emb_avants'] = $this->model_emb_avant->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'emb_avant';
        $data["js"] = array(
            base_url().'assets/js/emb_avant.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_emb_avant', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function getAllByBoisId() {
        $bois_id = $this->input->get("bois_id");
        $data = $this->model_emb_avant->getAllByBoisId($bois_id);
        sendJSON(true, $data, '');
    }

    public function getAllByCategorieId() {
        $categorie_id = $this->input->get("categorie_id");
        $data = $this->model_emb_avant->getAllBycategorieId($bois_id);
        sendJSON(true, $data, '');
    }

    
    public function delete() {

        if(!$emb_avant_id = (int) $this->uri->segment(3)) {
            redirect('emb_avant');
        }
        
        try {
            $this->model_emb_avant->delete($emb_avant_id);
            $this->session->set_flashdata('delete', 'Embr??vement Avant supprim??!');
        } catch(Exception $e) {
            redirect('emb_avant');
        }

        redirect('emb_avant'); 
    }

   
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>