<div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
                <center><h3 >Résultat du Projet : <?php  echo "<b style=color:red;>".ucfirst($poteau_centres->libelle)."</b>"; ?> <br><br>   
                  Note de calcul de Bois: 
                  <?php 
                    if($poteau_centres) { 
                                  echo "<b style=color:red;>"."Poteau Centré"."</b>";
                                 } else {
                                  echo '';
                                 }
                                  ?>
                </h3> </center>
              </div>
            </div><br><br><br><br>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">

                    <table class="table table-striped jambo_table bulk_action" >
                      <?php foreach($poteau_centre as $p) { 

                          $categorie = $this->model_categorie->getById($p->categorie_id);
                          $E = $categorie[0]->kmaj_emb_ar;
                          $F = $categorie[0]->kcr_emb_ar;
                          $G = $categorie[0]->kc90_emb_ar;
                          $H = $categorie[0]->kfi_emb_ar;
                          $I = $categorie[0]->vitesse_emb_ar;
                          $J = $categorie[0]->vitesse_1_emb_ar;
                        
                          $poteau_centre = $this->model_poteau_centre->getById($p->poteau_centre_id);
                          $tr = $poteau_centre[0]->tr_emb_ar;
                          $tpr = $poteau_centre[0]->tpr_emb_ar;
                          $qfi = $poteau_centre[0]->qfi;
                          $Ff = $poteau_centre[0]->face_emb_ar;
                          $Lp = $poteau_centre[0]->lar_p;
                          $lp = $poteau_centre[0]->long_p;
                          $hp = $poteau_centre[0]->haut_p;
                          $m = $poteau_centre[0]->m;

                         // $coefficient= $this->model_coefficient->getLastCoefficientPrimaryKey();
                          $kdef = $coefficient[0]->kdef;
                          $cm = $coefficient[0]->cm;
                          $c0 = $coefficient[0]->c0;
                          $c1 = $coefficient[0]->c1;
                          $c2 = $coefficient[0]->c2;

                          $bois = $this->model_bois->getById($p->bois_id);
                          $Rf = $bois[0]->bois_flexion_longitudinale;
                          $Rta = $bois[0]->bois_traction_axiale;
                          $Rtt = $bois[0]->bois_traction_transversale;
                          $Rca = $bois[0]->bois_compression_axiale;
                          $Rct = $bois[0]->bois_compression_transversale;
                          $Rc = $bois[0]->bois_cisaillement;
                          $Mma = $bois[0]->bois_module_elasticite_axial;
                          $D = $bois[0]->bois_masse_volumique; 

                          $Pc = ($I*($tr-$tpr))+(1*7);
                          $Lsi =($Lp-($Ff * $Pc));
                          $Hsi =($lp-($Ff * $Pc));
                          $Ssi = $Lsi * $Hsi;
                          $X = ($Lsi * pow($Hsi, 3))/12;
                          $Y = ($Hsi * pow($Lsi, 3))/12;
                          $In = max($X,$Y);
                          $Lf = $m * $hp;
                          $El = $Lf/(sqrt($In/$Ssi));
                          $Rctr = $Rc * $H;
                          $Er = $El*(sqrt($Rctr/($Mma*1000))/3.14159);
                          $Ccc = 0.5*(1+$J*($Er-0.3)+pow($Er, 2));
                          $ccc = 1/($Ccc+sqrt(pow($Ccc, 2)-pow($Er, 2)));
                          $Cca = $qfi *(10/$Ssi);
                          $Rfl = $Rct*$H*$ccc;
                          $Vca = ($Cca/$Rfl)*100;

                        }
                        ?>
                    </table>
                  </div>
                </div>
              </div>
              <?php if ($Vca < 100){
               ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <a href=""class="btn btn-success"> Résultat satisfesant <i class="fa fa-check"></i></a>
                  </div>
                </div>
              </div>
              <?php  }else{?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <a href=""class="btn btn-danger">Résultat non satisfesant <i class="fa fa-bell"></i></a>
                  </div>
                </div>
              </div>
              <?php  } ?>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <h2><b style="color:#d46c1e;"><center>HYPHOTHESE DE CALCUL </center></b></h2>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table ">
                      <tbody>
                        <tr>
                          <td>bois </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo truncate($bois[0]->bois_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td> Type de Bois</td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo truncate($categorie[0]->categorie_libelle, 20);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Taux Humidité </td>
                          <td><?php echo truncate($p->taux_emb_ar, 20)." % "; ?></td>
                        </tr>
                        <tr>
                          <td> Durée de Résistance</td>
                          <td><?php echo truncate($p->tr_emb_ar, 20)." min"; ?></td>
                        </tr>
                        <tr>
                          <td>Temps de protection </td>
                          <td><?php echo truncate($p->tpr_emb_ar, 20)." min "; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table ">
                      <tbody>                       
                        <tr>
                          <td> Combinaison en situation accidentelle</td>
                          <td><?php echo truncate($p->qfi, 20)." daN "; ?></td>
                        </tr>
                        <tr>
                          <td> Longueur du poteau</td>
                          <td><?php echo truncate($p->long_p, 20)." mm"; ?></td>
                        </tr>
                        <tr>
                          <td> Hauteur du poteau</td>
                          <td><?php echo truncate($p->haut_p, 20)." mm"; ?></td>
                        </tr>
                        <tr>
                          <td> Coefficient definissant la longueur de flambement</td>
                          <td><?php echo truncate($p->m, 20); ?></td>
                        </tr>
                        <tr>
                          <td> Face au feu</td>
                          <td><?php echo truncate($p->face_emb_ar, 20); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             </div>
           </div>
         </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b style="color:#20804b;">CLASSE DES RESISTANCES DU BOIS </b></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr>
                          <th>Libéllé</th>
                          <th>Valeur</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Résistance à la flexion</td>
                          <td>
                            <?php
                                 if($bois) { 
                                  echo truncate($Rf, 20)." N/mm <SUP>2";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance à la traction axial</td>
                          <td>
                            <?php
                                 if($bois) { 
                                  echo truncate($Rta, 20)." N/mm <SUP>2";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance à la traction transversale</td>
                          <td>
                            <?php
                                 if($bois) { 
                                  echo truncate($Rtt, 20)." N/mm <SUP>2";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance à la compression axial</td>
                          <td>
                            <?php
                                 if($bois) { 
                                  echo truncate($Rca, 20)." N/mm <SUP>2";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance à la compression transversale</td>
                          <td>
                            <?php
                                 if($bois) { 
                                  echo truncate($Rct, 20)." N/mm <SUP>2";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance aux cisaillement</td>
                          <td>
                            <?php
                                 if($bois) { 
                                  echo truncate($Rc, 20)." N/mm <SUP>2";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Module moyen axial</td>
                          <td>
                            <?php
                                 if($bois) { 
                                  echo truncate($Mma, 20)." N/mm <SUP>2";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Densité caractéristique du matériaux</td>
                          <td>
                            <?php
                                 if($bois) { 
                                  echo truncate($D, 20)." Kg/m <SUP>3";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <h2><b style="color:#d46c1e;"><center>DIMENSIONNEMENT EN SITUATION INCENDIE</center></b></h2>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr>
                          <th>Libéllé</th>
                          <th>Valeur</th>
                        </tr>
                      </thead>
                        <tbody>
                        <tr>
                          <td><h4>Largeur en situation incendie  ap,ef,fi </h4></td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo " <H4 style=color:red;>".number_format($Lsi, 0)." mm</H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>Hauteur en situation incendie bpef,fi </h4></td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo " <H4 style=color:red;>".round($Hsi)." mm </h4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>La secteur en situation incendie A,d,fi</h4></td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo " <H4 style=color:red;>".round($Ssi)." mm<SUP>2 </h4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                      </tbody>
                      </table>
                    </div>   
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <h2><b style="color:#d46c1e;"><center>CALCUL DES EFFORTS DES ELEMENTS BOIS EC5</center></b></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr>
                          <th>Libéllé</th>
                          <th>Valeur</th>
                        </tr>
                      </thead>
                        <tbody>
                        <tr>
                          <td>Profondeur de carbonisation def=β0 x(t-tpr )+k0 +7 </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo round($Pc)." mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Inerties I=bh3/12 </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo ($In)." mm<SUP>4";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Longueur de flambement Lf=mLg</td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo ($Lf)." mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Elancement   λ=Lf/(√I/A) </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo round($El)." mm<SUP>4";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance a la containte tangentielle </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo ($Rctr)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Elancement relatif  </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo number_format($Er, 2);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Calcul du coefficient d'élancement ky=0.5(1+βc(λrel,y-0.3)+λrel,y2) </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo round($Ccc, 2);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td> Calcul du coefficient de contrainte </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo round($ccc, 2);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>contrainte de compression de l'assemblage  </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo round($Cca, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td> Résistance à la flexion </td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo round($Rfl, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                      </tbody>
                      </table>
                    </div>   
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <h2><b style="color:#d46c1e;"><center>VERIFICATION DE L'ASSEMBLAGE EN BOIS</center></b></h2>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                        <tr>
                          <th>Libéllé</th>
                          <th>Valeur</th>
                        </tr>
                      </thead>
                        <tbody>
                        <tr>
                          <td><h4>Vérification de la compression axiale </h4></td>
                          <td>
                            <?php
                                 if($poteau_centre) { 
                                  echo " <H4 style=color:red;>".number_format($Vca, 0)." % </H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                      </tbody>
                      </table>
                    </div>   
                  </div>
                </div>
                <center>
                <a href="<?php echo site_url(); ?>poteau_centre/update/<?php echo $p->poteau_centre_id; ?>"class="btn btn-success"><i class="fa fa-pencil"></i> Modifier</a>
                <a href="<?php echo site_url('poteau_centre'); ?>" data-id="" class=" btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
               </center>
              </div>
            </div>
          </div>
        