<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Salle extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('batiment/model_batiment');
        $this->load->model('salle/model_salle');
    }

    public function index() {
        $data['title'] = 'Salle - Adhérant';
        $data["js"] = array(
            base_url().'assets/js/salleadherant.js'
        );

        $data['batiments'] = $this->model_batiment->getAll();
        $data['salles']    = $this->model_salle->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_salle', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('batiment_id', 'Batiment', 'trim|required|xss_clean');
        $this->form_validation->set_rules('salle_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('salle_max_personne', 'Numbre de personne', 'trim|required|integer|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['batiment_id'] = $this->input->post('batiment_id');
           $data['salle_libelle'] = $this->input->post('salle_libelle');
           $data['salle_max_personne'] = $this->input->post('salle_max_personne');

           
           $batiment_id = $this->input->post('batiment_id');
           $batiment = $this->model_salle->getById($batiment_id);
           if($batiment) {
               $batiment_number_room = $batiment[0]->batiment_number_room;
               $count_salles_by_batiment = count($this->model_salle->getAllByBatimentId($batiment_id));
               if($count_salles_by_batiment >= $batiment_number_room) {
                   $this->session->set_flashdata('error', 'Enregistrement impossible: nombre maximum de salle dans ce batiment atteint!'); 
                   redirect('salle');
                   exit(0);
               }
           }


           $salle_id = $this->model_salle->save($data);

           $this->session->set_flashdata('add', 'Salle enregistrée!'); 

           redirect('salle');

        }

        $data['batiments'] = $this->model_batiment->getAll();
        $data['salles'] = $this->model_salle->getAll();

        $data['title'] = 'Salles';
        $data["js"] = array(
            base_url().'assets/js/salle.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_salle', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$salle_id = (int) $this->uri->segment(3)) {
            redirect('salle');
        }

        if(isset($_POST['salle_id'])) {
            $this->form_validation->set_rules('batiment_id', 'batiment', 'trim|required|xss_clean');
            $this->form_validation->set_rules('salle_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('salle_max_personne', 'Numbre de Personne', 'trim|required|integer|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['batiment_id']            = $this->input->post('batiment_id');
               $data['salle_id']               = $this->input->post('salle_id');
               $data['salle_libelle']          = $this->input->post('salle_libelle');
               $data['salle_max_personne']     = $this->input->post('salle_max_personne');

               $this->model_salle->update($this->input->post('salle_id'), $data);

               $this->session->set_flashdata('update', 'Salle mise à jour!'); 

               redirect('salle');

                }
            }    

            $data['batiments'] = $this->model_batiment->getAll();

            $salle = $this->model_salle->getById($salle_id);
            if(empty($salle)) {
                redirect('salle');
            }
            $salle = $salle[0];
            $data['salle'] = $salle;
            $data['batiment_id'] = $salle->batiment_id;
            $data['salles'] = $this->model_salle->getAll();

            $data['title'] = 'Salles';
            $data["js"] = array(
                base_url().'assets/js/salle.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_salle', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$salle_id = (int) $this->uri->segment(3)) {
            redirect('salle');
        }
        
        try {
            $this->model_salle->delete($salle_id);
            $this->session->set_flashdata('delete', 'Salle supprimée!');
        } catch(Exception $e) {
            redirect('salle');
        }

        redirect('salle'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('salle');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_salle->delete($i);
      }
      $this->session->set_flashdata('delete', 'Salle(s) supprimée(s)');
      redirect('salle');
    }


    
    public function batiment() {
        $batiment_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$batiment_id)
          $data_salle = $this->model_salle->getAll();
        else
          $data_salle = $this->model_salle->getAllByBatimentId($batiment_id);


        $data['title'] = 'Salles';
        $data["js"] = array(
                base_url().'assets/js/salle.js'
        );

        $data['batiments'] = $this->model_salle->getAll();
        $data['salles'] = $data_salle;

        $data['title'] = 'Salles';
        $data["js"] = array(
            base_url().'assets/js/salle.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_salle', $data);
        $this->load->view('home/includes/footer', $data);

    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>