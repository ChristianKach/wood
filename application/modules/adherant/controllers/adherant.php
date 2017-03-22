<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Adherant extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('adherant/model_adherant');
        $this->load->model('programme/model_programme');
        $this->load->model('programme/model_programme_adherant');
        $this->load->model('pays/model_pays');
        $this->load->model('ville/model_ville');
        $this->load->model('commune/model_commune');
        $this->load->model('situation_matrimoniale/model_situation_matrimoniale');
        $this->load->model('semaine/model_semaine');
        $this->load->model('meditation/model_meditation'); 
        $this->load->model('meditation/model_meditation_adherant');
        $this->load->model('malade/model_malade');
        $this->load->model('traitement/model_traitement');
        $this->load->model('famille/model_famille');
    }

    public function index() {
        $data['title'] = 'Adherants';
        $data["js"] = array(
            base_url().'assets/js/adherant.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['pays'] = $this->model_pays->getAll();
        $data['villes'] = $this->model_ville->getAll();
        $data['communes'] = $this->model_commune->getAll();
        $data['situation_matrimoniales'] = $this->model_situation_matrimoniale->getAll();
        $data['familles'] = $this->model_famille->getAll();
        
        $max_id = $this->model_adherant->getNextPrimaryKey();
        $data['new_matricule'] = 'zoe-' . date('dmY') . '-' . $max_id;

        $data['adherants'] = $this->model_adherant->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_adherant', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function show() {
        if(!$adherant_id = (int) $this->uri->segment(3)) {
            redirect('adherant');
        }

        $adherant = $this->model_adherant->getById($adherant_id);
        if(empty($adherant)) {
            redirect('adherant');
        }

        $adherant = $adherant[0];
        $data['adherant'] = $adherant;
        
        $programmes = array();
        $programme_adherant = $this->model_programme_adherant->getByAdherantId($adherant_id);
        foreach($programme_adherant as $pa) {
            $programme = $this->model_programme->getById($pa->programme_id);
            $programmes[] = $programme;
        }
        $data['programmes'] = $programmes;
        $data['nb_meditation'] = 0;
        
          foreach($programmes as $pro) {
            foreach ($pro as $p) {
              $semaines = $this->model_semaine->getAllByProgrammeId($p->programme_id);
              
                foreach($semaines as $s) {
                    $meditations = $this->model_meditation->getAllBySemaineId($s->semaine_id);
                    foreach($meditations as $m) {
                      $meditation_adherant = $this->model_meditation_adherant->getAllByMediationIdAndAdherantId($m->meditation_id, $adherant_id);
                      $data['nb_meditation'] = count($meditation_adherant);
                    }
                    
                }
              
            }
          }

        $data["maladie"] = $this->model_malade->getAllByAdhereantId($adherant_id);


        $data['title'] = 'Adhérant';
        $data["js"] = array(
            base_url().'assets/js/adherant.js'
        );
 
        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_show', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');

        $this->form_validation->set_rules('adherant_matricule', 'Matricule', 'trim|required|max_length[150]|xss_clean');

        $this->form_validation->set_rules('adherant_nom', 'Nom', 'trim|required||max_length[150]|xss_clean');

        $this->form_validation->set_rules('adherant_prenom', 'Prénom', 'trim|required||max_length[150]|xss_clean');

        $this->form_validation->set_rules('adherant_birthday', 'Date de naissance', 'trim|required|xss_clean|max_length[150]');

        $this->form_validation->set_rules('pays_id', 'Pays', 'trim|required|xss_clean');
        $this->form_validation->set_rules('ville_id', 'Ville', 'trim|required|xss_clean');
        $this->form_validation->set_rules('commune_id', 'Commune', 'trim|required|xss_clean');

        $this->form_validation->set_rules('adherant_quartier', 'Quartier', 'trim|required|xss_clean|max_length[150]');

        $this->form_validation->set_rules('adherant_profession', 'Profession', 'trim|required|xss_clean|max_length[150]');

        $this->form_validation->set_rules('adherant_ethnie', 'Ethnie', 'trim|required|xss_clean|max_length[150]');

        $this->form_validation->set_rules('situation_matrimoniale_id', 'Situation matrimoniale', 'trim|required|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['adherant_matricule'] = $this->input->post('adherant_matricule');
           $data['adherant_nom'] = $this->input->post('adherant_nom');
           $data['adherant_prenom'] = $this->input->post('adherant_prenom');
           $data['adherant_birthday'] = formatDateToDB($this->input->post('adherant_birthday'));
           $data['commune_id'] = $this->input->post('commune_id');
           $data['famille_id'] = $this->input->post('famille_id');
           $data['adherant_quartier'] = $this->input->post('adherant_quartier');
           $data['adherant_telephone_1'] = $this->input->post('adherant_telephone_1');
           $data['adherant_telephone_2'] = $this->input->post('adherant_telephone_2');
           $data['adherant_telephone_3'] = $this->input->post('adherant_telephone_3');
           $data['adherant_profession'] = $this->input->post('adherant_profession');
           $data['adherant_ethnie'] = $this->input->post('adherant_ethnie');
           $data['situation_matrimoniale_id'] = $this->input->post('situation_matrimoniale_id');
           $data['adherant_email'] = $this->input->post('adherant_email');
           $data['adherant_created_at'] = date('Y-m-d H:i:s');

           $adherant_id = $this->model_adherant->save($data);
           if($adherant_id) {
               $data_programme['programme_id'] = $this->input->post('programme_id');
               $data_programme['adherant_id'] = $adherant_id;
               $this->model_programme_adherant->save($data_programme);
           }

           if(isset($_FILES) && $_FILES['adherant_photo']['error'] == 0) {
               $this->load->library('upload');

               $path = $_FILES['adherant_photo']['name'];
               $ext = pathinfo($path, PATHINFO_EXTENSION);

               if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                   echo '<script>alert("Veuillez sélectionner un fichier Image svp");</script>';
                   //echo '<script>window.location.href = "'.site_url('adherant').'";</script>';
               }

               $adherant_photo_file_name =  "adherant_photo_" . date('d-m-Y-H-i-s') . ".$ext";
               
               $this->handleUploadImageFile('adherant_photo', $adherant_photo_file_name, 'jpg|jpeg|png');
               $adherant_photo_file_name = UPLOAD_IMAGES_DIR.$adherant_photo_file_name;
              
               $data['adherant_photo'] = $adherant_photo_file_name;
               $adherant_id = $this->model_adherant->update($adherant_id, $data);
           }

           $this->session->set_flashdata('add', 'Adherant enregistré!'); 

           redirect('adherant');

        }

        $data['title'] = 'Adherants';
        $data["js"] = array(
            base_url().'assets/js/adherant.js'
        );    

        $data['programmes'] = $this->model_programme->getAll();
        $data['pays'] = $this->model_pays->getAll();
        $data['villes'] = $this->model_ville->getAll();
        $data['communes'] = $this->model_commune->getAll();
        $data['situation_matrimoniales'] = $this->model_situation_matrimoniale->getAll();
        $data['new_matricule'] = 'zoe-' . date('dmY');
        $data['adherants'] = $this->model_adherant->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_adherant', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$adherant_id = (int) $this->uri->segment(3)) {
            redirect('adherant');
        }

        if(isset($_POST['adherant_id'])) {
            $this->form_validation->set_rules('programme_id', 'Programme', 'trim|required|xss_clean');

            $this->form_validation->set_rules('adherant_matricule', 'Matricule', 'trim|required|max_length[150]|xss_clean');

            $this->form_validation->set_rules('adherant_nom', 'Nom', 'trim|required||max_length[150]|xss_clean');

            $this->form_validation->set_rules('adherant_prenom', 'Prénom', 'trim|required||max_length[150]|xss_clean');

            $this->form_validation->set_rules('adherant_birthday', 'Date de naissance', 'trim|required|xss_clean|max_length[150]');

            $this->form_validation->set_rules('pays_id', 'Pays', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ville_id', 'Ville', 'trim|required|xss_clean');
            $this->form_validation->set_rules('commune_id', 'Commune', 'trim|required|xss_clean');

            $this->form_validation->set_rules('adherant_quartier', 'Quartier', 'trim|required|xss_clean|max_length[150]');

            $this->form_validation->set_rules('adherant_profession', 'Profession', 'trim|required|xss_clean|max_length[150]');

            $this->form_validation->set_rules('adherant_ethnie', 'Ethnie', 'trim|required|xss_clean|max_length[150]');

            $this->form_validation->set_rules('situation_matrimoniale_id', 'Situation matrimoniale', 'trim|required|xss_clean');
            
            
            if ($this->form_validation->run()) {
               $data['adherant_matricule']        = $this->input->post('adherant_matricule');
               $data['adherant_nom']              = $this->input->post('adherant_nom');
               $data['adherant_prenom']           = $this->input->post('adherant_prenom');
               $data['adherant_birthday']         = formatDateToDB($this->input->post('adherant_birthday'));
               $data['commune_id']                = $this->input->post('commune_id');
               $data['famille_id'] = $this->input->post('famille_id');
               $data['adherant_quartier']         = $this->input->post('adherant_quartier');
               $data['adherant_telephone_1']      = $this->input->post('adherant_telephone_1');
               $data['adherant_telephone_2']      = $this->input->post('adherant_telephone_2');
               $data['adherant_telephone_3']      = $this->input->post('adherant_telephone_3');
               $data['adherant_profession']       = $this->input->post('adherant_profession');
               $data['adherant_ethnie']           = $this->input->post('adherant_ethnie');
               $data['situation_matrimoniale_id'] = $this->input->post('situation_matrimoniale_id');
               $data['adherant_email']            = $this->input->post('adherant_email');

               $this->model_adherant->update($this->input->post('adherant_id'), $data);

               $programme_id = $this->model_programme_adherant->getByAdherantId($adherant_id);
               if($programme_id) {
                   $this->model_programme_adherant->update($this->input->post('programme_id'),
                                                           $this->input->post('adherant_id'));
               } else {
                   $data_programme_adherant['programme_id'] = $this->input->post('programme_id');
                   $data_programme_adherant['adherant_id'] = $this->input->post('adherant_id');
                   $this->model_programme_adherant->save($data_programme_adherant);
               }
               

              if(isset($_FILES) && $_FILES['adherant_photo']['error'] == 0) {
                 $this->load->library('upload');

                 $path = $_FILES['adherant_photo']['name'];
                 $ext = pathinfo($path, PATHINFO_EXTENSION);

                 if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                     echo '<script>alert("Veuillez sélectionner un fichier Image svp");</script>';
                     //echo '<script>window.location.href = "'.site_url('adherant').'";</script>';
                 }

                 $adherant_photo_file_name =  "adherant_photo_" . date('d-m-Y-H-i-s') . ".$ext";
                 
                 $this->handleUploadImageFile('adherant_photo', $adherant_photo_file_name, 'jpg|jpeg|png');
                 $adherant_photo_file_name = UPLOAD_IMAGES_DIR.$adherant_photo_file_name;
                
                 $data['adherant_photo'] = $adherant_photo_file_name;
                 $adherant_id = $this->model_adherant->update($adherant_id, $data);
              }


              $this->session->set_flashdata('update', 'Adhérant mis à jour!'); 

              redirect('adherant');

              }

            }    

            $adherant = $this->model_adherant->getById($adherant_id);
            if(empty($adherant)) {
                redirect('adherant');
            }

            $programme_id = $this->model_programme_adherant->getByAdherantId($adherant_id);
            if($programme_id)
                $programme_id = $programme_id[0]->programme_id;
            else
              $programme_id = 0;

            $adherant = $adherant[0];
            if($adherant->adherant_birthday)
                $adherant->adherant_birthday = formatDateToPHP($adherant->adherant_birthday);

            $data['adherant'] = $adherant;
            
            $data['programme_id'] = $programme_id;
            $data['programmes'] = $this->model_programme->getAll();
            $data['pays'] = $this->model_pays->getAll();
            $data['villes'] = $this->model_ville->getAll();
            $data['communes'] = $this->model_commune->getAll();
            $data['situation_matrimoniales'] = $this->model_situation_matrimoniale->getAll();
            $data['familles'] = $this->model_famille->getAll();

            $data['adherants'] = $this->model_adherant->getAll($adherant_id);

            $data['title'] = 'Adhérants';
            $data["js"] = array(
                base_url().'assets/js/adherant.js'
            );
 
            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_adherant', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$adherant_id = (int) $this->uri->segment(3)) {
            redirect('adherant');
        }
        
        try {
            $this->model_adherant->delete($adherant_id);
            $this->session->set_flashdata('delete', 'Adhérant supprimé!');
        } catch(Exception $e) {
            redirect('adherant');
        }

        redirect('adherant'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('adherant');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_adherant->delete($i);
      }
      $this->session->set_flashdata('delete', 'Adhérant(s) supprimé(s)');
      redirect('adherant');
    }


    public function importadherant() {
        if(empty($_FILES))
            redirect('adherant');
         
        if (isset($_FILES['importFileExcel']) 
                 && !($_FILES['importFileExcel']['error'])) {
                    
                    $this->load->library('upload');

                    $path = $_FILES['importFileExcel']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);

                    if($ext != 'xls' && $ext != 'xlsx') {

                        echo '<script>alert("Veuillez sélectionner un fichier Excel svp");</script>';
                        echo '<script>window.location.href = "'.site_url('adherant').'";</script>';
                    }

                    $excel_file_name = 'excel_file.xlsx';

                    $this->handleUploadTempFile('importFileExcel', $excel_file_name, 'xls|xlsx');

                    require_once APPPATH.'libraries/phpexcel/PHPExcel/IOFactory.php'; 


                    $excel_file_name = TEMP_UPLOAD_DIR.$excel_file_name;

                    $excel_reader = PHPExcel_IOFactory::createReaderForFile($excel_file_name);

                    $excel_obj = $excel_reader->load($excel_file_name);
                    $worksheet = $excel_obj->getSheet(0);
                    $lastRow   = $worksheet->getHighestRow();

                    $rows = array();
                    for ($row = 2; $row <= $lastRow; ++$row) {

                      $max_id = $this->model_adherant->getNextPrimaryKey();
                      $data_adherant['adherant_matricule'] = 'zoe-' . date('dmY') . '-' . $max_id;
                      $data_adherant['commune_id'] = 1;
                      $data_adherant['situation_matrimoniale_id'] = 1;

                      $data_adherant['adherant_nom'] = $worksheet->getCell('A'.$row)->getValue() ? $worksheet->getCell('A'.$row)->getValue() : "";

                      $data_adherant['adherant_prenom'] = $worksheet->getCell('B'.$row)->getValue() ? $worksheet->getCell('B'.$row)->getValue() : "";

                      $data_adherant['adherant_telephone_1'] = $worksheet->getCell('C'.$row)->getValue() ? 
                      $worksheet->getCell('C'.$row)->getValue() : "";

                      $data_adherant['adherant_created_at'] = date('Y-m-d H:i:s');

                      $adherant_id = $this->model_adherant->save($data_adherant);

                      if($adherant_id) {
                          $data_programme['table_programme_id'] = $this->input->post('table_programme_id');
                          $data_programme['adherant_id'] = $adherant_id;
                          $this->model_programme_adherant->save($data_programme);
                      }
                        
                    }
                    
                    
                    @unlink($excel_file_name);
                    
                    $this->session->set_flashdata('add','Adhérants importés!'); 
                    redirect('adherant');

              } else { 
                 redirect('adherant');
              } 
      

    }


    public function sms() {
        if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
            redirect('adherant');
        
        $list_numbers_to_send = [];
        $adherant_ids = $this->input->post('items_checked');
        foreach($adherant_ids as $i) {
            $i = (int) $i;
            $adherant = $this->model_adherant->getById($i);
            if($adherant && $adherant[0]->adherant_telephone_1)
                $list_numbers_to_send[] = $adherant[0];
        }

        $data['numbers'] = $list_numbers_to_send;
        $data['items_checked'] = $list_numbers_to_send;

        $data['title'] = 'Envoyer SMS';
        $data["js"] = array(
            base_url().'assets/js/adherant.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_sms', $data);
        $this->load->view('home/includes/footer', $data);
    }


    public function sendsmsprocess() {
        $this->form_validation->set_rules('list_numbers', 'Numéro de téléphone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sender_name', 'Titre', 'trim|required||max_length[11]|xss_clean');
        $this->form_validation->set_rules('sms_body', 'Message', 'trim|required|xss_clean');

        if ($this->form_validation->run()) {
            $numbers = $this->input->post('numbers');
            $numbers = explode('|', $numbers);
            $total = count($numbers) - 1;
            $message = $this->input->post('sms_body');
            $title = $this->input->post('sender_name');

            $data_sms['sms_numbers_count'] = $total;
            $sms_id = $this->model_adherant->saveSms($data_sms);

            $i = 1;
            foreach($numbers as $n) {
                if($n) {
                    $bool = $this->sendSMS($n, $title, $message);
                    if($bool) {
                        $data_sms['sms_sending_state'] = "$i / $total envoyé";
                        $this->model_adherant->updateSms($sms_id, $data_sms);
                        $i++;
                    }
                }
            }
            
            $data_sms['sms_body'] = $message;
            $data_sms['sms_sent_datetime'] = date('Y-m-d H:i:s');
            $this->model_adherant->updateSms($sms_id, $data_sms);

            $this->session->set_flashdata('add', 'Sms envoyés!');

        } else {
            $all_errors = $this->form_validation->getAllErrors();
            $error = $all_errors[0];
            sendJSON(false, '', $error);
        }


    }

    public function getsmssendingstate() {
      $state = $this->model_adherant->getSmsSendingState();
      sendJSON(true, '', $state);
    }

    public function programme() {
        $programme_id = (int) $this->uri->segment(3);

        $data_final = array();
        if(!$programme_id)
          $data_adherant = $this->model_adherant->getAll();
        else
          $data_adherant = $this->model_adherant->getAllByProgrammeId($programme_id);


        $data['title'] = 'Adhérants';
        $data["js"] = array(
                base_url().'assets/js/adherant.js'
        );

        $data['programmes'] = $this->model_programme->getAll();
        $data['pays'] = $this->model_pays->getAll();
        $data['villes'] = $this->model_ville->getAll();
        $data['communes'] = $this->model_commune->getAll();
        $data['situation_matrimoniales'] = $this->model_situation_matrimoniale->getAll();
        
        $max_id = $this->model_adherant->getNextPrimaryKey();
        $data['new_matricule'] = 'zoe-' . date('dmY') . '-' . $max_id;

        $data['adherants'] = $data_adherant;

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_adherant', $data);
        $this->load->view('home/includes/footer', $data);

    }
    

    
    private function sendSMS($phone_number, $title, $message) {
      sleep(1);
      return true;
      $phone_number = explode('-', $phone_number);
      $phone_number = $phone_number[0];
      $phone_number = (substr($phone_number, 0, 4) == '+225' 
                      ? $phone_number 
                      : '+225' . $phone_number);

      $token = "zJxGdgeGEGSGU9tNOz3pzzzzz5UOIEJGOidgozeiIGEOJIq4nE2ZSvv";
      $params = array(
             'to'      => $phone_number,
             'from'    => $title,
             'message' => $message
      );

      $r = sendSms($params, $token);

      return $r;

    }


    public function handleUploadImageFile($file, $entity_file_name, $extentions_allowed) {
        $config['file_name'] = $entity_file_name;
        
        $config['upload_path'] = UPLOAD_IMAGES_DIR;
        
        $config['full_path'] = UPLOAD_IMAGES_DIR . $entity_file_name; 
                                                                    

        $config['allowed_types'] = $extentions_allowed;
        $config['max_size']      = '2000';

        $this->upload->initialize($config);
            
        if(!empty($_FILES[$file]['name']) && !$this->upload->do_upload($file)) {
            debug($this->upload->display_errors());
            return false;
        }

       return true;
    }


    public function handleUploadTempFile($file, $entity_file_name, $extentions_allowed) {
        $config['file_name'] = $entity_file_name;
        
        $config['upload_path'] = TEMP_UPLOAD_DIR;
        
        $config['full_path'] = TEMP_UPLOAD_DIR . $entity_file_name; 
                                                                    

        $config['allowed_types'] = $extentions_allowed;
        $config['max_size']      = '2000';
                
        $this->upload->initialize($config);
            
        if(!empty($_FILES[$file]['name']) && !$this->upload->do_upload($file)) {
            
            return false;
        }

       return true;
    }

    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ ?>