<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Resultat extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bois/model_bois');
        $this->load->model('coefficient/model_coefficient');
        $this->load->model('categorie/model_categorie');
        $this->load->model('poincon/model_poincon');
        $this->load->model('poutre/model_poutre');
        $this->load->model('panne/model_panne');
        $this->load->model('compression/model_compression');
        $this->load->model('traction/model_traction');
        $this->load->model('emb_arriere/model_emb_arriere');
        $this->load->model('emb_avant/model_emb_avant');
        $this->load->model('emb_double/model_emb_double');
        $this->load->model('poteau_centre/model_poteau_centre');
        $this->load->model('flexion_compose/model_flexion_compose');
        $this->load->model('flexion_simple/model_flexion_simple');
    }

    public function index() {
        $data['title'] = 'Resultat';
        $data["js"] = array(
           // base_url().'assets/js/resultat.js'
        );
        

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_resultat', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function emb_arriere() {
        
        if(!$emb_arriere_id = (int) $this->uri->segment(3)) {
            redirect('emb_arriere');
        }

        $emb_arrieres = $this->model_emb_arriere->getById($emb_arriere_id);
        if(empty($emb_arrieres)) {
            redirect('emb_arriere');
        }

        $emb_arrieres = $emb_arrieres[0];
        $data['emb_arrieres'] = $emb_arrieres;
        $data['total'] = 0;

        $data['emb_arriere'] = $this->model_emb_arriere->getById($emb_arriere_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_emb_arriere', $data);
        $this->load->view('home/includes/footer', $data);
    }
    public function emb_avant() {
        
        if(!$emb_avant_id = (int) $this->uri->segment(3)) {
            redirect('emb_avant');
        }

        $emb_avan = $this->model_emb_avant->getById($emb_avant_id);
        if(empty($emb_avan)) {
            redirect('emb_avant');
        }

        $emb_avan = $emb_avan[0];
        $data['emb_avan'] = $emb_avan;
        $data['total'] = 0;

        $data['emb_avant'] = $this->model_emb_avant->getById($emb_avant_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_emb_avant', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function emb_double() {
        
        if(!$emb_double_id = (int) $this->uri->segment(3)) {
            redirect('emb_double');
        }

        $emb_doubles = $this->model_emb_double->getById($emb_double_id);
        if(empty($emb_doubles)) {
            redirect('emb_double');
        }

        $emb_doubles = $emb_doubles[0];
        $data['emb_doubles'] = $emb_doubles;
        $data['total'] = 0;

        $data['emb_double'] = $this->model_emb_double->getById($emb_double_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_emb_double', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function poincon() {
        
        if(!$poincon_id = (int) $this->uri->segment(3)) {
            redirect('poincon');
        }

        $poincons = $this->model_poincon->getById($poincon_id);
        if(empty($poincons)) {
            redirect('poincon');
        }

        $poincons = $poincons[0];
        $data['poincons'] = $poincons;
        $data['total'] = 0;

        $data['poincon'] = $this->model_poincon->getById($poincon_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poincon', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function flexion_simple() {
        
        if(!$flexion_simple_id = (int) $this->uri->segment(3)) {
            redirect('flexion_simple');
        }

        $flexion_simples = $this->model_flexion_simple->getById($flexion_simple_id);
        if(empty($flexion_simples)) {
            redirect('flexion_simple');
        }

        $flexion_simples = $flexion_simples[0];
        $data['flexion_simples'] = $flexion_simples;
        $data['total'] = 0;

        $data['flexion_simple'] = $this->model_flexion_simple->getById($flexion_simple_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();
        $data['coefficient'] = $this->model_coefficient->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_flexion_simple', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function flexion_compose() {
        
        if(!$flexion_compose_id = (int) $this->uri->segment(3)) {
            redirect('flexion_compose');
        }

        $flexion_composes = $this->model_flexion_compose->getById($flexion_compose_id);
        if(empty($flexion_composes)) {
            redirect('flexion_compose');
        }

        $flexion_composes = $flexion_composes[0];
        $data['flexion_composes'] = $flexion_composes;
        $data['total'] = 0;

        $data['flexion_compose'] = $this->model_flexion_compose->getById($flexion_compose_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();
        $data['coefficient'] = $this->model_coefficient->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_flexion_compose', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function poteau_centre() {
        
        if(!$poteau_centre_id = (int) $this->uri->segment(3)) {
            redirect('poteau_centre');
        }

        $poteau_centres = $this->model_poteau_centre->getById($poteau_centre_id);
        if(empty($poteau_centres)) {
            redirect('poteau_centre');
        }

        $poteau_centres = $poteau_centres[0];
        $data['poteau_centres'] = $poteau_centres;
        $data['total'] = 0;

        $data['poteau_centre'] = $this->model_poteau_centre->getById($poteau_centre_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();
        $data['coefficient'] = $this->model_coefficient->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poteau_centre', $data);
        $this->load->view('home/includes/footer', $data);
    }
    public function traction() {
        
        if(!$traction_id = (int) $this->uri->segment(3)) {
            redirect('traction');
        }

        $tractions = $this->model_traction->getById($traction_id);
        if(empty($tractions)) {
            redirect('traction');
        }

        $tractions = $tractions[0];
        $data['tractions'] = $tractions;
        $data['total'] = 0;

        $data['traction'] = $this->model_traction->getById($traction_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();
        $data['coefficient'] = $this->model_coefficient->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_traction', $data);
        $this->load->view('home/includes/footer', $data);
    }
    public function compression() {
       
       if(!$compression_id = (int) $this->uri->segment(3)) {
            redirect('compression');
        }

        $compressions = $this->model_compression->getById($compression_id);
        if(empty($compressions)) {
            redirect('compression');
        }

        $compressions = $compressions[0];
        $data['compressions'] = $compressions;
        $data['total'] = 0;

        $data['compression'] = $this->model_compression->getById($compression_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();
        $data['coefficient'] = $this->model_coefficient->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_compression', $data);
        $this->load->view('home/includes/footer', $data);
    }
    public function poutre() {
        
        if(!$poutre_id = (int) $this->uri->segment(3)) {
            redirect('poutre');
        }

        $poutres = $this->model_poutre->getById($poutre_id);
        if(empty($poutres)) {
            redirect('poutre');
        }

        $poutres = $poutres[0];
        $data['poutres'] = $poutres;
        $data['total'] = 0;

        $data['poutre'] = $this->model_poutre->getById($poutre_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();
        $data['coefficient'] = $this->model_coefficient->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_poutre', $data);
        $this->load->view('home/includes/footer', $data);
    }

    
    public function panne() {

        if(!$panne_id = (int) $this->uri->segment(3)) {
            redirect('panne');
        }

        $pannes = $this->model_panne->getById($panne_id);
        if(empty($pannes)) {
            redirect('panne');
        }

        $pannes = $pannes[0];
        $data['pannes'] = $pannes;
        $data['total'] = 0;


        $data['panne'] = $this->model_panne->getById($panne_id);
        $data['bois'] = $this->model_bois->getAll();
        $data['categorie'] = $this->model_categorie->getAll();
        $data['coefficient'] = $this->model_coefficient->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_panne', $data);
        $this->load->view('home/includes/footer', $data);
    }


}

?>