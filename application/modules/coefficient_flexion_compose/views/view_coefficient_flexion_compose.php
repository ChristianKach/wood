<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Coefficient </h3>
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($coefficient_flexion_compose)) { ?>
                        <h2>Ajouter un coefficient_flexion_compose</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php //echo $coefficient->kdef; ?></h2>
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


                    <?php if(!isset($coefficient_flexion_compose)) { ?>
                        <form id="form_coefficient" method="post" action="<?php echo site_url('coefficient_flexion_compose/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_coefficient" 
                        method="post" action="<?php echo site_url('coefficient_flexion_compose/update') . '/' . $coefficient_flexion_compose_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kdef">
                         Kdef <span class="required">*</span> 
                        </label>
                        <?php echo form_error('coefficient_flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php if(isset($coefficient_flexion_compose)) echo $coefficient_flexion_compose->kdef; ?>" 
                           placeholder="Propagation de Fliuage kdef" name="kdef" id="kdef" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cm">
                         Cm <span class="required">*</span> 
                        </label>
                        <?php echo form_error('coefficient_flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php if(isset($coefficient_flexion_compose)) echo $coefficient_flexion_compose->cm; ?>" 
                           placeholder="Propagation de Fliuage cm" name="cm" id="cm" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="c0">
                         ψ0 <span class="required">*</span> 
                        </label>
                        <?php echo form_error('c0', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php if(isset($coefficient_flexion_compose)) echo $coefficient_flexion_compose->c0; ?>" 
                           placeholder="" name="c0" id="c0" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="c1">
                         ψ1 <span class="required">*</span> 
                        </label>
                        <?php echo form_error('c1', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php if(isset($coefficient_flexion_compose)) echo $coefficient_flexion_compose->c1; ?>" 
                           placeholder="" name="c1" id="ψ1" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="c2">
                         ψ2 <span class="required">*</span> 
                        </label>
                        <?php echo form_error('c2', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php if(isset($coefficient_flexion_compose)) echo $coefficient_flexion_compose->c2; ?>" 
                           placeholder="" name="c2" id="c2" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($coefficient_flexion_compose)) { ?>
                          <input type="hidden" name="coefficient_flexion_compose_id" value="<?php echo $coefficient_flexion_compose->coefficient_flexion_compose_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_coefficient').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Coefficient </h2>
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
                        <th> Kdef </th>
                        <th> cm </th>
                        <th> ψ0 </th>
                        <th> ψ1 </th>
                        <th> ψ2 </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($coefficient_flexion_composes as $p) { ?>       
                      <tr>
                          <td>
                             
                            <input type="checkbox" class="check_item" value="<?php echo $p->coefficient_flexion_compose_id; ?>">
                              
                          </td>
                          
                          <td><?php echo truncate($p->kdef, 20); ?></td>
                          <td><?php echo truncate($p->cm, 20); ?></td>
                          <td><?php echo truncate($p->c0, 20); ?></td>
                          <td><?php echo truncate($p->c1, 20); ?></td>
                          <td><?php echo truncate($p->c2, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>coefficient_flexion_compose/update/<?php echo $p->coefficient_flexion_compose_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->coefficient_flexion_compose_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
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


        