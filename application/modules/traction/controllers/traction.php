<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Traction extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('traction/model_traction');
        $this->load->model('bois/model_bois');
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Traction';
        $data["js"] = array(
            base_url().'assets/js/traction.js'
        );
        
        $data['tractions'] = $this->model_traction->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();


        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_traction', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lar_p');
        $this->form_validation->set_rules('long_p');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('haut_p');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['long_p'] = $this->input->post('long_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['fd_emb_ar'] = $this->input->post('fd_emb_ar');

           $traction_id = $this->model_traction->save($data);

           $this->session->set_flashdata('add', ' Poteau centré enregistré!'); 

           redirect('resultat/traction');

        }

        $data['tractions'] = $this->model_traction->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Traction';
        $data["js"] = array(
            base_url().'assets/js/traction.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_traction', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$traction_id = (int) $this->uri->segment(3)) {
            redirect('resultat/traction');
        }
        if(isset($_POST['traction_id'])) {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lar_p');
        $this->form_validation->set_rules('long_p');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('fd_emb_ar');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['long_p'] = $this->input->post('long_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['fd_emb_ar'] = $this->input->post('fd_emb_ar');

           $this->model_traction->update($this->input->post('traction_id'), $data);
           $this->session->set_flashdata('update', 'Traction mise à jour!'); 
           redirect('resultat/traction');

        }
    }
        $traction = $this->model_traction->getById($traction_id);
            if(empty($traction)) {
                redirect('resultat/traction');
        }
        $traction = $traction[0];
        $data['traction'] = $traction;
        $data['tractions'] = $this->model_traction->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Traction';
        $data["js"] = array(
            base_url().'assets/js/traction.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_traction', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function getAllByBoisId() {
        $bois_id = $this->input->get("bois_id");
        $data = $this->model_traction->getAllByBoisId($bois_id);
        sendJSON(true, $data, '');
    }

    public function getAllByCategorieId() {
        $categorie_id = $this->input->get("categorie_id");
        $data = $this->model_traction->getAllBycategorieId($bois_id);
        sendJSON(true, $data, '');
    }

    
    public function delete() {

        if(!$traction_id = (int) $this->uri->segment(3)) {
            redirect('traction');
        }
        
        try {
            $this->model_traction->delete($traction_id);
            $this->session->set_flashdata('delete', 'Traction supprimé!');
        } catch(Exception $e) {
            redirect('traction');
        }

        redirect('traction'); 
    }

   
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>