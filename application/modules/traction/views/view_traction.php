<div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
                <center><h3 style="color:red">TRACTION AXIAL</h3></center>
              </div>
            </div> <br><br>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($traction)) { ?>
                    <h2 style="color: #a77d46;"><b>RESISTANCE AU FEU DES STRUCTURES BOIS APPLICATION D'EUROCODE 5</b></h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo "Traction Axial"; ?></h2>
                    <?php } ?>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link">
                          <i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
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

                    <?php if(!isset($traction)) { ?>
                  <form id="traction" method="post" action="<?php echo site_url('traction/save'); ?>" data-parsley-validate 
                    class="form-horizontal form-label-left">
                    <?php } else { ?>
                    <form id="traction" 
                        method="post" action="<?php echo site_url('traction/update') . '/' . $traction_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>
                  <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2 style="color:#20804b;"><b>Généralité</b></h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Projet</label>
                        <?php echo form_error('traction', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('libelle');
                          if(isset($traction)) echo $traction->libelle; ?>" class="form-control" placeholder=" nom du projet" id="libelle" name="libelle" required="riquired">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bois_id"style="color: #a77d46;">
                         Bois <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select id="bois_id" name="bois_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($bois as $p) {
                                    echo '<option value="'.$p->bois_id.'">'.$p->bois_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categorie_id"style="color: #a77d46;">
                        Type Bois <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select id="categorie_id" name="categorie_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($categorie as $p) {
                                    echo '<option value="'.$p->categorie_id.'">'.$p->categorie_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Taux humidité</label>
                        <?php echo form_error('traction', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('taux_emb_ar');
                          if(isset($traction)) echo $traction->taux_emb_ar; ?>" class="form-control" placeholder="en pourcentage %" id="taux_emb_ar" name="taux_emb_ar" required="riquired">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Durée </label>
                        <?php echo form_error('traction', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('tr_emb_ar');
                          if(isset($traction)) echo $traction->tr_emb_ar; ?>" class="form-control" id="tr_emb_ar" name="tr_emb_ar" required="riquired" placeholder="Durée de résistance (Tr) en min">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Révêtement</label>
                        <?php echo form_error('traction', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('tpr_emb_ar');
                          if(isset($traction)) echo $traction->tpr_emb_ar; ?>" class="form-control" id="tpr_emb_ar" name="tpr_emb_ar" required="riquired" placeholder="Temps de protection (Tpr) en min">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Face au feu</label>
                        <?php echo form_error('traction', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('face_emb_ar');
                          if(isset($traction)) echo $traction->face_emb_ar; ?>" class="form-control" id="face_emb_ar" name="face_emb_ar" required="riquired" placeholder="Face exposée au feu">
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:#20804b"><b>Panne</b> </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Largeur <b style="color: red;">ap</b></label>
                        <?php echo form_error('traction', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('lar_p');
                          if(isset($traction)) echo $traction->lar_p; ?>" class="form-control" id="lar_p" name="lar_p" required="riquired" placeholder="Largeur du poteau en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Longueur <b style="color: red;">bp</b></label>
                        <?php echo form_error('traction', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('long_p');
                          if(isset($traction)) echo $traction->long_p; ?>" class="form-control" id="long_p" name="long_p" required="riquired" placeholder="Longueur du poteau en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Hauteur <b style="color: red;">Ho</b></label>
                        <?php echo form_error('traction', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('haut_p');
                          if(isset($traction)) echo $traction->haut_p; ?>" class="form-control" id="haut_p" name="haut_p" required="riquired" placeholder="Hauteur du poteau en mm">
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>

                <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:#20804b"><b>Combinaison d'action</b> </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Effort <b style="color: red;">Fd</b></label>
                        <?php echo form_error('traction', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('fd_emb_ar');
                          if(isset($traction)) echo $traction->fd_emb_ar; ?>" class="form-control" id="fd_emb_ar" name="fd_emb_ar" required="riquired" placeholder="Effort Normal dans l'arbaletrier (en N)">
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>

                <?php if(isset($traction)) { ?>
                    <input type="hidden" name="traction_id" value="<?php echo $traction->traction_id; ?>" />
                <?php } ?>
                <div class="ln_solid"></div>
                <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <center><button type="submit" class="btn btn-success" style="border: 0; background: #eea236;">Valider</button></center>
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
                    <center><h3 style="color:red">TRACTION AXIAL</h3></center>
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
                        <th> Projet </th>
                        <th> bois </th>
                        <th> type </th>
                        <th> Largeur </th>
                        <th> Longueur </th>
                        <th> Hauteur </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($tractions as $p) { ?>       
                      <tr>
                          <td>
                             
                            <input type="checkbox" class="check_item" value="<?php echo $p->traction_id; ?>">
                              
                          </td>
                          <td><?php echo truncate($p->libelle, 20); ?></td>
                          <td>
                              <?php
                                 $bois = $this->model_bois->getById($p->bois_id);
                                 if($bois) { 
                                     echo truncate($bois[0]->bois_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td>
                              <?php
                                 $categories = $this->model_categorie->getById($p->categorie_id);
                                 if($categories) { 
                                     echo truncate($categories[0]->categorie_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                          <td><?php echo truncate($p->lar_p, 20); ?></td>
                          <td><?php echo truncate($p->long_p, 20); ?></td>
                          <td><?php echo truncate($p->haut_p, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>traction/update/<?php echo $p->traction_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-id="<?php echo $p->traction_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i></a>
                            <a href="<?php echo site_url(); ?>resultat/traction/<?php echo $p->traction_id; ?>"  
                            class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
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