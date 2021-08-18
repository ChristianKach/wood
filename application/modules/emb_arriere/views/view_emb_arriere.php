<div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
                <center><h3 style="color:red">EMBREVEMENT ARRIERE</h3></center>

              </div>
            </div> <br><br>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if(!isset($emb_arriere)) { ?>
                    <h2 style="color: #a77d46;"><b>RESISTANCE AU FEU DES STRUCTURES BOIS APPLICATION D'EUROCODE 5</b></h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo "Embrèvement Arrière"; ?></h2>
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

                    <?php if(!isset($emb_arriere)) { ?>
                  <form id="emb_arriere" method="post" action="<?php echo site_url('emb_arriere/save'); ?>" data-parsley-validate 
                    class="form-horizontal form-label-left">
                    <?php } else { ?>
                    <form id="emb_arriere" 
                        method="post" action="<?php echo site_url('emb_arriere/update') . '/' . $emb_arriere_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
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
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('libelle');
                          if(isset($emb_arriere)) echo $emb_arriere->libelle; ?>" class="form-control" placeholder=" nom du projet" id="libelle" name="libelle" required="riquired">
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
                      <div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;" for="angle_emb_ar">Angle α</label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" class="form-control" value="<?php echo set_value('angle_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->angle_emb_ar; ?>" placeholder="angle α" id="angle_emb_ar" name="angle_emb_ar" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Taux humidité</label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('taux_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->taux_emb_ar; ?>" class="form-control" placeholder="en pourcentage %" id="taux_emb_ar" name="taux_emb_ar" required="riquired">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Classe </label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('classe_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->classe_emb_ar; ?>" class="form-control" id="classe_emb_ar" name="classe_emb_ar" required="riquired" placeholder="Classe de service">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Durée </label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('tr_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->tr_emb_ar; ?>" class="form-control" id="tr_emb_ar" name="tr_emb_ar" required="riquired" placeholder="Durée de résistance (Tr) en min">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Révêtement</label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('tpr_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->tpr_emb_ar; ?>" class="form-control" id="tpr_emb_ar" name="tpr_emb_ar" required="riquired" placeholder="Temps de protection (Tpr) en min">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Face au feu</label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="<?php echo set_value('face_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->face_emb_ar; ?>" class="form-control" id="face_emb_ar" name="face_emb_ar" required="riquired" placeholder="Face exposée au feu">
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:#20804b"><b>Entrait</b> </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Largeur <b style="color: red;">Lent</b></label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('lent_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->lent_emb_ar; ?>" class="form-control" id="lent_emb_ar" name="lent_emb_ar" required="riquired" placeholder="Largeur de l'entarit en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Hauteur <b style="color: red;">Hent</b></label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('haut_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->haut_emb_ar; ?>" class="form-control" id="haut_emb_ar" name="haut_emb_ar" required="riquired" placeholder="Hauteur de l'entrait en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Hauteur <b style="color: red;">Htal</b></label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('htal_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->htal_emb_ar; ?>" class="form-control" id="htal_emb_ar" name="htal_emb_ar" required="riquired" placeholder="Hauteur du talon/Profondeur en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Longueur <b style="color: red;">Ltal</b></label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('ltal_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->ltal_emb_ar; ?>" class="form-control" id="ltal_emb_ar" name="ltal_emb_ar" required="riquired" placeholder="Longueur du talon en mm">
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>

                 <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:#20804b"><b>Arbaletrier</b> </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Largeur <b style="color: red;">Barb</b></label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('barb_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->barb_emb_ar; ?>" class="form-control" id="barb_emb_ar" name="barb_emb_ar" required="riquired" placeholder="Largeur de l'entarit en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Hauteur <b style="color: red;">Harb</b></label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('harb_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->harb_emb_ar; ?>" class="form-control" id="harb_emb_ar" name="harb_emb_ar" required="riquired" placeholder="Hauteur de l'entrait en mm">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Longueur <b style="color: red;">Lf</b></label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('lf_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->lf_emb_ar; ?>" class="form-control" id="lf_emb_ar" name="lf_emb_ar" required="riquired" placeholder="Longueur de flambement en mm">
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
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('fd_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->fd_emb_ar; ?>" class="form-control" id="fd_emb_ar" name="fd_emb_ar" required="riquired" placeholder="Effort Normal dans l'arbaletrier (en N)">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color: #a77d46;">Effort <b style="color: red;">Ft</b></label>
                        <?php echo form_error('emb_arriere', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" value="<?php echo set_value('ft_emb_ar');
                          if(isset($emb_arriere)) echo $emb_arriere->ft_emb_ar; ?>" class="form-control" id="ft_emb_ar" name="ft_emb_ar" required="riquired" placeholder="Effort Normal dans l'entrait (en N)">
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
                <?php if(isset($emb_arriere)) { ?>
                    <input type="hidden" name="emb_arriere_id" value="<?php echo $emb_arriere->emb_arriere_id; ?>" />
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
                    <center><h3 style="color:red">EMBREVEMENT ARRIERE</h3></center>
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
                        <th> Angle </th>
                        <th> Effort Fd </th>
                        <th> Effort Ft </th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($emb_arrieres as $p) { ?>       
                      <tr>
                          <td>
                             
                            <input type="checkbox" class="check_item" value="<?php echo $p->emb_arriere_id; ?>">
                              
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
                          <td><?php echo truncate($p->angle_emb_ar, 20).' °'; ?></td>
                          <td><?php echo truncate($p->fd_emb_ar, 20); ?></td>
                          <td><?php echo truncate($p->ft_emb_ar, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>emb_arriere/update/<?php echo $p->emb_arriere_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-id="<?php echo $p->emb_arriere_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i></a>
                            <a href="<?php echo site_url(); ?>resultat/emb_arriere/<?php echo $p->emb_arriere_id; ?>"  
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