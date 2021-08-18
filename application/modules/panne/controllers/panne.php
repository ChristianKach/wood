<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Panne extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('panne/model_panne');
        $this->load->model('bois/model_bois');
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Panne';
        $data["js"] = array(
            base_url().'assets/js/panne.js'
        );
        
        $data['pannes'] = $this->model_panne->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();


        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_panne', $data);
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
        $this->form_validation->set_rules('cpg');
        $this->form_validation->set_rules('cvq');
        $this->form_validation->set_rules('cvq1');
        $this->form_validation->set_rules('cvq2');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lar_p');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('port');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['angle_emb_ar'] = $this->input->post('angle_emb_ar');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['classe_emb_ar'] = $this->input->post('classe_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['cpg'] = $this->input->post('cpg');
           $data['cvq'] = $this->input->post('cvq');
           $data['cvq1'] = $this->input->post('cvq1');
           $data['cvq2'] = $this->input->post('cvq2');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['port'] = $this->input->post('port');

           $panne_id = $this->model_panne->save($data);

           $this->session->set_flashdata('add', 'Panne enregistrée!'); 

           redirect('panne');

        }

        $data['pannes'] = $this->model_panne->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Panne';
        $data["js"] = array(
            base_url().'assets/js/panne.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_panne', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$panne_id = (int) $this->uri->segment(3)) {
            redirect('resultat/panne');
        }
        if(isset($_POST['panne_id'])) {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('angle_emb_ar');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('classe_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('cpg');
        $this->form_validation->set_rules('cvq');
        $this->form_validation->set_rules('cvq1');
        $this->form_validation->set_rules('cvq2');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lar_p');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('port');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['angle_emb_ar'] = $this->input->post('angle_emb_ar');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['classe_emb_ar'] = $this->input->post('classe_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['cpg'] = $this->input->post('cpg');
           $data['cvq'] = $this->input->post('cvq');
           $data['cvq1'] = $this->input->post('cvq1');
           $data['cvq2'] = $this->input->post('cvq2');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['port'] = $this->input->post('port');

           $this->model_panne->update($this->input->post('panne_id'), $data);
           $this->session->set_flashdata('update', 'Panne mise à jour!'); 
           redirect('resultat/panne');

        }
    }
        $panne = $this->model_panne->getById($panne_id);
            if(empty($panne)) {
                redirect('resultat/panne');
        }
        $panne = $panne[0];
        $data['panne'] = $panne;
        $data['pannes'] = $this->model_panne->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Panne';
        $data["js"] = array(
            base_url().'assets/js/panne.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_panne', $data);
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

        if(!$panne_id = (int) $this->uri->segment(3)) {
            redirect('panne');
        }
        
        try {
            $this->model_panne->delete($panne_id);
            $this->session->set_flashdata('delete', 'Panne supprimée!');
        } catch(Exception $e) {
            redirect('panne');
        }

        redirect('panne'); 
    }

   
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>