<div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
                <center><h3 style="color:red">POUTRE EN CONSOLE</h3></center>
              </div>
            </div> <br><br>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($poutre)) { ?>
                    <h2 style="color: #a77d46;"><b>RESISTANCE AU FEU DES STRUCTURES BOIS APPLICATION D'EUROCODE 5</b></h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo "Poutre"; ?></h2>
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

                    <?php if(!isset($poutre)) { ?>
                  <form id="poutre" method="post" action="<?php echo site_url('poutre/save'); ?>" data-parsley-validate 
                    class="form-horizontal form-label-left">
                    <?php } else { ?>
                    <form id="poutre" 
                        method="post" action="<?php echo site_url('poutre/update') . '/' . $poutre_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
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
                        <?php echo form_error('poutre', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('libelle');
                          if(isset($poutre)) echo $poutre->libelle; ?>" class="form-control" placeholder=" nom du projet" id="libelle" name="libelle" required="riquired">
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
                        <?php echo form_error('taux_emb_ar', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('taux_emb_ar');
                          if(isset($poutre)) echo $poutre->taux_emb_ar; ?>" class="form-control" placeholder="en pourcentage %" id="taux_emb_ar" name="taux_emb_ar" required="riquired">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Classe </label>
                        <?php echo form_error('classe_emb_ar', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('classe_emb_ar');
                          if(isset($poutre)) echo $poutre->classe_emb_ar; ?>" class="form-control" id="classe_emb_ar" name="classe_emb_ar" required="riquired" placeholder="Classe de service">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Durée </label>
                        <?php echo form_error('tr_emb_ar', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('tr_emb_ar');
                          if(isset($poutre)) echo $poutre->tr_emb_ar; ?>" class="form-control" id="tr_emb_ar" name="tr_emb_ar" required="riquired" placeholder="Durée de résistance (Tr) en min">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Révêtement</label>
                        <?php echo form_error('tpr_emb_ar', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('tpr_emb_ar');
                          if(isset($poutre)) echo $poutre->tpr_emb_ar; ?>" class="form-control" id="tpr_emb_ar" name="tpr_emb_ar" required="riquired" placeholder="Temps de protection (Tpr) en min">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Combinaison <b style="color: red;">qfi</b></label>
                        <?php echo form_error('qfi', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('qfi');
                          if(isset($poutre)) echo $poutre->qfi; ?>" class="form-control" id="qfi" name="qfi" required="riquired" placeholder="Combinaison accidentelle des charges  qfi en daN/ml">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Face au feu</label>
                        <?php echo form_error('face_emb_ar', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('face_emb_ar');
                          if(isset($poutre)) echo $poutre->face_emb_ar; ?>" class="form-control" id="face_emb_ar" name="face_emb_ar" required="riquired" placeholder="Face exposée au feu">
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:#20804b"><b>Poutre</b> </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Largeur <b style="color: red;">Bp</b></label>
                        <?php echo form_error('lar_p', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('lar_p');
                          if(isset($poutre)) echo $poutre->lar_p; ?>" class="form-control" id="lar_p" name="lar_p" required="riquired" placeholder="Largeur de panne en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Hauteur <b style="color: red;">Hp</b></label>
                        <?php echo form_error('haut_p', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('haut_p');
                          if(isset($poutre)) echo $poutre->haut_p; ?>" class="form-control" id="haut_p" name="haut_p" required="riquired" placeholder="Hauteur de la panne en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Portée <b style="color: red;">lo</b></label>
                        <?php echo form_error('port', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('port');
                          if(isset($poutre)) echo $poutre->port; ?>" class="form-control" id="port" name="port" required="riquired" placeholder="en m">
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
                <?php if(isset($poutre)) { ?>
                          <input type="hidden" name="poutre_id" value="<?php echo $poutre->poutre_id; ?>" />
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
                    <center><h3 style="color:red">POUTRE EN CONSOLE</h3></center>
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
                        <th> Hauteur </th>
                        <th> Porté </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($poutres as $p) { ?>       
                      <tr>
                          <td>
                             
                            <input type="checkbox" class="check_item" value="<?php echo $p->poutre_id; ?>">
                              
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
                          <td><?php echo truncate($p->haut_p, 20); ?></td>
                          <td><?php echo truncate($p->port, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>poutre/update/<?php echo $p->poutre_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-id="<?php echo $p->poutre_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i></a>
                            <a href="<?php echo site_url(); ?>resultat/poutre/<?php echo $p->poutre_id; ?>"  
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