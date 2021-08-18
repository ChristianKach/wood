<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Klef </h3>
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($klef)) { ?>
                        <h2>Ajouter un Klef</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $klef->klef_libelle; ?></h2>
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


                    <?php if(!isset($klef)) { ?>
                        <form id="form_klef" method="post" action="<?php echo site_url('klef/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_klef" 
                        method="post" action="<?php echo site_url('klef/update') . '/' . $klef_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                   

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="klef_libelle">
                         Libellé <span class="required">*</span> 
                        </label>
                        <?php echo form_error('klef_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($klef)) echo $klef->klef_libelle; ?>" 
                           placeholder="" name="klef_libelle" id="klef_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="klef_apui">
                         Appuis simple <span class="required">*</span> 
                        </label>
                        <?php echo form_error('klef_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($klef)) echo $klef->klef_apui; ?>" 
                           placeholder="" name="klef_apui" id="klef_apui" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="klef_port">
                         Port à Faux <span class="required">*</span> 
                        </label>
                        <?php echo form_error('klef_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($klef)) echo $klef->klef_port; ?>" 
                           placeholder="" name="klef_port" id="klef_port" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($klef)) { ?>
                          <input type="hidden" name="klef_id" value="<?php echo $klef->klef_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_klef').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Stabilite </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="table_data" aria-describedby="datatable_info" role="grid" class="table table-striped table-bordered dataTable no-footer">

                      <thead>
                        <tr>
                        <th>
                          
                              <input type="checkbox" id="check_all">
                          
                        </th>
                        <th> Libelle </th>
                        <th> Appuis Simple </th>
                        <th> Port à Faux </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($klefs as $p) { ?>       
                      <tr>
                          <td>
                             
                            <input type="checkbox" class="check_item" value="<?php echo $p->klef_id; ?>">
                              
                          </td>
                          
                          <td><?php echo truncate($p->klef_libelle, 20); ?></td>
                          <td><?php echo truncate($p->klef_apui, 20); ?></td>
                          <td><?php echo truncate($p->klef_port, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>klef/update/<?php echo $p->klef_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->klef_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
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


        