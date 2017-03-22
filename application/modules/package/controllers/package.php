<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('package/model_package');
        $this->load->model('programme/model_programme');
    }

    public function index() {
        $data['title'] = 'Packages';
        $data["js"] = array(
            base_url().'assets/js/package.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['packages'] = $this->model_package->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_package', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');
        $this->form_validation->set_rules('package_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['programme_id'] = $this->input->post('programme_id');
           $data['package_libelle'] = $this->input->post('package_libelle');

           $package_id = $this->model_package->save($data);

           $this->session->set_flashdata('add', 'Package enregistré!'); 

           redirect('package');

        }

        $data['programmes'] = $this->model_programme->getAll();
        $data['packages'] = $this->model_package->getAll();

        $data['title'] = 'Packages';
        $data["js"] = array(
            base_url().'assets/js/package.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_package', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$package_id = (int) $this->uri->segment(3)) {
            redirect('package');
        }

        if(isset($_POST['package_id'])) {
            $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');
            $this->form_validation->set_rules('package_libelle', 'Libellé', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['programme_id']        = $this->input->post('programme_id');
               $data['package_id']          = $this->input->post('package_id');
               $data['package_libelle']     = $this->input->post('package_libelle');

               $this->model_package->update($this->input->post('package_id'), $data);

               $this->session->set_flashdata('update', 'Package mis à jour!'); 

               redirect('package');

                }
            }    

            $data['programmes'] = $this->model_programme->getAll();

            $package = $this->model_package->getById($package_id);
            if(empty($package)) {
                redirect('package');
            }
            $package = $package[0];
            $data['package'] = $package;
            $data['programme_id'] = $package->programme_id;
            $data['packages'] = $this->model_package->getAll();

            $data['title'] = 'Packages';
            $data["js"] = array(
                base_url().'assets/js/package.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_package', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$package_id = (int) $this->uri->segment(3)) {
            redirect('package');
        }
        
        try {
            $this->model_package->delete($package_id);
            $this->session->set_flashdata('delete', 'Package supprimé!');
        } catch(Exception $e) {
            redirect('package');
        }

        redirect('package'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('package');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_package->delete($i);
      }
      $this->session->set_flashdata('delete', 'Package(s) supprimé(s)');
      redirect('package');
    }


    
    public function programme() {
        $programme_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$programme_id)
          $data_package = $this->model_package->getAll();
        else
          $data_package = $this->model_package->getAllByProgrammeId($programme_id);


        $data['title'] = 'Packages';
        $data["js"] = array(
                base_url().'assets/js/package.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['packages'] = $data_package;

        $data['title'] = 'Packages';
        $data["js"] = array(
            base_url().'assets/js/package.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_package', $data);
        $this->load->view('home/includes/footer', $data);

    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>