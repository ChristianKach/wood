<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Méditation - Présence</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                   <h2>Méditation - Présence</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link">
                          <i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content row">
                    <br />

                    <div class="col-lg-12">
                        <?php if($this->session->flashdata('add')) {?>
                          <div class="alert alert-success" role="alert" id="add">
                        <?php echo $this->session->flashdata('add'); ?>
                       </div>

                        <?php }?>
                        <?php if($this->session->flashdata('delete')){?>
                          <div class="alert alert-success" role="alert" id="delete">
                        <?php echo $this->session->flashdata('delete'); ?>
                       </div>
                        <?php }?>

                        <?php if($this->session->flashdata('update')){?>
                          <div class="alert alert-success" role="alert" id="update">
                        <?php echo $this->session->flashdata('update'); ?>
                       </div>
                        <?php }?>
                        
                        <?php if($this->session->flashdata('error')){?>
                          <div class="alert alert-danger" role="alert" id="error">
                        <?php echo $this->session->flashdata('error'); ?>
                       </div>
                        <?php }?>
                    </div>


                    
                    <form id="form_meditationadherant" method="post" action="<?php echo site_url('presence/add-meditation'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salle_id">
                            Programme <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="programme_id" name="programme_id" required="required" class="form-control col-md-7 col-xs-12">
                              <option value=""></option>
                              <?php foreach($programmes as $p) {
                                      echo '<option value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semaine_id">
                            Semaine <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="semaine_id" name="semaine_id" required="required" class="form-control col-md-7 col-xs-12">
                              
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meditation_id">
                            Méditation <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="meditation_id" name="meditation_id" required="required" class="form-control col-md-7 col-xs-12">
                          </select>
                        </div>
                      </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adherants_selected">
                         Adhérant(s) sélectionné(s) <span class="required">*</span> 
                        </label>
                        <?php echo form_error('salle_libelle', '<span style="color: red;">', '</span>'); ?>

                        <div class="col-md-8 col-sm-8 col-xs-12">
                          
                          

                          <select id="adherants_selected" multiple name="adherant_selected" required="required" class="form-control col-md-7 col-xs-12">
                              <option></option>
                              <?php foreach($adherants as $a) {
                                        echo '<option value="'.$a->adherant_id.'">'
                                        .$a->adherant_nom. ' ' .$a->adherant_prenom.'</option>';
                                    }
                              ?>
                          </select>


                        </div>
                      </div>


                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adherants_selected">
                         Adhérant(s) sélectionné(s) <span class="required">*</span> 
                        </label>
                        <?php //echo form_error('salle_libelle', '<span style="color: red;">', '</span>'); ?>
                        
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          
                          <?php //if(!isset($_POST) || empty($_POST)) { ?>

                          <select id="adherants_selected" multiple name="adherant_selected" required="required" class="form-control col-md-7 col-xs-12">
                              <?php //foreach($adherants_selected as $p) {
                                    //    echo '<option selected="selected" value="'.$p->adherant_id.'">'
                                    //    .$p->adherant_nom. ' ' .$p->adherant_prenom.'</option>';
                              //} ?>
                          </select>

                          <?php //} else {  ?>
                              <select id="adherants_selected" multiple name="adherants_selected[]" required="required" class="form-control col-md-7 col-xs-12">
                                <?php //$adherants_selected = $_POST['items_checked'];
                                      //foreach($adherants_selected as $id) {
                                      //   $adherant = $this->model_adherant->getById($id)[0];
                                      //    echo '<option selected="selected" value="'.$adherant->adherant_id.'">'
                                      //    .$adherant->adherant_nom. ' ' .$adherant->adherant_prenom.'</option>';
                                      //} 
                                ?>
                              </select>
                          <?php //} ?>

                        </div>
                      </div> -->


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meditation_id">
                            Présence <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="presence" name="presence" required="required" class="form-control col-md-7 col-xs-12">
                              <option value="Présent(e)">Présent(e)</option>
                              <option value="Absent(e)">Absent(e)</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meditation_id">
                            Anncienneté <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="annciennete" name="annciennete" required="required" class="form-control col-md-7 col-xs-12">
                              <option value="Présent(e)">Nouveau</option>
                              <option value="Absent(e)">Ancien</option>
                          </select>
                        </div>
                      </div>

                      <?php if(isset($salle)) { ?>
                          <input type="hidden" name="salle_id" value="<?php echo $salle->salle_id; ?>" />
                      <?php } ?>


                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_meditationadherant').reset();" class="btn btn-primary">Annuler</button>
                          <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-12 col-xs-12">

                  <div class="x_panel">
                  <div class="x_title">
                    <h2>Méditation - présence</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <p class="text-muted font-13 m-b-30">
                           <form style="float: left;" method="post" action="" id="" enctype="multipart/form-data">
                              
                            <span style="float: left;">programmes</span>
                              <div class="col-md-5 col-sm-5 col-xs-12">
                               <select class="form-control" style="width: 250px;" id="table_programme_id" name="table_programme_id" required="required">

                                   <option value="">Toutes les programmes</option>

                                   <?php foreach($programmes as $p) {

                                      if($programme_id = (int) $this->uri->segment(3)) {
                                        if($programme_id == $p->programme_id) {
                                        echo '<option selected="selected" value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                         } else {
                                            echo '<option value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                         }

                                        } else {
                                          echo '<option value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                        } 
                                      }
                                   ?>
                               </select>
                              </div>
                              
                           </form>
                           
                           <button id="btn_delete_many" class="btn btn-success">
                               <i class="fa fa-plus-circle"></i> Ajouter dans une méditation
                           </button> 

                           
                  </p>

                    <table id="table_data" aria-describedby="datatable_info" role="grid" class="table table-striped table-bordered dataTable no-footer">

                      <thead>
                        <tr>
                        <th>
                          <input type="checkbox" id="check_all">
                        </th>
                          <th>Matricule</th>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Programme</th>
                          <th>Méditation</th>
                          <th>Présent(e)?</th>
                          <th>Anncinneté</th>
                          <th>#Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                          
                          <?php foreach($adherants as $p) { ?>       
                      <tr>
                          <td>
                              <?php if($p->adherant_photo) { ?>
                                <?php if($this->session->userdata("role_libelle") != 'Secretaire') { ?>
                                 <a href="<?php echo site_url(); ?>adherant/show/<?php echo $p->adherant_id; ?>">
                                  <img width="32" height="32" src="<?php echo base_url(); ?><?php echo $p->adherant_photo; ?>" class="avatar" alt="Avatar">
                                  </a>
                                <?php } else { ?>
                                  <img width="32" height="32" src="<?php echo base_url(); ?><?php echo $p->adherant_photo; ?>" class="avatar" alt="Avatar">
                                <?php } ?>
                              <?php } else { ?>
                                 <?php if($this->session->userdata("role_libelle") != 'Secretaire') { ?>
                                 <a href="<?php echo site_url(); ?>adherant/show/<?php echo $p->adherant_id; ?>">
                                  <img width="32" height="32" src="<?php echo base_url(); ?>assets/template/images/user.png" class="avatar" alt="Avatar">
                                  </a>
                                 <?php } else { ?>
                                  <img width="32" height="32" src="<?php echo base_url(); ?>assets/template/images/user.png" class="avatar" alt="Avatar">
                                 <?php } ?>
                              <?php } ?>

                              <input type="checkbox" class="check_item" value="<?php echo $p->adherant_id; ?>">
                          </td>
                          <td><?php echo truncate($p->adherant_matricule, 20); ?></td>
                          <td><?php echo truncate($p->adherant_nom, 20); ?></td>
                          <td><?php echo truncate($p->adherant_prenom, 20); ?></td>

                          <td>
                              <?php
                                 $programme_adherant = $this->model_programme_adherant->getByAdherantId($p->adherant_id);
                                 if($programme_adherant) { 
                                     $programme = $this->model_programme->getById($programme_adherant[0]->programme_id);
                                     if($programme)
                                         echo truncate($programme[0]->programme_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>

                          <td>
                              <?php
                                 $meditation_adherant = $this->model_meditation_adherant->getByAdherantId($p->adherant_id);
                                 if($meditation_adherant) { 
                                     $meditation = $this->model_meditation->getById($meditation_adherant[0]->meditation_id);
                                     if($meditation)
                                         echo truncate($meditation[0]->meditation_theme, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>

                          <td>
                              <?php
                                 $meditation_adherant = $this->model_meditation_adherant->getByAdherantId($p->adherant_id);
                                 if($meditation_adherant) { 
                                     echo $meditation_adherant[0]->presence;
                                     
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>

                          <td>
                              <?php
                                 $meditation_adherant = $this->model_meditation_adherant->getByAdherantId($p->adherant_id);
                                 if($meditation_adherant) { 
                                     echo $meditation_adherant[0]->annciennete;
                                     
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>

                          
                          <td>
                           <center>

                            <a href="<?php echo site_url(); ?>presence/addmeditation/<?php echo $p->adherant_id; ?>"  
                            class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i> Ajouter dans une méditation</a>
                            <a href="<?php echo site_url(); ?>adherant/update/<?php echo $p->adherant_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>

                           </center>
                          </td>
                      </tr>
                          <?php } ?>
                          
                      </tbody>

                    </table>
                    <br/><br/><br/><br/>

                    </div>
                    </div>
                   </div>
                  </div>
                </div>



              </div>

          </div>
        </div>

        
        <!-- /page content -->


        