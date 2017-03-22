<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Malade</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($malade)) { ?>
                        <h2>Ajouter un malade</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $malade->maladie_libelle; ?></h2>
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


                    <?php if(!isset($malade)) { ?>
                        <form id="form_malade" method="post" action="<?php echo site_url('malade/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_malade" 
                        method="post" action="<?php echo site_url('malade/update') . '/' . $malade_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                      
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Patient</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="adherant_id" id="adherant_id">
                            <option></option>

                            <?php foreach($adherants as $p) {
                                    
                                    if(isset($adherant_id) && $p->adherant_id == $adherant_id)  {
                                        echo '<option selected="selected" value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                    } else {
                                      echo '<option value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                    }
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="maladie_libelle">
                         Maladie libellé <span class="required">*</span> 
                        </label>
                        <?php echo form_error('maladie_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($malade)) echo $malade->maladie_libelle; ?>" 
                           placeholder="Maladie libellé" name="maladie_libelle" id="maladie_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="maladie_healed">
                         Patient guerrie?<span class="required">*</span> 
                        </label>
                        <?php echo form_error('maladie_healed', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select name="maladie_healed" class="form-control col-md-7 col-xs-12">
                            <option <?php if(isset($malade) && $malade->maladie_healed == 'Non') echo 'selected="selected"'; ?> value="Non">Non</option>

                            <option <?php if(isset($malade) && $malade->maladie_healed == 'Oui') echo 'selected="selected"'; ?>  value="Oui">Oui</option>

                          </select>
                        </div>
                      </div>

                      <?php if(isset($malade)) { ?>
                          <input type="hidden" name="malade_id" value="<?php echo $malade->malade_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-8">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_malade').reset();" class="btn btn-primary">Annuler</button>
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Enregistrer</button>

                          <a href="<?php echo site_url('adherant'); ?>">
                              <button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Nouveau malade</button>
                          </a>

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
                    <h2>malade</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <p class="text-muted font-13 m-b-30">
                           <form style="float: left;" method="post" action="<?php echo site_url('adherant/import-adherant'); ?>" id="form_import_excel" enctype="multipart/form-data">
                              
                            <span style="float: left;">adherants</span>
                              <div class="col-md-5 col-sm-5 col-xs-12">
                               <select class="form-control select2_single" style="width: 250px;" id="table_adherant_id" name="table_adherant_id" required="required">

                                   <option value="">Tous les adherants</option>

                                   <?php foreach($adherants as $p) {

                                      if($adherant_id = (int) $this->uri->segment(3)) {
                                        if($adherant_id == $p->adherant_id) {
                                        echo '<option selected="selected" value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                         } else {
                                            echo '<option value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                         }

                                        } else {
                                          echo '<option value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                        } 

                                   }

                                   ?>
                               </select>
                              </div>
                              
                           </form>
                           <br/>
                            
                           <a id="btn_delete_many" href="#">
                               <i class="fa fa-minus-circle" style="color: red;"></i> Supprimer
                           </a>
                  </p>

                    <table id="table_data" aria-describedby="datatable_info" role="grid" class="table table-striped table-bordered dataTable no-footer">

                      <thead>
                        <tr>
                        <th>
                          
                              <input type="checkbox" id="check_all">
                          
                        </th>
                        <th>Patient</th>
                        <th>Maladie libellé</th>
                        <th>Patient guerrie?</th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($malades as $p) { ?>       
                      <tr>
                          <?php $adherant = $this->model_adherant->getById($p->adherant_id); ?>
                          <td>

                              <?php if($adherant[0]->adherant_photo) { ?>
                               <?php if($this->session->userdata("role_libelle") != 'Secretaire') { ?>
                                <a href="<?php echo site_url(); ?>adherant/show/<?php echo $adherant[0]->adherant_id; ?>">
                                    <img width="32" height="32" src="<?php echo base_url(); ?><?php echo $p->adherant_photo; ?>" class="avatar" alt="Avatar">
                                </a>
                               <?php } else { ?>
                                    <img width="32" height="32" src="<?php echo base_url(); ?><?php echo $p->adherant_photo; ?>" class="avatar" alt="Avatar">
                               <?php } ?>
                              <?php } else { ?>
                                <?php if($this->session->userdata("role_libelle") != 'Secretaire') { ?>
                                  <a href="<?php echo site_url(); ?>adherant/show/<?php echo $adherant[0]->adherant_id; ?>">
                                  <img width="32" height="32" src="<?php echo base_url(); ?>assets/template/images/user.png" class="avatar" alt="Avatar">
                                  </a>
                                <?php } else { ?>
                                  <img width="32" height="32" src="<?php echo base_url(); ?>assets/template/images/user.png" class="avatar" alt="Avatar">
                                <?php } ?>
                              <?php } ?>
                             
                                  <input type="checkbox" class="check_item" value="<?php echo $p->malade_id; ?>">
                              
                          </td>
                          <td>
                              <?php
                                 
                                 if($adherant) { 
                                     echo truncate($adherant[0]->adherant_nom.' '.$adherant[0]->adherant_prenom, 50);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td><?php echo truncate($p->maladie_libelle, 20); ?></td>
                          <td><?php echo truncate($p->maladie_healed, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>malade/update/<?php echo $p->malade_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->malade_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
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


        