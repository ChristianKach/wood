<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Méditation</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($meditation)) { ?>
                        <h2>Ajouter une meditation</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $meditation->meditation_theme; ?></h2>
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


                    <?php if(!isset($meditation)) { ?>
                        <form id="form_meditation" method="post" action="<?php echo site_url('meditation/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_meditation" 
                        method="post" action="<?php echo site_url('meditation/update') . '/' . $meditation_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programme_id">
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
                            <option value=""></option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meditation_theme">
                         Méditation libellé <span class="required">*</span> 
                        </label>
                        <?php echo form_error('meditation_theme', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php echo set_value('meditation_theme');
                           if(isset($meditation)) echo $meditation->meditation_theme; ?>" 
                           placeholder="Libellé" name="meditation_theme" id="meditation_theme" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meditation_date">
                         Méditation date <span class="required">*</span> 
                        </label>
                        <?php echo form_error('meditation_date', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($meditation)) echo $meditation->meditation_date; ?>" 
                           placeholder="jj/mm/aaaa" name="meditation_date" id="meditation_date" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meditation_heure_debut">
                         Heure de début <span class="required">*</span> 
                        </label>
                        <?php echo form_error('meditation_heure_debut', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php echo set_value('meditation_heure_debut');
                           if(isset($meditation)) echo $meditation->meditation_heure_debut; ?>" 
                           placeholder="hh:mm" name="meditation_heure_debut" id="meditation_heure_debut" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meditation_heure_fin">
                         Heure de fin <span class="required">*</span> 
                        </label>
                        <?php echo form_error('meditation_heure_fin', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php echo set_value('meditation_heure_fin');
                           if(isset($meditation)) echo $meditation->meditation_heure_fin; ?>" 
                           placeholder="hh:mm" name="meditation_heure_fin" id="meditation_heure_fin" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="meditation_predicateur">
                         Prédicateur
                        </label>
                        <?php echo form_error('meditation_predicateur', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php echo set_value('meditation_predicateur');
                           if(isset($meditation)) echo $meditation->meditation_predicateur; ?>" 
                           placeholder="Prédicateur" name="meditation_predicateur" id="meditation_predicateur" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($meditation)) { ?>
                          <input type="hidden" name="meditation_id" value="<?php echo $meditation->meditation_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_meditation').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Méditation</h2>
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

                                   <option value=""></option>

                                   <?php foreach($programmes as $p) {

                                  echo '<option value="'.$p->programme_id.'">'.$p->programme_libelle.'</option>'; 

                                   }

                                   ?>
                               </select>
                              </div>

                            
                              <div class="col-md-5 col-sm-5 col-xs-12">
                               <select class="form-control" style="width: 250px;" id="table_semaine_id" name="table_semaine_id" required="required">

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
                        <th>Programme</th>
                        <th>Semaine</th>
                        <th>Méditation Libellé</th>
                        <th>Date</th>
                        <th>Heure de début</th>
                        <th>Heure de fin</th>
                        <th>Prédicateur</th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($meditations as $p) { ?>       
                      <tr>
                          <td>
                             
                                  <input type="checkbox" class="check_item" value="<?php echo $p->meditation_id; ?>">
                              
                          </td>
                          <td>
                              <?php
                                 $semaine = $this->model_semaine->getById($p->semaine_id);
                                 if($semaine) { 
                                     $programme = $this->model_programme->getById($semaine[0]->programme_id);
                                     if($programme)
                                         echo truncate($programme[0]->programme_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td>
                              <?php
                                 $semaine = $this->model_semaine->getById($p->semaine_id);
                                 if($semaine) { 
                                     echo truncate($semaine[0]->semaine_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td><?php echo truncate($p->meditation_theme, 20); ?></td>
                          <td>
                              <?php if($p->meditation_date)
                                        echo truncate(formatDateToPHP($p->meditation_date), 20);
                                    else
                                      echo '';
                               ?>
                          </td>
                          <td><?php echo truncate($p->meditation_heure_debut, 20); ?></td>
                          <td><?php echo truncate($p->meditation_heure_fin, 20); ?></td>
                          <td><?php echo truncate($p->meditation_predicateur, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>meditation/update/<?php echo $p->meditation_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->meditation_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
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


        