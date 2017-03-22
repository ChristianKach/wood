<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Programmes</h3>
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
                    <?php if(!isset($programme)) { ?>
                        <h2>Ajouter un nouveau programme</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $programme->programme_libelle; ?>
                          <?php if(isset($programme_adherants))
                              echo '('.count($programme_adherants).' Adhérants)'; ?>
                        </h2>
                    <?php } ?>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link">
                          <i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
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


                    <?php if(!isset($programme)) { ?>
                        <form id="form_programme" method="post" action="<?php echo site_url('programme/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_programme" 
                        method="post" action="<?php echo site_url('programme/update') . '/' . $programme_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programme_libelle">
                        Libelle du programme <span class="required">*</span>
                        </label>
                        <?php echo form_error('programme_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" 
                          value="<?php echo set_value('programme_libelle');
                           if(isset($programme)) echo $programme->programme_libelle; ?>" 
                           placeholder="Libellé" name="programme_libelle" id="programme_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="programme_theme">
                        Thème du programme <span class="required">*</span>
                        </label>
                        <?php echo form_error('programme_theme', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?php echo set_value('programme_theme');
                          if(isset($programme)) echo $programme->programme_theme; ?>" placeholder="Thème" id="programme_theme" name="programme_theme" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="programme_date_start" class="control-label col-md-3 col-sm-3 col-xs-12">Date de début <span class="required">*</span>
                        </label>
                        <?php echo form_error('programme_date_start', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="programme_date_start" value="<?php echo set_value('programme_date_start'); if(isset($programme)) echo $programme->programme_date_start; ?>" placeholder="jj/mm/aaaa" name="programme_date_start" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="programme_date_end" class="control-label col-md-3 col-sm-3 col-xs-12">Date de fin <span class="required">*</span>
                        </label>
                        <?php echo form_error('programme_date_end', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo set_value('programme_date_end');
                            if(isset($programme)) echo $programme->programme_date_end;  ?>" id="programme_date_end" placeholder="jj/mm/aaaa" name="programme_date_end" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="programme_lieu" class="control-label col-md-3 col-sm-3 col-xs-12">Lieu <span class="required">*</span> </label>
                         <?php echo form_error('programme_lieu', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo set_value('programme_lieu');
                           if(isset($programme)) echo $programme->programme_lieu; ?>" id="programme_lieu" required="required" placeholder="Lieu" class="form-control col-md-7 col-xs-12" type="text" name="programme_lieu">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="programme_montant_participation" class="control-label col-md-3 col-sm-3 col-xs-12">Montant de la participation <span class="required">*</span> </label>
                         <?php echo form_error('programme_montant_participation', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo set_value('programme_montant_participation');
                           if(isset($programme)) echo $programme->programme_montant_participation; ?>" placeholder="Montant participation" required="required" id="programme_montant_participation" class="form-control col-md-7 col-xs-12" type="text" name="programme_montant_participation" />
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Adherants</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select multiple class="form-control" name="adherant_ids[]" id="adherant_id">
                            <option></option>
                            <?php foreach($adherants as $p) {
                                    if(isset($programme_adherants)) {
                                        $ids = [];
                                        foreach($programme_adherants as $i) {
                                            $ids[] = $i->adherant_id;
                                        }
                                        
                                        if(in_array($p->adherant_id, $ids)) {
                                          echo '<option selected="selected" value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                        } else {
                                          echo '<option value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                        }

                                        /*foreach ($programme_adherants as $pa) {
                                            if($p->adherant_id == $pa->adherant_id) {
                                              echo '<option selected="selected" value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                            } else {
                                              echo '<option value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                            }
                                        }*/

                                    } else {
                                        if(isset($adherant_id) && $p->adherant_id == $adherant_id)  {
                                            echo '<option selected="selected" value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                        } else {
                                          echo '<option value="'.$p->adherant_id.'">'.$p->adherant_nom.' '.$p->adherant_prenom.'</option>';
                                        }
                                    }

                                  }
                            ?>
                          </select>
                        </div>
                      </div>


                      <?php if(isset($programme)) { ?>
                          <input type="hidden" name="programme_id" value="<?php echo $programme->programme_id; ?>" />
                      <?php } ?>
                    

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_programme').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Liste des programmes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="table_programmes" aria-describedby="datatable_info" role="grid" class="table table-striped table-bordered dataTable no-footer">
                      <thead>
                        <tr>
                        <th>Libellé</th>
                        <th>Thème</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Lieu</th>
                        <th>Montant</th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($programmes as $p) { ?>       
                      <tr>
                          <td><?php echo truncate($p->programme_libelle, 20); ?></td>
                          <td><?php echo truncate($p->programme_theme, 20); ?></td>
                          <td><?php echo formatDateToPHP($p->programme_date_start, 20); ?></td>
                          <td><?php echo formatDateToPHP($p->programme_date_end, 20); ?></td>
                          <td><?php echo truncate($p->programme_lieu, 20); ?></td>
                          <td><?php echo formatMoneyFCFA($p->programme_montant_participation, 20); ?></td>
                          <td>
                            <a href="<?php echo site_url(); ?>programme/update/<?php echo $p->programme_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>

                            <a href="#" data-id="<?php echo $p->programme_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
                          </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                    </table>

                    </div>
                    </div>
                   </div>
                  </div>
                </div>



              </div>

          </div>
        </div>

        <br></br>
        <!-- /page content -->


        