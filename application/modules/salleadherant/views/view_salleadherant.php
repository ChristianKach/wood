<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Salle - Adhérant</h3>
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                   <h2>Salle - Adhérant</h2>
                    
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


                    
                    <form id="form_salleadherant" method="post" action="<?php echo site_url('salleadherant/add-in-salle'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salle_id">
                            Salle <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="salle_id" name="salle_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($salles as $p) {
                                    if(isset($salle_id) && $p->salle_id == $salle_id)
                                        echo '<option selected="selected" value="'.$p->salle_id.'">'.$p->salle_libelle.'</option>';
                                    else
                                      echo '<option value="'.$p->salle_id.'">'.$p->salle_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adherants_selected">
                         Adhérant(s) sélectionné(s) <span class="required">*</span> 
                        </label>
                        <?php echo form_error('salle_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          
                          <?php if(!isset($_POST) || empty($_POST)) { ?>

                          <select id="adherants_selected" multiple="multiple" name="adherant_selected" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($adherants_selected as $p) {
                                        echo '<option selected="selected" value="'.$p->adherant_id.'">'
                                        .$p->adherant_nom. ' ' .$p->adherant_prenom.'</option>';
                              } ?>
                          </select>

                          <?php } else {  ?>
                              <select id="adherants_selected" multiple="multiple" name="adherants_selected[]" required="required" class="form-control col-md-7 col-xs-12">
                                <?php $adherants_selected = $_POST['items_checked'];
                                      foreach($adherants_selected as $id) {
                                          $adherant = $this->model_adherant->getById($id)[0];
                                          echo '<option selected="selected" value="'.$adherant->adherant_id.'">'
                                          .$adherant->adherant_nom. ' ' .$adherant->adherant_prenom.'</option>';
                                      } 
                                ?>
                              </select>
                          <?php } ?>

                        </div>
                      </div>

                      <?php if(isset($salle)) { ?>
                          <input type="hidden" name="salle_id" value="<?php echo $salle->salle_id; ?>" />
                      <?php } ?>


                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_salleadherant').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Salle - Adhérant</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <p class="text-muted font-13 m-b-30">
                           <form style="float: left;" method="post" action="" id="" enctype="multipart/form-data">
                              
                            <span style="float: left;">salles</span>
                              <div class="col-md-5 col-sm-5 col-xs-12">
                               <select class="form-control" style="width: 250px;" id="table_salle_id" name="table_salle_id" required="required">

                                   <option value="">Toutes les salles</option>

                                   <?php foreach($salles as $p) {

                                      if($salle_id = (int) $this->uri->segment(3)) {
                                        if($salle_id == $p->salle_id) {
                                        echo '<option selected="selected" value="'.$p->salle_id.'">'.$p->salle_libelle.'</option>';
                                         } else {
                                            echo '<option value="'.$p->salle_id.'">'.$p->salle_libelle.'</option>';
                                         }

                                        } else {
                                          echo '<option value="'.$p->salle_id.'">'.$p->salle_libelle.'</option>';
                                        } 
                                      }
                                   ?>
                               </select>
                              </div>
                              
                           </form>
                           
                           <button id="btn_delete_many" class="btn btn-success">
                               <i class="fa fa-plus-circle"></i> Ajouter dans une salle
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
                                <?php } else {?>
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

                            <a href="<?php echo site_url(); ?>salleadherant/addInSalle/<?php echo $p->adherant_id; ?>"  
                            class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i> Ajouter dans une salle</a>
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


        