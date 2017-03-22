<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Type Article</h3>
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
                    <?php if(!isset($article_type)) { ?>
                        <h2>Ajouter un type article</h2>
                    <?php } else { ?>
                        <h2>Mise à jour: <?php echo $article_type->article_type_libelle; ?></h2>
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


                    <?php if(!isset($article_type)) { ?>
                        <form id="form_article_type" method="post" action="<?php echo site_url('articletype/save'); ?>" data-parsley-validate 
                          class="form-horizontal form-label-left">
                    <?php } else { ?>
                        <form id="form_article_type" 
                        method="post" action="<?php echo site_url('articletype/update') . '/' . $article_type_id = (int) $this->uri->segment(3); ?>" data-parsley-validate 
                      class="form-horizontal form-label-left">
                    <?php } ?>

                      <div class="form-group col-md-5">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="article_type_libelle">
                         Libellé <span class="required">*</span> 
                        </label>
                        <?php echo form_error('article_type_libelle', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" 
                          value="<?php
                           if(isset($article_type)) echo $article_type->article_type_libelle; ?>" 
                           placeholder="Libellé" name="article_type_libelle" id="package_libelle" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <?php if(isset($article_type)) { ?>
                          <input type="hidden" name="article_type_id" value="<?php echo $article_type->article_type_id; ?>" />
                      <?php } ?>

                      <div class="ln_solid col-md-12"></div>
                      <div class="form-group col-md-5">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="document.getElementById('form_article_type').reset();" class="btn btn-primary">Annuler</button>
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
                    <h2>Type article</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <p class="text-muted font-13 m-b-30">
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
                        <th>Type article libellé</th>
                        <th>#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php foreach($article_types as $p) { ?>       
                      <tr>
                          <td>
                              <input type="checkbox" class="check_item" value="<?php echo $p->article_type_id; ?>">
                          </td>
                          <td><?php echo truncate($p->article_type_libelle, 20); ?></td>
                          <td>
                           <center>
                            <a href="<?php echo site_url(); ?>articletype/update/<?php echo $p->article_type_id; ?>"  
                            class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                            <a href="#" data-id="<?php echo $p->article_type_id; ?>" class="btn btn-danger btn-xs btn_delete"><i class="fa fa-trash-o"></i> Supprimer</a>
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


        