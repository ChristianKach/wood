<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Traitement</h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($malade)) { ?>
                        <h2>Ajouter un traitement</h2>
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


                    <?php if(!isset($traitement)) { ?>
                        <form id="form_traitement" method="post" action="<?php echo site_url('traitement/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_traitement" 
                        method="post" action="<?php echo site_url('traitement/update') . '/' . $traitement_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                      
                      <div class="form-group">
                        <label for="malade_id" class="control-label col-md-3 col-sm-3 col-xs-12">Malade</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="malade_id" id="malade_id">
                            <option></option>

                            <?php foreach($malades as $p) {
                                    $adherant = $this->model_adherant->getById($p->adherant_id)[0];
                                    if(isset($malade_id) && $p->malade_id == $malade_id)  {
                                        echo '<option selected="selected" value="'.$p->malade_id.'">'.$adherant->adherant_nom.' '.$adherant->adherant_prenom.'</option>';
                                    } else {
                                      echo '<option value="'.$p->malade_id.'">'.$adherant->adherant_nom.' '.$adherant->adherant_prenom.'</option>';
                                    }
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="traitement_libelle">
                         Traitement libellé <span class="required">*</span> 
                        </label>
                        <?php echo form_error('traitement_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($traitement)) echo $traitement->traitement_libelle; ?>" 
                           placeholder="Traitement libellé" name="traitement_libelle" id="traitement_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="traitement_point_priere">
                         Point de prière <span class="required">*</span> 
                        </label>
                        <?php echo form_error('traitement_point_priere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea   
                           name="traitement_point_priere" id="traitement_point_priere" required="required" class="form-control col-md-7 col-xs-12"><?php set_value('traitement_point_priere');
                           if(isset($traitement)) echo $traitement->traitement_point_priere; ?></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="traitement_date_start">
                         Début traitement <span class="required">*</span> 
                        </label>
                        <?php echo form_error('traitement_date_start', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($traitement)) echo $traitement->traitement_date_start; ?>" 
                           placeholder="jj/mm/aaaa" name="traitement_date_start" id="traitement_date_start" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="traitement_date_end">
                         Début fin <span class="required">*</span> 
                        </label>
                        <?php echo form_error('traitement_date_end', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($traitement)) echo $traitement->traitement_date_end; ?>" 
                           placeholder="jj/mm/aaaa" name="traitement_date_end" id="traitement_date_end" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="traitement_next_rendez_vous">
                         Date prochain rendez-vous<span class="required">*</span> 
                        </label>
                        <?php echo form_error('traitement_next_rendez_vous', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($traitement)) echo $traitement->traitement_next_rendez_vous; ?>" 
                           placeholder="jj/mm/aaaa" name="traitement_next_rendez_vous" 
                           id="traitement_next_rendez_vous" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Article</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="article_id" id="article_id">
                            <option value=""></option>
                            <?php foreach($articles as $p) {
                                    if(isset($article_id) && $p->article_id == $article_id)  {
                                        echo '<option selected="selected" value="'.$p->article_id.'">'.$p->article_libelle.'</option>';
                                    } else {
                                      echo '<option value="'.$p->article_id.'">'.$p->article_libelle.'</option>';
                                    }
                            } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="traitement_ordonnance">
                         Ordonnance 
                        </label>
                        <?php echo form_error('traitement_ordonnance', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea   
                           name="traitement_ordonnance" id="traitement_ordonnance" class="form-control col-md-7 col-xs-12"><?php set_value('traitement_ordonnance');
                           if(isset($traitement)) echo $traitement->traitement_ordonnance; ?></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="traitement_deliberation_final">
                         Déliberation finale <span class="required">*</span> 
                        </label>
                        <?php echo form_error('traitement_deliberation_final', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea   
                           name="traitement_deliberation_final" id="traitement_deliberation_final" class="form-control col-md-7 col-xs-12"><?php set_value('traitement_deliberation_final');
                           if(isset($traitement)) echo $traitement->traitement_deliberation_final; ?></textarea>
                        </div>
                      </div>

                      <?php if(isset($traitement)) { ?>
                          <input type="hidden" name="traitement_id" value="<?php echo $traitement->traitement_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_traitement').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Traitement</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <p class="text-muted font-13 m-b-30">
                           <form style="float: left;" method="post" action="<?php echo site_url('adherant/import-adherant'); ?>" id="form_import_excel" enctype="multipart/form-data">
                              
                            <span style="float: left;">Malades</span>
                              <div class="col-md-5 col-sm-5 col-xs-12">
                               <select class="form-control select2_single" style="width: 250px;" id="table_malade_id" name="table_malade_id" required="required">

                                   <option value="">Tous les malades</option>

                                   <?php foreach($malades as $p) {
                                        
                                      $adherant = $this->model_adherant->getById($p->adherant_id)[0];

                                      if($malade_id = (int) $this->uri->segment(3)) {
                                        
                                        if($malade_id == $p->malade_id) {
                                        echo '<option selected="selected" value="'.$p->malade_id.'">'.$adherant->adherant_nom.' '.$adherant->adherant_prenom.'</option>';
                                         } else {
                                            echo '<option value="'.$p->malade_id.'">'.$adherant->adherant_nom.' '.$adherant->adherant_prenom.'</option>';
                                         }

                                        } else {
                                          echo '<option value="'.$p->malade_id.'">'.$adherant->adherant_nom.' '.$adherant->adherant_prenom.'</option>';
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
                        <th>Malade</th>
                        <th>Traitement libellé</th>
                        <th>Point de prière</th>
                        <th>Date de début du traitemnt</th>
                        <th>Date de fin du traitemnt</th>
                        <th>Prochain rendez-vous</th>
                        <th>Article</th>
                        
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($traitements as $p) { ?>       
                      <tr>
                      <?php
                          $malade = $this->model_malade->getById($p->malade_id); 
                          $adherant = $this->model_adherant->getById($malade[0]->adherant_id);
                       ?>
                          <td>
                              <?php if($adherant[0]->adherant_photo) { ?>
                                  <a href="<?php echo site_url(); ?>adherant/show/<?php echo $adherant[0]->adherant_id; ?>">
                                  <img width="32" height="32" src="<?php echo base_url(); ?><?php echo $p->adherant_photo; ?>" class="avatar" alt="Avatar">
                                  </a>
                              <?php } else { ?>
                                  <a href="<?php echo site_url(); ?>adherant/show/<?php echo $adherant[0]->adherant_id; ?>">
                                  <img width="32" height="32" src="<?php echo base_url(); ?>assets/template/images/user.png" class="avatar" alt="Avatar">
                                  </a>
                              <?php } ?>
                             
                                  <input type="checkbox" class="check_item" value="<?php echo $p->traitement_id; ?>">
                              
                          </td>
                          <td>
                              <?php
                                
                                 if($malade) {
                                    $malade = $malade[0];
                                    $adherant = $this->model_adherant->getById($malade->adherant_id);
                                    if($adherant) { 
                                       echo truncate($adherant[0]->adherant_nom.' '.$adherant[0]->adherant_prenom, 50);
                                    }
                                 } else {
                                  echo '';
                                 } 
                             ?>
                          </td>
                          <td><?php echo truncate($p->traitement_libelle, 50); ?></td>
                          <td><?php echo truncate($p->traitement_point_priere, 20); ?></td>

                          <td>
                              <?php if($p->traitement_date_start)
                                        echo truncate(formatDateToPHP($p->traitement_date_start), 20);
                                    else
                                      echo '';
                               ?>
                                
                          </td>

                          <td>
                              <?php if($p->traitement_date_end)
                                        echo truncate(formatDateToPHP($p->traitement_date_end), 20);
                                    else
                                      echo '';
                               ?>
                                
                          </td>

                          <td>
                              <?php if($p->traitement_next_rendez_vous)
                                        echo truncate(formatDateToPHP($p->traitement_next_rendez_vous), 20);
                                    else
                                      echo '';
                               ?>
                                
                          </td>
                          
                          <td>
                              <?php
                                  $article = $this->model_article->getById($p->article_id);
                                  if($article) 
                                      echo truncate($article[0]->article_libelle, 20);
                                  else
                                    echo '';
                              ?>
                          </td>



                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>traitement/update/<?php echo $p->traitement_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->traitement_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
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


        