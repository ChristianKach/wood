<div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
                <center><h3 >Résultat du Projet : <?php  echo "<b style=color:red;>".ucfirst($pannes->libelle)."</b>"; ?> <br><br>   
                  Note de calcul de Bois: 
                  <?php 
                    if($pannes) { 
                                  echo "<b style=color:red;>"."Flexion Composé"."</b>";
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
                      <?php foreach($panne as $p) { 

                          $categorie = $this->model_categorie->getById($p->categorie_id);
                          $E = $categorie[0]->kmaj_emb_ar;
                          $F = $categorie[0]->kcr_emb_ar;
                          $G = $categorie[0]->kc90_emb_ar;
                          $H = $categorie[0]->kfi_emb_ar;
                          $J = $categorie[0]->vitesse_1_emb_ar;
                        
                          $panne = $this->model_panne->getById($p->panne_id);
                          $tr = $panne[0]->tr_emb_ar;
                          $tpr = $panne[0]->tpr_emb_ar;
                          $angle = $panne[0]->angle_emb_ar;
                          $qfi = $panne[0]->qfi;
                          $Ff = $panne[0]->face_emb_ar;
                          $Lp = $panne[0]->lar_p;
                          $port = $panne[0]->port;
                          $hp = $panne[0]->haut_p;

                         // $coefficient= $this->model_coefficient->getLastCoefficientPrimaryKey();
                          $kdef = $coefficient[0]->kdef;
                          $I = $coefficient[0]->vitesse_emb_ar;
                          $cm = $coefficient[0]->cm;
                          $c0 = $coefficient[0]->c0;
                          $c1 = $coefficient[0]->c1;
                          $c2 = $coefficient[0]->c2;
                          $klef = $coefficient[0]->klef;
                          $charg = $coefficient[0]->charg;
                          $km = $coefficient[0]->km;
                          $khy = $coefficient[0]->khy;
                          $khz = $coefficient[0]->khz;

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
                          $Lsi =($Lp-($Ff*$Pc));
                          $Hsi =($hp-($Ff*$Pc));
                          $Pgz = $qfi*sin(deg2rad($angle));
                          $Pgy = $qfi*cos(deg2rad($angle));
                          $Muy = (($Pgy*pow($port, 2))/8);
                          $Muz = (($Pgz*pow($port, 2))/8);
                          $Cnay = (6*$Muy*pow(10, 4))/($Lsi*pow($Hsi, 2));
                          $Cnaz = (6*$Muz*pow(10, 4))/($Lsi*pow($Hsi, 2));
                          $Rfl = $Rf*$H;
                          $Rctan = $Mma * $H;

                          if ($charg = 1) {
                            $Leff = ($klef*1000*$port)+(2*$Lsi);
                          }else{
                            $Leff = ($klef*1000*$port)-(0.5*$Lsi);
                          }

                          $Cd1 = (0.78*pow($Lsi, 2)*$D*1000)/($Leff*$Hsi);
                          $Cd2 = sqrt($Rf/$Cd1);

                          if ($Cd2 > 0.75) {
                            $Cd3 = 1.56-(0.75*$Cd2);
                          }else{
                            $Cd3 = 1;
                          }

                          $Vflex = (($km*$Cnay/($khy*$Rfl))+($Cnaz/($khz*$Rfl)))*100;
                          $Vfl = (($Cnay/($khy*$Rfl))+(($km*$Cnaz)/($khz*$Rfl)))*100;
                          $Vv = ($Cnay/($Cd3*$Rf))*100;
                          $Vver = ($Cnaz/($Cd3*$Rf))*100;

                          $KDEF = 0.80;
                          $Y2 = 0.30;
                          $Me = 11000;
                          $Iy = ($Lsi * pow($Hsi, 3))/12;
                          $Iz = ($Hsi * pow($Lsi, 3))/12;

                          $condition = " Condition Satisfaite !! ";
                          $condition2 = " Condition Non Satisfaite !!";
                          //$conditions = ($Fnet/$fleche)*100;

                        }
                        ?>
                    </table>
                  </div>
                </div>
              </div>
              <?php if ($Vflex > 100 || $Vfl > 100 || $Vv > 100 || $Vver > 100){
               ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <a href=""class="btn btn-danger"> Résultat non satisfesant <i class="fa fa-bell"></i></a>
                  </div>
                </div>
              </div>
              <?php  }else{?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <a href=""class="btn btn-success">Résultat satisfesant <i class="fa fa-check "></i></a>
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
                                 if($panne) { 
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
                                 if($panne) { 
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
                          <td> Combinaison accidentelle des charge qfi</td>
                          <td><?php echo truncate($p->qfi, 20)." daN/ml "; ?></td>
                        </tr>
                        <tr>
                          <td>Largeur de la panne </td>
                          <td><?php echo truncate($p->lar_p, 20)." mm "; ?></td>
                        </tr>
                        <tr>
                          <td> Portée Lo</td>
                          <td><?php echo truncate($p->port, 20)." m"; ?></td>
                        </tr>
                        <tr>
                          <td> Hauteur de la panne</td>
                          <td><?php echo truncate($p->haut_p, 20)." mm"; ?></td>
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
                    <h2><b style="color:#d46c1e;"><center>COMBINAISON D'ACTION EN SITUATION INCENDIE </center></b></h2>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b style="color:#20804b;"></b></h2>
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
                          <td><H2>P<SUB>Gz</SUB> = g.sinα</H2></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo "<H2 style=color:red;>".number_format($Pgz, 2)." daN/m </H2>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><H2>P<SUB>Gy</SUB> = g.cosα</H2></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo "<H2 style=color:red;>".number_format($Pgy, 2)." daN/m </H2>";
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
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b style="color:#20804b;">Moment fléchissant </b></h2>
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
                          <td><H2>M<SUB>uyax,fi</SUB> = P<SUB>gz</SUB>xL<SUP>2</SUP>/8</H2></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo "<H2 style=color:red;>".round($Muy, 2)." daN.m </H2>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><H2>M<SUB>uzax,fi</SUB> = P<SUB>gy</SUB>xL<SUP>2</SUP>/8</H2></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo "<H2 style=color:red;>".round($Muz, 2)." daN.m </H2>";
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
                          <td><h4>Largeur en situation incendie  b<sub>p,ef,fi</sub> </h4></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo " <H4 style=color:red;>".round($Lsi, 0)." mm</H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>Hauteur en situation incendie h<sub>pef,fi</sub> </h4></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo " <H4 style=color:red;>".round($Hsi)." mm </h4>";
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
                                 if($panne) { 
                                  echo round($Pc)." mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>containte normal selon l'axe y'y σ<sub>uy</sub> = 6 x M<sub>uy</sub> /(bh²) </td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo number_format($Cnay, 2)." daN/m";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>containte normal selon l'axe z'z σ<sub>uz</sub> = 6 x M<sub>uz</sub> /(bh²) </td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo number_format($Cnaz, 2)." daN/m";
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
                                 if($panne) { 
                                  echo round($Rfl, 2)." Mpa";
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
                                 if($panne) { 
                                  echo ($Rctan)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Calcul au deversement  </td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo number_format($Cd1, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Calcul au deversement  </td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo number_format($Cd2, 2);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>k <sub>crit</sub> =1,56 - 0,75 x λ<sub>rel,m</sub>   </td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo number_format($Cd3, 2);
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
                    <h2><b style="color:#d46c1e;"><center>VERIFICATION EN FLEXION COMPOSEE</center></b></h2>
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
                          <td><h4>Vérification à la flexion </h4></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo " <H4 style=color:red;>".round($Vflex, 0)." % </H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>Vérification à la flexion </h4></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo " <H4 style=color:red;>".round($Vfl, 0)." % </H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>Vérification au versement </h4></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo " <H4 style=color:red;>".round($Vv, 0)." % </H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        
                        <tr>
                          <td><h4>Vérification au versement </h4></td>
                          <td>
                            <?php
                                 if($panne) { 
                                  echo " <H4 style=color:red;>".round($Vver, 0)." % </H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                      </tbody>
                      </table>
              <center>
                <a href="<?php echo site_url(); ?>panne/update/<?php echo $p->panne_id; ?>"class="btn btn-success"><i class="fa fa-pencil"></i> Modifier</a>
                <a href="<?php echo site_url('panne'); ?>" class=" btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
            </center>
            </div>   
          </div>
        </div>
      </div>
    </div>