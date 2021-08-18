<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Poincon extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('poincon/model_poincon');
        $this->load->model('bois/model_bois');
        $this->load->model('categorie/model_categorie');
    }

    public function index() {
        $data['title'] = 'Poincon';
        $data["js"] = array(
            base_url().'assets/js/poincon.js'
        );
        
        $data['poincons'] = $this->model_poincon->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();


        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poincon', $data);
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

           $poincon_id = $this->model_poincon->save($data);

           $this->session->set_flashdata('add', 'Poincon enregistré!'); 

           redirect('resultat/poincon');

        }

        $data['poincons'] = $this->model_poincon->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'Poincon';
        $data["js"] = array(
            base_url().'assets/js/poincon.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poincon', $data);
        $this->load->view('home/includes/footer', $data);
    }
    public function update() {
      if(!$poincon_id = (int) $this->uri->segment(3)) {
            redirect('resultat/poincon');
        }
        if(isset($_POST['poincon_id'])) {
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

           $this->model_poincon->update($this->input->post('poincon_id'), $data);
           $this->session->set_flashdata('update', 'Poinçon mis à jour!'); 
           redirect('resultat/poincon');

        }
    }
        $poincon = $this->model_poincon->getById($poincon_id);
            if(empty($poincon)) {
                redirect('poincon');
        }
        $poincon = $poincon[0];
        $data['poincon'] = $poincon;
        $data['poincons'] = $this->model_poincon->getAll();
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $data['title'] = 'poincon';
        $data["js"] = array(
            base_url().'assets/js/poincon.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poincon', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function getAllByBoisId() {
        $bois_id = $this->input->get("bois_id");
        $data = $this->model_poincon->getAllByBoisId($bois_id);
        sendJSON(true, $data, '');
    }

    public function getAllByCategorieId() {
        $categorie_id = $this->input->get("categorie_id");
        $data = $this->model_poincon->getAllBycategorieId($bois_id);
        sendJSON(true, $data, '');
    }

    
    public function delete() {

        if(!$poincon_id = (int) $this->uri->segment(3)) {
            redirect('poincon');
        }
        
        try {
            $this->model_poincon->delete($poincon_id);
            $this->session->set_flashdata('delete', 'Poincon supprimé!');
        } catch(Exception $e) {
            redirect('poincon');
        }

        redirect('poincon'); 
    }

   
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>