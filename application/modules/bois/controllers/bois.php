<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bois extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bois/model_bois');
        $this->load->model('stabilite/model_stabilite');
        $this->load->model('categorie/model_categorie');
        $this->load->model('type_bois/model_type_bois');
    }

    public function index() {
        $data['title'] = 'Bois';
        $data["js"] = array(
            base_url().'assets/js/bois.js'
        );

        $data['boiss'] = $this->model_bois->getAll();
        $data['type_bois'] = $this->model_type_bois->getAll();
        $data['categories'] = $this->model_categorie->getAll();
        $data['stabilites'] = $this->model_stabilite->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_bois', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {

        $this->form_validation->set_rules('bois_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('categorie_id', 'Categorie', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('type_bois_id', 'Type de bois', 'trim|required||max_length[150]|xss_clean');
        $this->form_validation->set_rules('stabilite_id', 'Stabilite', 'trim|required||max_length[150]|xss_clean');
        $this->form_validation->set_rules('bois_flexion_longitudinale', 'Flexion Longitudinale', 'trim|required|xss_clean|max_length[150]');
        $this->form_validation->set_rules('bois_traction_axiale', 'Traction Axiale', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bois_traction_transversale', 'Traction transversale', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bois_compression_axiale', 'Compresion Axiale', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bois_compression_transversale', 'Compression transversale', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bois_cisaillement', 'Cisaillement', 'trim|required|xss_clean|max_length[150]');
        $this->form_validation->set_rules('bois_module_elasticite_longitididal', 'Module elasticité longitidunal', 'trim|required|xss_clean|max_length[150]');
        $this->form_validation->set_rules('bois_module_elasticite_axial', 'Module elasticité axial', 'trim|required|xss_clean|max_length[150]');
        $this->form_validation->set_rules('bois_m_moyen_e_transversal', 'Module moyen elasticité transversal', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bois_m_moyen_cisaillement', 'Module moyen de cisaillement', 'trim|required|xss_clean|max_length[150]');
        $this->form_validation->set_rules('bois_masse_volumique', 'Masse volumique/densité', 'trim|required|xss_clean|max_length[150]');
        
        if ($this->form_validation->run()) {

           $data['bois_libelle'] = $this->input->post('bois_libelle');
           $data['categorie_id'] = $this->input->post('categorie_id');
           $data['type_bois_id'] = $this->input->post('type_bois_id');
           $data['stabilite_id'] = $this->input->post('stabilite_id');
           $data['bois_flexion_longitudinale'] = $this->input->post('bois_flexion_longitudinale');
           $data['bois_traction_axiale'] = $this->input->post('bois_traction_axiale');
           $data['bois_traction_transversale'] = $this->input->post('bois_traction_transversale');
           $data['bois_compression_axiale'] = $this->input->post('bois_compression_axiale');
           $data['bois_compression_transversale'] = $this->input->post('bois_compression_transversale');
           $data['bois_cisaillement'] = $this->input->post('bois_cisaillement');
           $data['bois_module_elasticite_longitididal'] = $this->input->post('bois_module_elasticite_longitididal');
           $data['bois_module_elasticite_axial'] = $this->input->post('bois_module_elasticite_axial');
           $data['bois_m_moyen_e_transversal'] = $this->input->post('bois_m_moyen_e_transversal');
           $data['bois_m_moyen_cisaillement'] = $this->input->post('bois_m_moyen_cisaillement');
           $data['bois_masse_volumique'] = $this->input->post('bois_masse_volumique');

           $bois_id = $this->model_bois->save($data);

           $this->session->set_flashdata('add', 'Bois enregistrée!'); 

           redirect('bois');

        }

        $data['boiss'] = $this->model_bois->getAll();
        $data['type_bois'] = $this->model_type_bois->getAll();
        $data['categories'] = $this->model_categorie->getAll();
        $data['stabilites'] = $this->model_stabilite->getAll();

        $data['title'] = 'Bois';
        $data["js"] = array(
            base_url().'assets/js/bois.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_bois', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$bois_id = (int) $this->uri->segment(3)) {
            redirect('bois');
        }

        if(isset($_POST['bois_id'])) {

               $this->form_validation->set_rules('bois_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
               $this->form_validation->set_rules('categorie_id', 'Categorie', 'trim|required|max_length[150]|xss_clean');
               $this->form_validation->set_rules('type_bois_id', 'Type de bois', 'trim|required||max_length[150]|xss_clean');
               $this->form_validation->set_rules('stabilite_id', 'Stabilite', 'trim|required||max_length[150]|xss_clean');
               $this->form_validation->set_rules('bois_flexion_longitudinale', 'Flexion Longitudinale', 'trim|required|xss_clean|max_length[150]');
               $this->form_validation->set_rules('bois_traction_axiale', 'Traction Axiale', 'trim|required|xss_clean');
               $this->form_validation->set_rules('bois_traction_transversale', 'Traction transversale', 'trim|required|xss_clean');
               $this->form_validation->set_rules('bois_compression_axiale', 'Compresion Axiale', 'trim|required|xss_clean');
               $this->form_validation->set_rules('bois_compression_transversale', 'Compression transversale', 'trim|required|xss_clean');
               $this->form_validation->set_rules('bois_cisaillement', 'Cisaillement', 'trim|required|xss_clean|max_length[150]');
               $this->form_validation->set_rules('bois_module_elasticite_longitididal', 'Module elasticité longitidunal', 'trim|required|xss_clean|max_length[150]');
               $this->form_validation->set_rules('bois_module_elasticite_axial', 'Module elasticité axial', 'trim|required|xss_clean|max_length[150]');
               $this->form_validation->set_rules('bois_m_moyen_e_transversal', 'Module moyen elasticité transversal', 'trim|required|xss_clean');
               $this->form_validation->set_rules('bois_m_moyen_cisaillement', 'Module moyen de cisaillement', 'trim|required|xss_clean|max_length[150]');
               $this->form_validation->set_rules('bois_masse_volumique', 'Masse volumique/densité', 'trim|required|xss_clean|max_length[150]');
            
            if ($this->form_validation->run()) {

               $data['bois_libelle'] = $this->input->post('bois_libelle');
               $data['categorie_id'] = $this->input->post('categorie_id');
               $data['type_bois_id'] = $this->input->post('type_bois_id');
               $data['stabilite_id'] = $this->input->post('stabilite_id');
               $data['bois_flexion_longitudinale'] = $this->input->post('bois_flexion_longitudinale');
               $data['bois_traction_axiale'] = $this->input->post('bois_traction_axiale');
               $data['bois_traction_transversale'] = $this->input->post('bois_traction_transversale');
               $data['bois_compression_axiale'] = $this->input->post('bois_compression_axiale');
               $data['bois_compression_transversale'] = $this->input->post('bois_compression_transversale');
               $data['bois_cisaillement'] = $this->input->post('bois_cisaillement');
               $data['bois_module_elasticite_longitididal'] = $this->input->post('bois_module_elasticite_longitididal');
               $data['bois_module_elasticite_axial'] = $this->input->post('bois_module_elasticite_axial');
               $data['bois_m_moyen_e_transversal'] = $this->input->post('bois_m_moyen_e_transversal');
               $data['bois_m_moyen_cisaillement'] = $this->input->post('bois_m_moyen_cisaillement');
               $data['bois_masse_volumique'] = $this->input->post('bois_masse_volumique');

               $this->model_bois->update($this->input->post('bois_id'), $data);

               $this->session->set_flashdata('update', 'Bois mise à jour!'); 

               redirect('bois');

                }
            }    


            $bois = $this->model_bois->getById($bois_id);
            if(empty($bois)) {
                redirect('bois');
            }
            $bois = $bois[0];
            $data['bois'] = $bois;
            $data['boiss'] = $this->model_bois->getAll();
            $data['type_bois'] = $this->model_type_bois->getAll();
            $data['categories'] = $this->model_categorie->getAll();
            $data['stabilites'] = $this->model_stabilite->getAll();


            $data['title'] = 'bois';
            $data["js"] = array(
                base_url().'assets/js/bois.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_bois', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$bois_id = (int) $this->uri->segment(3)) {
            redirect('bois');
        }
        
        try {
            $this->model_bois->delete($bois_id);
            $this->session->set_flashdata('delete', 'Bois supprimé!');
        } catch(Exception $e) {
            redirect('bois');
        }

        redirect('bois'); 
    }
  


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>