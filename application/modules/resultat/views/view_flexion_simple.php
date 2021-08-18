  <div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
                <center><h3 >Résultat du Projet : <?php  echo "<b style=color:red;>".ucfirst($flexion_simples->libelle)."</b>"; ?> <br><br>   
                  Note de calcul de Bois: 
                  <?php 
                    if($flexion_simples) { 
                                  echo "<b style=color:red;>"."Flexion Simple"."</b>";
                                 } else {
                                  echo '';
                                 }
                                  ?>
                </h3> </center>
                </div></div><br><br><br><br>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">

                    <table class="table table-striped jambo_table bulk_action" >
                      <?php foreach($flexion_simple as $p) { 

                          $categorie = $this->model_categorie->getById($p->categorie_id);
                          $E = $categorie[0]->kmaj_emb_ar;
                          $F = $categorie[0]->kcr_emb_ar;
                          $G = $categorie[0]->kc90_emb_ar;
                          $H = $categorie[0]->kfi_emb_ar;
                          $J = $categorie[0]->vitesse_1_emb_ar;
                        
                          $flexion_simple = $this->model_flexion_simple->getById($p->flexion_simple_id);
                          $tr = $flexion_simple[0]->tr_emb_ar;
                          $tpr = $flexion_simple[0]->tpr_emb_ar;
                          $j = $flexion_simple[0]->vitesse_emb_ar;
                          $qfi = $flexion_simple[0]->qfi;
                          $Ff = $flexion_simple[0]->face_emb_ar;
                          $Lp = $flexion_simple[0]->lar_p;
                          $port = $flexion_simple[0]->port;
                          $hp = $flexion_simple[0]->haut_p;

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

                          $Muy = (($qfi * pow($port, 2))/8);
                          $Pc = ($j*($tr-$tpr))+(1*7);
                          $Lsi =($Lp-($Ff * $Pc));
                          $Hsi =($hp-($Ff * $Pc));
                          $Cnay = (6*$Muy*pow(10, 4))/($Lsi*pow($Hsi, 2));
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

                          //$Vctang = (sqrt(pow($Ctan, 2)+pow($Ctang, 2))/$Rctan)*100;
                          $Vflex = (($km*$Cnay/($khy*$Rfl)))*100;
                          $Vfl = (($Cnay/($khy*$Rfl)))*100;
                          $Vv = ($Cnay/($Cd3*$Rf))*100;

                         /* $KDEF = 0.80;
                          $Y2 = 1;
                          $Me = 11000;
                          $Iy = ($Lsi * pow($Hsi, 3))/12;
                          $Iz = ($Hsi * pow($Lsi, 3))/12;

                          $Gz1 = 5*$Pgz*0.001*pow(($port*1000), 4)/(384*$Me*$Iz);
                          $Qz1 = 5*$Pgz1*0.001*pow(($port*1000), 4)/(384*$Me*$Iz);
                          $Gz2 = $Gz1*$KDEF;
                          $Qz2 = $Qz1*$KDEF*$Y2;
                          $Total1 = $Gz1+$Gz2+$Qz1;

                          $Gy1 = (5*$Pgy*0.001*pow(($port*1000), 4))/(384*$Me*$Iz);
                          $Qy1 = (5*$Pgy1*0.001*pow(($port*1000), 4))/(384*$Me*$Iz);
                          $Gy2 = $Gy1*$KDEF;
                          $Qy2 = $Qy1*$KDEF*$Y2;
                          $Total2 = $Gy1+$Gy2+$Qy1;

                          $Fi = sqrt(pow($Gz1, 2)+pow($Gy1, 2));
                          $Fi1 = sqrt(pow($Qz1, 2)+pow($Qy1, 2));

                          $Total3 = sqrt(pow($Total1, 2)+pow($Total2, 2));
                          $fleche = ($port*1000)/150;
                          $Fnet = $Fi*(1+$KDEF)+$Fi1*(1+$Y2*$KDEF);*/

                          $condition = " Condition Satisfaite !! ";
                          $condition2 = " Condition Non Satisfaite !!";

                        }
                        ?>
                    </table>
                  </div>
                </div>
              </div>
              <?php if ($Vflex > 100 || $Vfl > 100 || $Vv > 100){
               ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <a href=""class="btn btn-danger"> Résultat non satisfesant <i class="fa fa-check"></i></a>
                  </div>
                </div>
              </div>
              <?php  }else{?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title_center">
                    <a href=""class="btn btn-success">Résultat satisfesant <i class="fa fa-bell"></i></a>
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
                                 if($flexion_simple) { 
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
                                 if($flexion_simple) { 
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
                          <td>Largeur du poteau </td>
                          <td><?php echo truncate($p->lar_p, 20)." mm "; ?></td>
                        </tr>
                        <tr>
                          <td>Portée Lo </td>
                          <td><?php echo truncate($p->port, 20)." m"; ?></td>
                        </tr>
                        <tr>
                          <td> Face au feu</td>
                          <td><?php echo truncate($p->face_emb_ar, 20); ?></td>
                        </tr>
                        <tr>
                          <td>Combinaison accidentelle des charge  qfi </td>
                          <td><?php echo truncate($p->qfi, 20)." mm/Min "; ?></td>
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
                    <h2><b style="color:#20804b;">Moment fléchissant  </b></h2>
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
                          <td>Muyax,fi=pgzxL2/2</td>
                          <td>
                            <?php
                                 if($bois) { 
                                  echo truncate($Muy, 20)." daN.m <SUP>2";
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
                          <td><h4>Largeur en situation incendie  b<sub>p,ef,fi</sub> </h4></td>
                          <td>
                            <?php
                                 if($flexion_simple) { 
                                  echo " <H4 style=color:red;>".number_format($Lsi, 0)." mm</H4>";
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
                                 if($flexion_simple) { 
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
                                 if($flexion_simple) { 
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
                                 if($flexion_simple) { 
                                  echo number_format($Cnay, 2)." daN/m";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        </tr>
                        <tr>
                          <td> Résistance à la flexion </td>
                          <td>
                            <?php
                                 if($flexion_simple) { 
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
                                 if($flexion_simple) { 
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
                                 if($flexion_simple) { 
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
                                 if($flexion_simple) { 
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
                                 if($flexion_simple) { 
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
                          <td><h4>Vérification à la flexion </h4></td>
                          <td>
                            <?php
                                 if($flexion_simple) { 
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
                                 if($flexion_simple) { 
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
                                 if($flexion_simple) { 
                                  echo " <H4 style=color:red;>".round($Vv, 0)." % </H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                      </tbody>
                      </table>
              <center>
                <a href="<?php echo site_url(); ?>flexion_simple/update/<?php echo $p->flexion_simple_id; ?>"class="btn btn-success"><i class="fa fa-pencil"></i> Modifier</a>
                <a href="<?php echo site_url('flexion_simple'); ?>" data-id="" class=" btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
               </center>
             </div>   
           </div>
         </div>
       </div>
     </div>
