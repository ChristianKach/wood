<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Compression extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('compression/model_compression');
        $this->load->model('bois/model_bois');
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Compression';
        $data["js"] = array(
            base_url().'assets/js/compression.js'
        );
        
        $data['compressions'] = $this->model_compression->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();


        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_compression', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('m');
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
           $data['m'] = $this->input->post('m');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['long_p'] = $this->input->post('long_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['fd_emb_ar'] = $this->input->post('fd_emb_ar');

           $compression_id = $this->model_compression->save($data);

           $this->session->set_flashdata('add', ' compression enregistré!'); 

           redirect('resultat/compression');

        }

        $data['compressions'] = $this->model_compression->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Compression';
        $data["js"] = array(
            base_url().'assets/js/compression.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_compression', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$compression_id = (int) $this->uri->segment(3)) {
            redirect('resultat/compression');
        }
        if(isset($_POST['compression_id'])) {
        $this->form_validation->set_rules('libelle');
        $this->form_validation->set_rules('bois_id');
        $this->form_validation->set_rules('categorie_id');
        $this->form_validation->set_rules('taux_emb_ar');
        $this->form_validation->set_rules('tr_emb_ar');
        $this->form_validation->set_rules('tpr_emb_ar');
        $this->form_validation->set_rules('m');
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
           $data['m'] = $this->input->post('m');
           $data['face_emb_ar'] = $this->input->post('face_emb_ar');
           $data['lar_p'] = $this->input->post('lar_p');
           $data['long_p'] = $this->input->post('long_p');
           $data['haut_p'] = $this->input->post('haut_p');
           $data['fd_emb_ar'] = $this->input->post('fd_emb_ar');

           $this->model_compression->update($this->input->post('compression_id'), $data);
           $this->session->set_flashdata('update', 'Colone en Flexion Composé mis à jour!'); 
           redirect('resultat/compression');

        }
    }
        $compression = $this->model_compression->getById($compression_id);
            if(empty($compression)) {
                redirect('compression');
        }
        $compression = $compression[0];
        $data['compression'] = $compression;
        $data['compressions'] = $this->model_compression->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Compression';
        $data["js"] = array(
            base_url().'assets/js/compression.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_compression', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function getAllByBoisId() {
        $bois_id = $this->input->get("bois_id");
        $data = $this->model_poteau_centre->getAllByBoisId($bois_id);
        sendJSON(true, $data, '');
    }

    public function getAllByCategorieId() {
        $categorie_id = $this->input->get("categorie_id");
        $data = $this->model_compression->getAllBycategorieId($bois_id);
        sendJSON(true, $data, '');
    }

    
    public function delete() {

        if(!$compression_id = (int) $this->uri->segment(3)) {
            redirect('compression');
        }
        
        try {
            $this->model_compression->delete($compression_id);
            $this->session->set_flashdata('delete', 'compression supprimé!');
        } catch(Exception $e) {
            redirect('compression');
        }

        redirect('compression'); 
    }

   
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>