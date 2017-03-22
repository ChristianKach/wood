<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Salle</h3>
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
                    <?php if(!isset($salle)) { ?>
                        <h2>Ajouter une salle</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $salle->salle_libelle; ?></h2>
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

                        
                        <?php if($this->session->flashdata('error')){?>
                          <div class="alert alert-danger" role="alert" id="error">
                        <?php echo $this->session->flashdata('error'); ?>
                       </div>
                        <?php }?>
                    </div>


                    <?php if(!isset($salle)) { ?>
                        <form id="form_salle" method="post" action="<?php echo site_url('salle/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_salle" 
                        method="post" action="<?php echo site_url('salle/update') . '/' . $adherant_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batiment_id">
                            Batiment <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="batiment_id" name="batiment_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($batiments as $p) {
                                    if(isset($batiment_id) && $p->batiment_id == $batiment_id)
                                        echo '<option selected="selected" value="'.$p->batiment_id.'">'.$p->batiment_libelle.'</option>';
                                    else
                                      echo '<option value="'.$p->batiment_id.'">'.$p->batiment_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salle_libelle">
                         salle libellé <span class="required">*</span> 
                        </label>
                        <?php echo form_error('salle_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($salle)) echo $salle->salle_libelle; ?>" 
                           placeholder="Libellé" name="salle_libelle" id="salle_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salle_max_personne">
                         Nombre de personne maximum <span class="required">*</span> 
                        </label>
                        <?php echo form_error('salle_max_personne', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="number" 
                          value="<?php
                           if(isset($salle)) echo $salle->salle_max_personne; ?>" 
                           placeholder="Nombre de personne" name="salle_max_personne" id="salle_max_personne" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($salle)) { ?>
                          <input type="hidden" name="salle_id" value="<?php echo $salle->salle_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_salle').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Salle</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <p class="text-muted font-13 m-b-30">
                           <form style="float: left;" method="post" action="<?php echo site_url('adherant/import-adherant'); ?>" id="form_import_excel" enctype="multipart/form-data">
                              
                            <span style="float: left;">Batiments</span>
                              <div class="col-md-5 col-sm-5 col-xs-12">
                               <select class="form-control" style="width: 250px;" id="table_batiment_id" name="table_batiment_id" required="required">

                                   <option value="">Tous les batiments</option>

                                   <?php foreach($batiments as $p) {

                                      if($batiment_id = (int) $this->uri->segment(3)) {
                                        if($batiment_id == $p->batiment_id) {
                                        echo '<option selected="selected" value="'.$p->batiment_id.'">'.$p->batiment_libelle.'</option>';
                                         } else {
                                            echo '<option value="'.$p->batiment_id.'">'.$p->batiment_libelle.'</option>';
                                         }

                                        } else {
                                          echo '<option value="'.$p->batiment_id.'">'.$p->batiment_libelle.'</option>';
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
                        <th>Batiment</th>
                        <th>Salle libellé</th>
                        <th>Nombre de personne maximum</th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($salles as $p) { ?>       
                      <tr>
                          <td>
                              <input type="checkbox" class="check_item" value="<?php echo $p->salle_id; ?>">
                          </td>
                          <td>
                              <?php
                                 $batiment = $this->model_batiment->getById($p->batiment_id);
                                 if($batiment) { 
                                     echo truncate($batiment[0]->batiment_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td><?php echo truncate($p->salle_libelle, 20); ?></td>
                          <td><?php echo truncate($p->salle_max_personne, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>salle/update/<?php echo $p->salle_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->salle_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
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


        