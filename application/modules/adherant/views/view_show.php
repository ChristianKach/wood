
        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 1164px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profile Adhérant</h3>
              </div>

            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Adhérant</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php if($adherant->adherant_photo) { ?>
                              <img class="img-responsive avatar-view" src="<?php echo base_url(); echo $adherant->adherant_photo; ?>" alt="Avatar" title="Change the avatar">
                          <?php } else { ?>
                              <img class="img-responsive avatar-view" src="<?php echo base_url();?>assets/template/images/user.png" alt="Avatar" title="Avatar">
                          <?php } ?>

                        </div>
                      </div>

                      <h3><?php echo ucfirst($adherant->adherant_nom)." ".$adherant->adherant_prenom; ?></h3>
                      <h5>(Famille: 
                      <?php 
                          $famille = $this->model_famille->getById($adherant->famille_id);
                          if($famille)
                              echo $famille[0]->famille_nom;
                      ?>
                      )<h5>

                      <ul class="list-unstyled user_data">
                        <li>
                            <i class="fa fa-map-marker user-profile-icon"></i>  
                            <?php echo $adherant->adherant_quartier; ?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i>
                          <?php echo $adherant->adherant_profession; ?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <?php echo $adherant->adherant_telephone_1; ?> /
                          <?php echo $adherant->adherant_telephone_2; ?> /
                          <?php echo $adherant->adherant_telephone_3; ?> / 
                          <?php echo $adherant->adherant_email; ?>
                        </li>
                      </ul>

                      <a href="<?php echo site_url(); ?>adherant/update/<?php echo $adherant->adherant_id; ?>" class="btn btn-success">
                          <i class="fa fa-edit m-right-xs"></i> Modifier Profile
                      </a>
                      <!-- <a href="<?php //echo site_url(); ?>adherant" class="btn btn-primary">
                          <i class="fa fa-arrow-left"></i> Retour
                      </a> -->
                      <br/><br/><br/>

                      <!-- start skills -->
                      <h4>Statistiques</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <?php
                              $count_total_programmes = count($this->model_programme->getAll());
                              $count_adherant_in_programmes = 
                                count($this->model_programme_adherant->getByAdherantId($adherant->adherant_id));
                              $percent_programmes = ($count_adherant_in_programmes / $count_total_programmes) * 100;

                              $count_total_meditations = count($this->model_meditation->getAll());
                              $percent_meditations = ($nb_meditation / $count_total_meditations ) * 100;

                          ?>
                          <p>Participation aux Programmes (<?php echo $count_adherant_in_programmes; ?> / 
                          <?php echo $count_total_programmes; ?>)
                          <?php echo $percent_programmes; ?>%
                          </p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $percent_programmes; ?>" aria-valuenow="49" style="width: 50%;"></div>
                          </div>
                        </li>
                        <li>
                          <p>Participation aux Meditations (<?php echo $nb_meditation; ?> / 
                          <?php echo $count_total_meditations; ?>)
                          <?php echo $percent_meditations; ?>%
                          </p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar"
                             data-transitiongoal="<?php echo $percent_meditations; ?>" aria-valuenow="69" style="width: 70%;"></div>
                          </div>
                        </li>
                        
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                     

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                          <li role="presentation" class="active"><a href="https://colorlib.com/polygon/gentelella/profile.html#tab_content1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Profile</a>
                          </li>

                          <li role="presentation" class=""><a href="https://colorlib.com/polygon/gentelella/profile.html#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Programme</a>
                          </li>

                          <li role="presentation" class=""><a href="https://colorlib.com/polygon/gentelella/profile.html#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Maladie</a>
                          </li>

                        </ul>
                        <div id="myTabContent" class="tab-content">

                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Infos</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><strong>Matricule</strong></td>
                                  <td><?php echo $adherant->adherant_matricule; ?></td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td><strong>Nom</strong></td>
                                  <td><?php echo $adherant->adherant_nom; ?></td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td><strong>Prénom</strong></td>
                                  <td><?php echo $adherant->adherant_prenom; ?></td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td><strong>Quartier</strong></td>
                                  <td><?php echo $adherant->adherant_quartier; ?></td>
                                </tr>
                                <tr>
                                  <td>5</td>
                                  <td><strong>Téléphone 1</strong></td>
                                  <td><?php echo $adherant->adherant_telephone_1; ?></td>
                                </tr>
                                <tr>
                                  <td>6</td>
                                  <td><strong>Téléphone 2</strong></td>
                                  <td><?php echo $adherant->adherant_telephone_2; ?></td>
                                </tr>
                                <tr>
                                  <td>7</td>
                                  <td><strong>Téléphone 3</strong></td>
                                  <td><?php echo $adherant->adherant_telephone_3; ?></td>
                                </tr>
                                <tr>
                                  <td>8</td>
                                  <td><strong>Email</strong></td>
                                  <td><?php echo $adherant->adherant_email; ?></td>
                                </tr>
                                <tr>
                                  <td>9</td>
                                  <td><strong>Profession</strong></td>
                                  <td><?php echo $adherant->adherant_profession; ?></td>
                                </tr>
                                <tr>
                                  <td>10</td>
                                  <td><strong>Date de naissance</strong></td>
                                  <td>
                                      <?php if($adherant->adherant_birthday) { ?>
                                          <?php echo formatDateToPHP($adherant->adherant_birthday); ?>
                                      <?php } ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>11</td>
                                  <td><strong>Sexe</strong></td>
                                  <td><?php echo $adherant->adherant_sexe; ?></td>
                                </tr>
                                <tr>
                                  <td>12</td>
                                  <td><strong>Ethnie</strong></td>
                                  <td><?php echo $adherant->adherant_ethnie; ?></td>
                                </tr>
                                
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Programme libellé</th>
                                  <th>Année</th>
                                  <th>Nombre de méditation dans ce programme</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                <?php if(!empty($programmes)) { ?>
                                <?php $i = 1; foreach($programmes as $pro) { ?>
                                    <?php foreach($pro as $p) { ?>
                                    <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $p->programme_libelle; ?></td>
                                      <td>
                                      <?php if($p->programme_date_start && $p->programme_date_start) { ?>
                                          <?php echo formatDateToPHP($p->programme_date_start); ?> / 
                                          <?php echo formatDateToPHP($p->programme_date_end); ?>
                                      <?php } ?>
                                      </td>
                                      <td><?php echo $nb_meditation; ?></td>
                                    </tr>
                                    <?php } ?>
                                <?php $i += 1; } ?>
                                <?php } else { ?>
                                    <tr><td></td><td>Aucun programme</td></tr>
                                <?php } ?>
                                
                              </tbody>
                            </table>

                          </div>
                          
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Maladie libellé</th>
                                  <th>Patient guéri?</th>
                                  <th>Nombre de traitement pour cette maladie</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                <?php if(!empty($maladie)) { ?>
                                <?php $i = 1; foreach($maladie as $m) { ?>
                                    <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $m->maladie_libelle; ?></td>
                                      <td><?php echo $m->maladie_healed; ?></td>
                                      <td>
                                          <?php 
                                              echo count($this->model_traitement->getAllByMaladeId($m->malade_id));
                                          ?>
                                      </td>
                                    </tr>
                                    
                                <?php $i += 1; } ?>
                                <?php } else { ?>
                                    <tr><td></td><td>Aucune maladie</td></tr>
                                <?php } ?>
                                
                              </tbody>
                            </table>

                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->