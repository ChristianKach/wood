<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Flexion_simple extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('flexion_simple/model_flexion_simple');
        $this->load->model('bois/model_bois');
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Flexion Simple';
        $data["js"] = array(
            base_url().'assets/js/flexion_simple.js'
        );
        
        $data['flexion_simples'] = $this->model_flexion_simple->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();


        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_flexion_simple', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {  
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('classe_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('vitesse_emb_ar');
        $this->form_validation->set_rules('qfi');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lar_p');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('port');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['classe_emb_ar'] = $this->input->post('classe_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['vitesse_emb_ar'] = $this->input->post('vitesse_emb_ar');
           $data['qfi'] = $this->input->post('qfi');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['port'] = $this->input->post('port');

           $flexion_simple_id = $this->model_flexion_simple->save($data);

           $this->session->set_flashdata('add', 'Flexion Simple enregistré!'); 

           redirect('resultat/flexion_simple');

        }

        $data['flexion_simples'] = $this->model_flexion_simple->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Flexion Simple';
        $data["js"] = array(
            base_url().'assets/js/flexion_simple.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_flexion_simple', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$flexion_simple_id = (int) $this->uri->segment(3)) {
            redirect('resultat/flexion_simple');
        }
        if(isset($_POST['flexion_simple_id'])) {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('classe_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('vitesse_emb_ar');
        $this->form_validation->set_rules('qfi');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lar_p');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('port');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['classe_emb_ar'] = $this->input->post('classe_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['vitesse_emb_ar'] = $this->input->post('vitesse_emb_ar');
           $data['cpg'] = $this->input->post('qfi');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['port'] = $this->input->post('port');

           $this->model_flexion_simple->update($this->input->post('flexion_simple_id'), $data);
           $this->session->set_flashdata('update', 'Flexion Simple mise à jour!'); 
           redirect('resultat/flexion_simple');

        }
    }
        $flexion_simple = $this->model_flexion_simple->getById($flexion_simple_id);
            if(empty($flexion_simple)) {
                redirect('flexion_simple');
        }
        $flexion_simple = $flexion_simple[0];
        $data['flexion_simple'] = $flexion_simple;
        $data['flexion_simples'] = $this->model_flexion_simple->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Flexion Simple';
        $data["js"] = array(
            base_url().'assets/js/flexion_simple.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_flexion_simple', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function getAllByBoisId() {
        $bois_id = $this->input->get("bois_id");
        $data = $this->model_emb_avant->getAllByBoisId($bois_id);
        sendJSON(true, $data, '');
    }

    public function getAllByCategorieId() {
        $categorie_id = $this->input->get("categorie_id");
        $data = $this->model_poutre->getAllBycategorieId($bois_id);
        sendJSON(true, $data, '');
    }

    
    public function delete() {

        if(!$flexion_simple_id = (int) $this->uri->segment(3)) {
            redirect('flexion_simple');
        }
        
        try {
            $this->model_flexion_simple->delete($flexion_simple_id);
            $this->session->set_flashdata('delete', 'Flexion Simple supprimé!');
        } catch(Exception $e) {
            redirect('flexion_simple');
        }

        redirect('flexion_simple'); 
    }

   
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>