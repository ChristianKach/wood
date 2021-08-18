<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Flexion_compose extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('flexion_compose/model_flexion_compose');
        $this->load->model('bois/model_bois');
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Flexion_compose';
        $data["js"] = array(
            base_url().'assets/js/flexion_compose.js'
        );
        
        $data['flexion_composes'] = $this->model_flexion_compose->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();


        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_flexion_compose', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('cpg');
        $this->form_validation->set_rules('cvq');
        $this->form_validation->set_rules('cvq1');
        $this->form_validation->set_rules('cvq2');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lar_p');
        $this->form_validation->set_rules('long_p');
        $this->form_validation->set_rules('long_c');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('m');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['cpg'] = $this->input->post('cpg');
           $data['cvq'] = $this->input->post('cvq');
           $data['cvq1'] = $this->input->post('cvq1');
           $data['cvq2'] = $this->input->post('cvq2');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['long_p'] = $this->input->post('long_p');
           $data['long_c'] = $this->input->post('long_c');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['m'] = $this->input->post('m');

           $flexion_compose_id = $this->model_flexion_compose->save($data);

           $this->session->set_flashdata('add', ' Flexion Composé enregistrée!'); 

           redirect('resultat/flexion_compose');

        }

        $data['flexion_composes'] = $this->model_flexion_compose->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Flexion_compose';
        $data["js"] = array(
            base_url().'assets/js/flexion_compose.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_flexion_compose', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$flexion_compose_id = (int) $this->uri->segment(3)) {
            redirect('resultat/flexion_compose');
        }
        if(isset($_POST['flexion_compose_id'])) {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('cpg');
        $this->form_validation->set_rules('cvq');
        $this->form_validation->set_rules('cvq1');
        $this->form_validation->set_rules('cvq2');
        $this->form_validation->set_rules('face_emb_ar');
        $this->form_validation->set_rules('lar_p');
        $this->form_validation->set_rules('long_p');
        $this->form_validation->set_rules('long_c');
        $this->form_validation->set_rules('haut_p');
        $this->form_validation->set_rules('m');

        if ($this->form_validation->run()) {
           $data['libelle'] = $this->input->post('libelle');
           $data['bois_id'] = $this->input->post('bois_id');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['taux_emb_ar'] = $this->input->post('taux_emb_ar');
           $data['tr_emb_ar'] = $this->input->post('tr_emb_ar');
           $data['tpr_emb_ar'] = $this->input->post('tpr_emb_ar');
           $data['cpg'] = $this->input->post('cpg');
           $data['cvq'] = $this->input->post('cvq');
           $data['cvq1'] = $this->input->post('cvq1');
           $data['cvq2'] = $this->input->post('cvq2');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['long_p'] = $this->input->post('long_p');
           $data['long_c'] = $this->input->post('long_c');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['m'] = $this->input->post('m');

           $this->model_flexion_compose->update($this->input->post('flexion_compose_id'), $data);
           $this->session->set_flashdata('update', 'Colone en Flexion Composé mis à jour!'); 
           redirect('resultat/flexion_compose');

        }
    }
        $flexion_compose = $this->model_flexion_compose->getById($flexion_compose_id);
            if(empty($flexion_compose)) {
                redirect('flexion_compose');
        }
        $flexion_compose = $flexion_compose[0];
        $data['flexion_compose'] = $flexion_compose;
        $data['flexion_composes'] = $this->model_flexion_compose->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Flexion_compose';
        $data["js"] = array(
            base_url().'assets/js/flexion_compose.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_flexion_compose', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function getAllByBoisId() {
        $bois_id = $this->input->get("bois_id");
        $data = $this->model_flexion_compose->getAllByBoisId($bois_id);
        sendJSON(true, $data, '');
    }

    public function getAllByCategorieId() {
        $categorie_id = $this->input->get("categorie_id");
        $data = $this->model_flexion_compose->getAllBycategorieId($bois_id);
        sendJSON(true, $data, '');
    }

    
    public function delete() {

        if(!$flexion_compose_id = (int) $this->uri->segment(3)) {
            redirect('flexion_compose');
        }
        
        try {
            $this->model_flexion_compose->delete($flexion_compose_id);
            $this->session->set_flashdata('delete', 'Flexion Composé supprimé!');
        } catch(Exception $e) {
            redirect('flexion_compose');
        }

        redirect('flexion_compose'); 
    }

   
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>