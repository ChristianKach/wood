<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Article</h3>
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
                    <?php if(!isset($article)) { ?>
                        <h2>Ajouter un nouvelle article</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $article->article_libelle . ' ' . $article->article_libelle; ?></h2>
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


                    <?php if(!isset($article)) { ?>
                        <form id="form_article" method="post" action="<?php echo site_url('article/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_article" 
                        method="post" action="<?php echo site_url('article/update') . '/' . $article_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="article_type_id">
                        Type article <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select id="article_type_id" name="article_type_id" required="required" class="form-control col-md-7 col-xs-12">
                              <?php foreach($article_types as $p) {
                                    if(isset($article_type_id) && $p->article_type_id == $article_type_id)
                                        echo '<option selected="selected" value="'.$p->article_type_id.'">'.$p->article_type_libelle.'</option>';
                                    else
                                      echo '<option value="'.$p->article_type_id.'">'.$p->article_type_libelle.'</option>';
                                } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="article_libelle">
                         Libellé <span class="required">*</span> 
                        </label>
                        <?php echo form_error('article_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($article)) echo $article->article_libelle; ?>" 
                           placeholder="Libellé" name="article_libelle" id="article_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="article_unit_price">
                         Prix unitaire <span class="required">*</span> 
                        </label>
                        <?php echo form_error('article_unit_price', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" value="<?php echo set_value('article_unit_price');
                          if(isset($article)) echo $article->article_unit_price; ?>" placeholder="Prix unitaire" id="article_unit_price" name="article_unit_price" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="article_quantity">
                        Quantité <span class="required">*</span> 
                        </label>
                        <?php echo form_error('article_quantity', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="number" value="<?php echo set_value('article_quantity');
                          if(isset($article)) echo $article->article_quantity; ?>" placeholder="Quantité" id="article_quantity" name="article_quantity" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="article_date_reception" class="control-label col-md-3 col-sm-3 col-xs-12">
                         Date de reception <span class="required">*</span> 
                        </label>
                        <?php echo form_error('article_date_reception', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input id="article_date_reception" value="<?php echo set_value('article_date_reception'); if(isset($article)) echo $article->article_date_reception; ?>" placeholder="jj/mm/aaaa" name="article_date_reception" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>


                      <?php if(isset($article)) { ?>
                          <input type="hidden" name="article_id" value="<?php echo $article->article_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_article').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Articles</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <p class="text-muted font-13 m-b-30">
                              <form style="float: left;" method="post" action="<?php echo site_url('adherant/import-adherant'); ?>" id="form_import_excel" enctype="multipart/form-data">

                            <span style="float: left;">Type articles</span>
                              <div class="col-md-5 col-sm-5 col-xs-12">
                               <select class="form-control" style="width: 250px;" id="table_articletype_id" 
                               name="table_articletype_id" required="required">

                                   <option value="">Tous les types articles</option>

                                   <?php foreach($article_types as $p) {

                                      if($article_type_id = (int) $this->uri->segment(3)) {
                                        if($article_type_id == $p->article_type_id) {
                                        echo '<option selected="selected" value="'.$p->article_type_id.'">'.$p->article_type_libelle.'</option>';
                                         } else {
                                            echo '<option value="'.$p->article_type_id.'">'.$p->article_type_libelle.'</option>';
                                         }

                                      } else {
                                        echo '<option value="'.$p->article_type_id.'">'.$p->article_type_libelle.'</option>';
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
                        <th>Type article</th>
                        <th>Libellé</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Date de réception</th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($articles as $p) { ?>       
                      <tr>
                          <td>
                              <input type="checkbox" class="check_item" value="<?php echo $p->article_id; ?>">
                          </td>
                          <td>
                              <?php
                                 $article_type = $this->model_articletype->getById($p->article_type_id);
                                 if($article_type) { 
                                     echo truncate($article_type[0]->article_type_libelle, 20);
                                 } else {
                                     echo '';
                                 }
                             ?>
                          </td>
                          <td><?php echo truncate($p->article_libelle, 20); ?></td>
                          <td><?php echo truncate($p->article_unit_price, 20); ?></td>
                          <td><?php echo truncate($p->article_quantity, 20); ?></td>
                          <td>
                              <?php if($p->article_date_reception)
                                        echo truncate(formatDateToPHP($p->article_date_reception), 20);
                                    else
                                      echo '';
                               ?>
                            
                          </td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>article/update/<?php echo $p->article_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->article_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
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


        