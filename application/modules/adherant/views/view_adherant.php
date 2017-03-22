<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Adhérants</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Recherche...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">

            <?php if($this->session->userdata("role_libelle") != 'Boss') { ?>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($adherant)) { ?>
                        <h2>Ajouter un nouveau adhérant</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $adherant->adherant_nom . ' ' . $adherant->adherant_prenom; ?></h2>
                    <?php } ?>
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
                    </div>


                    <?php if(!isset($adherant)) { ?>
                        <form id="form_programme" method="post" action="<?php echo site_url('adherant/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <?php } else { ?>
                        <form id="form_programme" 
                        method="post" action="<?php echo site_url('adherant/update') . '/' . $adherant_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <?php } ?>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adherant_prenom">
                        Programme <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="programme_id" name="programme_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($programmes as $p) {
                                    if(isset($programme_id) && $p->programme_id == $programme_id)
                                        echo '<option selected="selected" value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                    else
                                      echo '<option value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adherant_matricule">
                         Matricule <span class="required">*</span> 
                        </label>
                        <?php echo form_error('adherant_matricule', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($adherant)) echo $adherant->adherant_matricule; else echo $new_matricule; ?>" 
                           placeholder="Matricule" readonly="readonly" name="adherant_matricule" id="adherant_matricule" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adherant_nom">
                         Nom <span class="required">*</span> 
                        </label>
                        <?php echo form_error('adherant_nom', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('adherant_nom');
                          if(isset($adherant)) echo $adherant->adherant_nom; ?>" placeholder="Nom" id="adherant_nom" name="adherant_nom" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adherant_prenom">
                        Prénom <span class="required">*</span> 
                        </label>
                        <?php echo form_error('adherant_prenom', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('adherant_prenom');
                          if(isset($adherant)) echo $adherant->adherant_prenom; ?>" placeholder="Prénom" id="adherant_prenom" name="adherant_prenom" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="adherant_birthday" class="control-label col-md-3 col-sm-3 col-xs-12">
                         Date de naissance <span class="required">*</span> 
                        </label>
                        <?php echo form_error('adherant_birthday', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input id="adherant_birthday" value="<?php echo set_value('adherant_birthday'); if(isset($adherant)) echo $adherant->adherant_birthday; ?>" placeholder="jj/mm/aaaa" name="adherant_birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adherant_prenom">
                        Pays <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="pays_id" name="pays_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($pays as $p) {
                                    echo '<option value="'.$p->pays_id.'">'.$p->pays_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ville_id">
                        Ville <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="ville_id" name="ville_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($villes as $p) {
                                    echo '<option value="'.$p->ville_id.'">'.$p->ville_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ville_id">
                        Commune <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="commune_id" name="commune_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($communes as $p) {
                                    echo '<option value="'.$p->commune_id.'">'.$p->commune_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div> 

                      <div class="form-group col-md-5">
                        <label for="adherant_quartier" class="control-label col-md-3 col-sm-3 col-xs-12">Quartier <span class="required">*</span> </label>
                         <?php echo form_error('adherant_quartier', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo set_value('adherant_quartier');
                           if(isset($adherant)) echo $adherant->adherant_quartier; ?>" id="adherant_quartier" required="required" placeholder="Quartier" class="form-control col-md-7 col-xs-12" type="text" name="adherant_quartier">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="adherant_telephone_1" class="control-label col-md-3 col-sm-3 col-xs-12">Téléphone 1</label>
                         <?php echo form_error('adherant_telephone_1', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo set_value('adherant_telephone_1');
                           if(isset($adherant)) echo $adherant->adherant_telephone_1; ?>" placeholder="##-##-##-##" id="adherant_telephone_1" class="form-control col-md-7 col-xs-12" type="text" name="adherant_telephone_1" />
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="adherant_telephone_2" class="control-label col-md-3 col-sm-3 col-xs-12">Téléphone 2</label>
                         <?php echo form_error('adherant_telephone_2', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo set_value('adherant_telephone_2');
                           if(isset($adherant)) echo $adherant->adherant_telephone_2; ?>" placeholder="##-##-##-##" id="adherant_telephone_2" class="form-control col-md-7 col-xs-12" type="text" name="adherant_telephone_2" />
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="adherant_telephone_3" class="control-label col-md-3 col-sm-3 col-xs-12">Téléphone 3</label>
                         <?php echo form_error('adherant_telephone_3', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo set_value('adherant_telephone_3');
                           if(isset($adherant)) echo $adherant->adherant_telephone_3; ?>" placeholder="##-##-##-##" id="adherant_telephone_3" class="form-control col-md-7 col-xs-12" type="text" name="adherant_telephone_3" />
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="adherant_email" class="control-label col-md-3 col-sm-3 col-xs-12">Email </label>
                         <?php echo form_error('adherant_email', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo set_value('adherant_email');
                           if(isset($adherant)) echo $adherant->adherant_email; ?>" placeholder="Email" id="adherant_email" class="form-control col-md-7 col-xs-12" type="text" name="adherant_email" />
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="adherant_profession" class="control-label col-md-3 col-sm-3 col-xs-12">Profession <span class="required">*</span> </label>
                         <?php echo form_error('adherant_profession', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo set_value('adherant_profession');
                           if(isset($adherant)) echo $adherant->adherant_profession; ?>" placeholder="Profession" required="required" id="adherant_profession" class="form-control col-md-7 col-xs-12" type="text" name="adherant_profession" />
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="adherant_ethnie" class="control-label col-md-3 col-sm-3 col-xs-12">Ethnie <span class="required">*</span> </label>
                         <?php echo form_error('adherant_ethnie', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo set_value('adherant_ethnie');
                           if(isset($adherant)) echo $adherant->adherant_ethnie; ?>" placeholder="Profession" required="required" id="adherant_ethnie" class="form-control col-md-7 col-xs-12" type="text" name="adherant_ethnie" />
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="famille_id">
                        Famille <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="famille_id" name="famille_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($familles as $f) {
                                    echo '<option value="'.$f->famille_id.'">'.$f->famille_nom.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="situation_matrimoniale_id">
                        Situation matrimoniale <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="situation_matrimoniale_id" name="situation_matrimoniale_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($situation_matrimoniales as $p) {
                                    echo '<option value="'.$p->situation_matrimoniale_id.'">'.$p->situation_matrimoniale_libelle.'</option>';
                              } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adherant_matricule">
                         Photo
                        </label>
                        
                        <div class="col-md-8 col-sm-8 col-xs-12">

                          <div style="height: 150px; width: 150px; background-color: #ccc; margin-bottom: 5px;">
                              <center>
                                <?php if(isset($adherant->adherant_photo)) { ?>
                                    <img style="height: 150px; width: 150px;" src="<?php echo base_url() . $adherant->adherant_photo; ?>" />
                                <?php } else echo 'Photo aperçu'; ?>
                              </center>
                          </div>

                          <input type="file" value="<?php
                           if(isset($adherant->adherant_photo)) echo $adherant->adherant_photo; ?>" 
                           placeholder="Photo" readonly="readonly" name="adherant_photo" id="adherant_photo" required="required" class="form-control col-md-7 col-xs-12"
                            value="Sélectionner une photo">

                        </div>
                      </div> 

                      <?php if(isset($adherant)) { ?>
                          <input type="hidden" name="adherant_id" value="<?php echo $adherant->adherant_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_programme').reset();" class="btn btn-primary">Annuler</button>
                          <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

            <?php } ?>

            </div>



            <div class="row">
              <div class="col-md-12 col-xs-12">

                  <div class="x_panel">
                  <div class="x_title">
                    <h2>Adhérants</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <p class="text-muted font-13 m-b-30">
                           <form style="float: left;" method="post" action="<?php echo site_url('adherant/import-adherant'); ?>" id="form_import_excel" enctype="multipart/form-data">
                              
                            <span style="float: left;">Programmes</span>
                              <div class="col-md-5 col-sm-5 col-xs-12">
                               <select class="form-control" style="width: 250px;" id="table_programme_id" name="table_programme_id" required="required">

                                   <option value="">Tous les programmes</option>

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

                         <?php if($this->session->userdata("role_libelle") != 'Boss') { ?>
                               <input type="file" style="display: none;" name="importFileExcel" id="importFileExcel" class="btn btn-success" />
                               
                               <a style="margin-left: 50px;" id="btn_select_file_excel" href="javascript:document.getElementById('importFileExcel').click();" class="btn btn-success">
                               <i class="fa fa-file-excel-o"></i> Importer des Adhérants (Excel)
                               </a>

                           </form>
                           <button id="btn_send_sms" class="btn btn-warning">
                               <i class="fa fa-send"></i> Envoyer SMS
                           </button>
                    
                           <a id="btn_delete_many" href="#">
                               <i class="fa fa-minus-circle" style="color: red;"></i> Supprimer
                           </a>
                           
                      <?php } ?>

                  </p>

                    <table id="table_adherants" aria-describedby="datatable_info" role="grid" class="table table-striped table-bordered dataTable no-footer">

                      <thead>
                        <tr>
                        <th>
                          <input type="checkbox" id="check_all">
                        </th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Quartier</th>
                        <th>Téléphone</th>
                        <th>Profession</th>
                        <th>Date de naissance</th>
                        <th>Sexe</th>
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
                          <td>
                           <?php if($this->session->userdata("role_libelle") != 'Secretaire') { ?>
                              <a style="color: #2e6da4;" href="<?php echo site_url(); ?>adherant/show/<?php echo $p->adherant_id; ?>">
                                  <?php echo truncate($p->adherant_matricule, 20); ?>
                              </a>
                           <?php } else { ?>
                                  <?php echo truncate($p->adherant_matricule, 20); ?>
                           <?php } ?>
                          </td>
                          <td>
                            <?php if($this->session->userdata("role_libelle") != 'Secretaire') { ?>
                              <a style="color: #2e6da4;" href="<?php echo site_url(); ?>adherant/show/<?php echo $p->adherant_id; ?>">
                                  <?php echo truncate($p->adherant_nom, 20); ?>
                              </a>
                            <?php } else { ?>
                                  <?php echo truncate($p->adherant_nom, 20); ?>
                            <?php } ?>
                          </td>
                          <td><?php echo truncate($p->adherant_prenom, 20); ?></td>
                          <td><?php echo truncate($p->adherant_quartier, 20); ?></td>
                          <td><?php echo truncate($p->adherant_telephone_1, 20); ?></td>
                          <td><?php echo truncate($p->adherant_profession, 20); ?></td>
                          <td>
                              <?php if($p->adherant_birthday)
                                        echo truncate(formatDateToPHP($p->adherant_birthday), 20);
                                    else
                                      echo '';
                               ?>
                          </td>
                          <td><?php echo truncate($p->adherant_sexe, 20); ?></td>
                          <td>
                           <center>

                          <?php if($this->session->userdata("role_libelle") != 'Boss') { ?>
                            <a href="<?php echo site_url(); ?>adherant/update/<?php echo $p->adherant_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            
                            <?php if($this->session->userdata("role_libelle") != 'Secretaire') { ?>
                              <a href="#" data-id="<?php echo $p->adherant_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
                            <?php } ?>

                          <?php } ?>

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


        