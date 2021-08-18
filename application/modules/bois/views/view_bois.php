<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Bois</h3>
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
                    <?php if(!isset($bois)) { ?>
                        <h2>Ajouter un bois</h2>
                    <?php } else { ?>
                        <h2>Mise à jour du bois : <?php echo $bois->bois_libelle ?></h2>
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


                    <?php if(!isset($bois)) { ?>
                        <form id="form_bois" method="post" action="<?php echo site_url('bois/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_bois" 
                        method="post" action="<?php echo site_url('bois/update') . '/' . $bois_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_libelle">
                        Libelle <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_libelle');
                          if(isset($bois)) echo $bois->bois_libelle; ?>" placeholder="Libelle" id="bois_libelle" name="bois_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categorie_id">
                        Categorie de Bois <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="categorie_id" name="categorie_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($categories as $p) {
                                    echo '<option value="'.$p->categorie_id.'">'.$p->categorie_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_bois_id">
                        Type de Bois <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="type_bois_id" name="type_bois_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($type_bois as $p) {
                                    echo '<option value="'.$p->type_bois_id.'">'.$p->type_bois_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stabilite_id">
                        Stabilité <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="stabilite_id" name="stabilite_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($stabilites as $p) {
                                    echo '<option value="'.$p->stabilite_id.'">'.$p->stabilite_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_flexion_longitudinale">
                        Flexion Longitudinale <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_flexion_longitudinale', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_flexion_longitudinale');
                          if(isset($bois)) echo $bois->bois_flexion_longitudinale; ?>" placeholder="13.4 ; 15.23" id="bois_flexion_longitudinale" name="bois_flexion_longitudinale" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_traction_axiale">
                        Traction axiale <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_traction_axiale', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_traction_axiale');
                          if(isset($bois)) echo $bois->bois_traction_axiale; ?>" placeholder="" id="bois_traction_axiale" name="bois_traction_axiale" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_traction_transversale">
                        Traction transversale <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_traction_transversale', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_traction_transversale');
                          if(isset($bois)) echo $bois->bois_traction_transversale; ?>" placeholder="" id="bois_traction_transversale" name="bois_traction_transversale" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_compression_axiale">
                        Compression axiale <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_compression_axiale', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_compression_axiale');
                          if(isset($bois)) echo $bois->bois_compression_axiale; ?>" placeholder="" id="bois_compression_axiale" name="bois_compression_axiale" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_compression_transversale">
                        Compression transversale <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_compression_transversale', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_compression_transversale');
                          if(isset($bois)) echo $bois->bois_compression_transversale; ?>" placeholder="" id="bois_compression_transversale" name="bois_compression_transversale" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_cisaillement">
                        Cisaillement <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_cisaillement', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_cisaillement');
                          if(isset($bois)) echo $bois->bois_cisaillement; ?>" placeholder="" id="bois_cisaillement" name="bois_cisaillement" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_module_elasticite_longitididal">
                        Module d'elasticité longitidunal <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_module_elasticite_longitididal', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_module_elasticite_longitididal');
                          if(isset($bois)) echo $bois->bois_module_elasticite_longitididal; ?>" placeholder="" id="bois_module_elasticite_longitididal" name="bois_module_elasticite_longitididal" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_module_elasticite_axial">
                        Module d'elasticité axial <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_module_elasticite_axial', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_module_elasticite_axial');
                          if(isset($bois)) echo $bois->bois_module_elasticite_axial; ?>" placeholder="" id="bois_module_elasticite_axial" name="bois_module_elasticite_axial" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_m_moyen_e_transversal">
                        Module moyen d'elasticité transversal <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_m_moyen_e_transversal', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_m_moyen_e_transversal');
                          if(isset($bois)) echo $bois->bois_m_moyen_e_transversal; ?>" placeholder="" id="bois_m_moyen_e_transversal" name="bois_m_moyen_e_transversal" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_m_moyen_cisaillement">
                        Module moyen de cisaillement <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_m_moyen_cisaillement', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_m_moyen_cisaillement');
                          if(isset($bois)) echo $bois->bois_m_moyen_cisaillement; ?>" placeholder="" id="bois_m_moyen_cisaillement" name="bois_m_moyen_cisaillement" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-10">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_masse_volumique">
                        Masse volumique/densité <span class="required">*</span> 
                        </label>
                        <?php echo form_error('bois_masse_volumique', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('bois_masse_volumique');
                          if(isset($bois)) echo $bois->bois_masse_volumique; ?>" placeholder="" id="bois_masse_volumique" name="bois_masse_volumique" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($bois)) { ?>
                          <input type="hidden" name="bois_id" value="<?php echo $bois->bois_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_bois').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Bois</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="table_data" aria-describedby="datatable_info" role="grid" class="table table-striped table-bordered dataTable no-footer">

                      <thead style="border: 0; background: #a77d46; color:#ffffff;">
                        <tr>
                        <th>Libellé</th>
                        <th>Catégorie de bois</th>
                        <th>Type bois</th>
                        <th>Stabilité</th>
                        <th>Flexion longitudinale</th>
                        <th>Traction axiale</th>                        
                        <th>Traction transversale</th>
                        <th>Compression axiale</th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($boiss as $p) { ?>       
                      <tr>
                          
                          <td><?php echo truncate($p->bois_libelle, 20); ?></td>
                          <td>
                              <?php
                                 $categorie = $this->model_categorie->getById($p->categorie_id);
                                 if($categorie) { 
                                     echo truncate($categories[0]->categorie_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td>
                              <?php
                                 $type_bois = $this->model_type_bois->getById($p->type_bois_id);
                                 if($type_bois) { 
                                     echo truncate($type_bois[0]->type_bois_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td>
                              <?php
                                 $stabilite = $this->model_stabilite->getById($p->stabilite_id);
                                 if($stabilite) { 
                                     echo truncate($stabilite[0]->stabilite_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td><?php echo truncate($p->bois_flexion_longitudinale, 20); ?></td>
                          <td><?php echo truncate($p->bois_traction_axiale, 20); ?></td>
                          <td><?php echo truncate($p->bois_traction_transversale, 20); ?></td>
                          <td><?php echo truncate($p->bois_compression_axiale, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>bois/update/<?php echo $p->bois_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-id="<?php echo $p->bois_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i></a>
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


        <!-- page content -->
       
        
        <!-- /page content -->


