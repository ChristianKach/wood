<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Poteau_centre extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('poteau_centre/model_poteau_centre');
        $this->load->model('bois/model_bois');
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Poteau_centre';
        $data["js"] = array(
            base_url().'assets/js/poteau_centre.js'
        );
        
        $data['poteau_centres'] = $this->model_poteau_centre->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();


        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poteau_centre', $data);
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
        $this->form_validation->set_rules('long_p');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('m');

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
           $data['long_p'] = $this->input->post('long_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['m'] = $this->input->post('m');

           $poteau_centre_id = $this->model_poteau_centre->save($data);

           $this->session->set_flashdata('add', ' Poteau centré enregistré!'); 

           redirect('resultat/poteau_centre');

        }

        $data['poteau_centres'] = $this->model_poteau_centre->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Poteau_centre';
        $data["js"] = array(
            base_url().'assets/js/poteau_centre.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poteau_centre', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$poteau_centre_id = (int) $this->uri->segment(3)) {
            redirect('resultat/poteau_centre');
        }
        if(isset($_POST['poteau_centre_id'])) {
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
        $this->form_validation->set_rules('long_p');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('m');

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
           $data['long_p'] = $this->input->post('long_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['m'] = $this->input->post('m');

           $this->model_poteau_centre->update($this->input->post('poteau_centre_id'), $data);
           $this->session->set_flashdata('update', 'Poteau Centré mis à jour!'); 
           redirect('resultat/poteau_centre');

        }
    }
        $poteau_centre = $this->model_poteau_centre->getById($poteau_centre_id);
            if(empty($poteau_centre)) {
                redirect('poteau_centre');
        }
        $poteau_centre = $poteau_centre[0];
        $data['poteau_centre'] = $poteau_centre;
        $data['poteau_centres'] = $this->model_poteau_centre->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Poteau Centré';
        $data["js"] = array(
            base_url().'assets/js/poteau_centre.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poteau_centre', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function getAllByBoisId() {
        $bois_id = $this->input->get("bois_id");
        $data = $this->model_poteau_centre->getAllByBoisId($bois_id);
        sendJSON(true, $data, '');
    }

    public function getAllByCategorieId() {
        $categorie_id = $this->input->get("categorie_id");
        $data = $this->model_poteau_centre->getAllBycategorieId($bois_id);
        sendJSON(true, $data, '');
    }

    
    public function delete() {

        if(!$poteau_centre_id = (int) $this->uri->segment(3)) {
            redirect('poteau_centre');
        }
        
        try { 
            $this->model_poteau_centre->delete($poteau_centre_id);
            $this->session->set_flashdata('delete', 'Poteau centré supprimé!');
        } catch(Exception $e) {
            redirect('poteau_centre');
        }

        redirect('poteau_centre'); 
    }

   
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>