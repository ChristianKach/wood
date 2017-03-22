<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>SMS</h3>
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
                    
                        <h2>SMS aux adhérants</h2>
                    
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


                    
                        <form id="form_sms" method="post" action="#" data-parsley-validate class="form-horizontal form-label-left">
                    

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="list_numbers">
                        Numéros <span class="required">*</span>
                        </label>
                        <?php echo form_error('list_numbers', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="list_numbers" required="required" name="list_numbers" class="form-control col-md-7 col-xs-12">
                             <?php foreach($numbers as $n) { ?>
                                 <option value="<?php echo $n->adherant_telephone_1;?>">
                                   <?php 
                                       echo $n->adherant_nom.' '.$n->adherant_prenom .' - ' . $n->adherant_telephone_1;
                                   ?>
                                 </option>
                             <?php } ?>
                          </select>

                          <input type="hidden" name="numbers" value="<?php foreach($numbers as $n) { ?><?php echo $n->adherant_telephone_1.'|'; ?><?php } ?>">

                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sender_name">
                        Sender name (Titre) <span class="required">*</span>
                        </label>
                        <?php echo form_error('sender_name', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="sender_name" required="required" name="sender_name" class="form-control col-md-7 col-xs-12">
                             <option value="Sion 2017">Sion 2017</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="sms_body" class="control-label col-md-3 col-sm-3 col-xs-12">Message <span class="required">*</span>
                        </label>
                        <?php echo form_error('sms_body', '<span style="color: red;">', '</span>'); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="sms_body" max="160" rows="10" name="sms_body" class="form-control col-md-7 col-xs-12" required="required"><?php echo set_value('sms_body');?></textarea>
                          <span id="chars">160 caractères restants</span> 
                        </div>
                      </div>


                      <div>
                      IMPORTANT! Veuillez taper le message manuellement (ne pas utiliser copier / coller). Le fait de coller génère des caractères spéciaux des éditeurs de texte et le message ne sera pas fourni correctement. Caractères <strong>^ {} [] ~ \ | €</strong> sont comptabilisés en double lors de l'envoi de message sans caractères spéciaux en raison des spécifications GSM.
                      </div>
                    

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-default" href="<?php echo site_url('adherant'); ?>">< Adhérants</a>
                          <button type="button" id="btn_sms_cancel"
                          onclick="document.getElementById('form_sms').reset();
                          document.getElementById('chars').innerHTML = '160 caractères restants';" class="btn btn-primary">Annuler</button>

                          <button type="submit" id="btn_sent_sms" class="btn btn-success">Envoyer</button>

                          <span id="verbose"></span>

                        </div>
                      </div>

                    </form>
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


        