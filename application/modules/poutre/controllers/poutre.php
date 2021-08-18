<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Poutre extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('poutre/model_poutre');
        $this->load->model('bois/model_bois');
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Poutre';
        $data["js"] = array(
            base_url().'assets/js/poutre.js'
        );
        
        $data['poutres'] = $this->model_poutre->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();


        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poutre', $data);
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
           $data['qfi'] = $this->input->post('qfi');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['port'] = $this->input->post('port');

           $poutre_id = $this->model_poutre->save($data);

           $this->session->set_flashdata('add', 'Poutre enregistré!'); 

           redirect('resultat/poutre');

        }

        $data['poutres'] = $this->model_poutre->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Poutre';
        $data["js"] = array(
            base_url().'assets/js/poutre.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poutre', $data);
        $this->load->view('home/includes/footer', $data);
    }
    public function update() {
        if(!$poutre_id = (int) $this->uri->segment(3)) {
            redirect('resultat/poutre');
        }
        if(isset($_POST['poutre_id'])) {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('classe_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
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
           $data['qfi'] = $this->input->post('qfi');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['port'] = $this->input->post('port');

           $this->model_poutre->update($this->input->post('poutre_id'), $data);
           $this->session->set_flashdata('update', 'Poutre mise à jour!'); 
           redirect('resultat/poutre');

        }
    }
        $poutre = $this->model_poutre->getById($poutre_id);
            if(empty($poutre)) {
                redirect('resultat/poutre');
        }
        $poutre = $poutre[0];
        $data['poutre'] = $poutre;
        $data['poutres'] = $this->model_poutre->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Poutre';
        $data["js"] = array(
            base_url().'assets/js/poutre.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poutre', $data);
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

        if(!$poutre_id = (int) $this->uri->segment(3)) {
            redirect('poutre');
        }
        
        try {
            $this->model_poutre->delete($poutre_id);
            $this->session->set_flashdata('delete', 'Poutre supprimé!');
        } catch(Exception $e) {
            redirect('poutre');
        }

        redirect('poutre'); 
    }

   
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>