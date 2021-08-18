<div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
                <center><h3 style="color:red">COLONNE EN FLEXION COMPOSE</h3></center>
              </div>
            </div> <br><br>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($flexion_compose)) { ?>
                    <h2 style="color: #a77d46;"><b>RESISTANCE AU FEU DES STRUCTURES BOIS APPLICATION D'EUROCODE 5</b></h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo "Colone en Flexion composé"; ?></h2>
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

                    <?php if(!isset($flexion_compose)) { ?>
                  <form id="flexion_compose" method="post" action="<?php echo site_url('flexion_compose/save'); ?>" data-parsley-validate 
                    class="form-horizontal form-label-left">
                    <?php } else { ?>
                    <form id="flexion_compose" 
                        method="post" action="<?php echo site_url('flexion_compose/update') . '/' . $flexion_compose_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
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
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('libelle');
                          if(isset($flexion_compose)) echo $flexion_compose->libelle; ?>" class="form-control" placeholder=" nom du projet" id="libelle" name="libelle" required="riquired">
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
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('taux_emb_ar');
                          if(isset($flexion_compose)) echo $flexion_compose->taux_emb_ar; ?>" class="form-control" placeholder="en pourcentage %" id="taux_emb_ar" name="taux_emb_ar" required="riquired">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Durée </label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('tr_emb_ar');
                          if(isset($flexion_compose)) echo $flexion_compose->tr_emb_ar; ?>" class="form-control" id="tr_emb_ar" name="tr_emb_ar" required="riquired" placeholder="Durée de résistance (Tr) en min">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Révêtement</label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('tpr_emb_ar');
                          if(isset($flexion_compose)) echo $flexion_compose->tpr_emb_ar; ?>" class="form-control" id="tpr_emb_ar" name="tpr_emb_ar" required="riquired" placeholder="Temps de protection (Tpr) en min">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Charge <b style="color: red;">G</b></label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('cpg');
                          if(isset($flexion_compose)) echo $flexion_compose->cpg; ?>" class="form-control" id="cpg" name="cpg" required="riquired" placeholder="Charge permennante g en daN">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Charge <b style="color: red;">Q</b></label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('cvq');
                          if(isset($flexion_compose)) echo $flexion_compose->cvq; ?>" class="form-control" id="cvq" name="cvq" required="riquired" placeholder="Charge variable q en daN">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Charge  <b style="color: red;">qi1</b></label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('cvq1');
                          if(isset($flexion_compose)) echo $flexion_compose->cvq1; ?>" class="form-control" id="cvq1" name="cvq1" required="riquired" placeholder="Charge variable  q1(vent,et divers) en daN">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Charge  <b style="color: red;">qi2</b></label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('cvq2');
                          if(isset($flexion_compose)) echo $flexion_compose->cvq2; ?>" class="form-control" id="cvq2" name="cvq2" required="riquired" placeholder="Charge variable au neige qi2 en daN">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Face au feu</label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('face_emb_ar');
                          if(isset($flexion_compose)) echo $flexion_compose->face_emb_ar; ?>" class="form-control" id="face_emb_ar" name="face_emb_ar" required="riquired" placeholder="Face exposée au feu">
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:#20804b"><b>Colonne</b> </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Largeur <b style="color: red;">ap</b></label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('lar_p');
                          if(isset($flexion_compose)) echo $flexion_compose->lar_p; ?>" class="form-control" id="lar_p" name="lar_p" required="riquired" placeholder="Largeur du poteau en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Longueur <b style="color: red;">bp</b></label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('long_p');
                          if(isset($flexion_compose)) echo $flexion_compose->long_p; ?>" class="form-control" id="long_p" name="long_p" required="riquired" placeholder="Longueur du poteau en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Longueur <b style="color: red;">c</b></label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('long_c');
                          if(isset($flexion_compose)) echo $flexion_compose->long_c; ?>" class="form-control" id="long_c" name="long_c" required="riquired" placeholder="Longueur du consol en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Hauteur <b style="color: red;">Ho</b></label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('haut_p');
                          if(isset($flexion_compose)) echo $flexion_compose->haut_p; ?>" class="form-control" id="haut_p" name="haut_p" required="riquired" placeholder="Hauteur du poteau en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Flambement <b style="color: red;">m</b></label>
                        <?php echo form_error('flexion_compose', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('m');
                          if(isset($flexion_compose)) echo $flexion_compose->m; ?>" class="form-control" id="m" name="m" required="riquired" placeholder="Coefficient de flambement ">
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>

                 <div class="col-md-6 col-xs-12">
                 </div>
                </div>
                <?php if(isset($flexion_compose)) { ?>
                    <input type="hidden" name="flexion_compose_id" value="<?php echo $flexion_compose->flexion_compose_id; ?>" />
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
                    <center><h3 style="color:red">COLONNE EN FLEXION COMPOSE</h3></center>
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
                        <th> Projet </th>
                        <th> bois </th>
                        <th> type </th>
                        <th> Largeur Poteau </th>
                        <th> Longueur Poteau </th>
                        <th> Longueur Consol </th>
                        <th> Hauteur Poteau </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($flexion_composes as $p) { ?>       
                      <tr>
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
                          <td><?php echo truncate($p->long_c, 20); ?></td>
                          <td><?php echo truncate($p->haut_p, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>flexion_compose/update/<?php echo $p->flexion_compose_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-id="<?php echo $p->flexion_compose_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i></a>
                            <a href="<?php echo site_url(); ?>resultat/flexion_compose/<?php echo $p->flexion_compose_id; ?>"  
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