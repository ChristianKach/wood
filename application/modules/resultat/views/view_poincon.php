<div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
                <center><h3 >Résultat du Projet : <?php  echo "<b style=color:red;>".ucfirst($poincons->libelle)."</b>"; ?> <br><br>   
                  Note de calcul de Bois: 
                  <?php 
                    if($poincons) { 
                                  echo "<b style=color:red;>"."Poinçon contre-fiche"."</b>";
                                 } else {
                                  echo '';
                                 }
                                  ?>
                </h3> </center>
              </div>
              <?php foreach($poincon as $p) { 
                        
                          $categorie = $this->model_categorie->getById($p->categorie_id);
                          $E = $categorie[0]->kmaj_emb_ar;
                          $F = $categorie[0]->kcr_emb_ar;
                          $G = $categorie[0]->kc90_emb_ar;
                          $H = $categorie[0]->kfi_emb_ar;
                          $I = $categorie[0]->vitesse_emb_ar;
                          $J = $categorie[0]->vitesse_1_emb_ar;
                        
                          $poincon = $this->model_poincon->getById($p->poincon_id);
                          $pc = ($I *($poincon[0]->tr_emb_ar - $poincon[0]->tpr_emb_ar)) + (1*7);
                          $en = ($I *$poincon[0]->fd_emb_ar);
                          $lsi = $poincon[0]->lent_emb_ar - (2 * $pc);
                          $hsi = $poincon[0]->haut_emb_ar - (1 * $pc);
                          $Lsi = $poincon[0]->barb_emb_ar - (2 * $pc);
                          $Hsi = $poincon[0]->harb_emb_ar - (1 * $pc);                       
                          $angle = $poincon[0]->angle_emb_ar;               
                          $Ltal = $poincon[0]->ltal_emb_ar - $pc ;
                          $Htal = $poincon[0]->htal_emb_ar - $pc ;

                          $bois = $this->model_bois->getById($p->bois_id);
                          $Rf = $bois[0]->bois_flexion_longitudinale;
                          $Rta = $bois[0]->bois_traction_axiale;
                          $Rtt = $bois[0]->bois_traction_transversale;
                          $Rca = $bois[0]->bois_compression_axiale;
                          $Rct = $bois[0]->bois_compression_transversale;
                          $Rc = $bois[0]->bois_cisaillement;
                          $Mma = $bois[0]->bois_module_elasticite_axial;
                          $D = $bois[0]->bois_masse_volumique; 

                          $a = (30*sin(($angle/2) *(3.14159/180)));
                          $b = ($Htal/(cos(($angle/2) *(3.14159/180))));
                          $Leco = ((($Htal/cos(($angle/2) *(3.14159/180))) + min($a,$b))); 
                          $Ensi = $I * $poincon[0]->fd_emb_ar;
                          $Ens = $I * $poincon[0]->ft_emb_ar;
                          $Cem = ($poincon[0]->lf_emb_ar * sqrt(12)/$Lsi);
                          $Cer = ($Cem * (sqrt($Rct/($D * 1000))/3.14159));
                          $Cce = (0.5 * (1 + $J * ($Cer - 0.3) + pow($Cer, 2)));
                          $Ccc = (1 / ($Cce + sqrt(pow($Cce, 2) -pow($Cer, 2))));
                          $Rco = (($Rct * $Rc * $G)/(($Rct * pow(sin(($angle/2) *(3.14159/180)), 2))+($Rc*$G*pow(cos(($angle/2) *(3.14159/180)), 2))));
                          $Cct = (($Ensi * $E) * ((cos(($angle) *(3.14159/180)))/(($Lsi * $F * $Ltal))));
                          $Rcas = ($Rc * $H);
                          $Cca = (($Ensi * cos(($angle/2) *(3.14159/180))/($lsi * $Leco)));
                          $Rcp = (($Rco * $H));
                          $Ci = ($Ensi /($Lsi * $Hsi));
                          $Rtax = ($Ensi /($lsi * $hsi));
                          $Ces = ($Rct * $H);
                          $Ccas = ($Ensi / ($Lsi * $hsi));
                          $Rcax = ($Rca * $H);
                          $Vct = ($Cct / $Rcas)*100;
                          $Vco = ($Cca / $Rcp)*100;
                          $Vte = ($Rtax / ($Ccc * $Ces))*100;
                          $Vten = ($Ci / ($Ccc * $Ces))*100;
                          
                        }
                        ?> 
            </div><br><br><br><br>

            <?php if ($Vct < 100 || $Vco < 100 || $Vte < 100 || $Vten < 100){
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
                                 if($poincon) { 
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
                                 if($poincon) { 
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
                        <tr>
                          <td> Angle</td>
                          <td><?php echo truncate($p->angle_emb_ar, 20)." °"; ?></td>
                        </tr>
                        <tr>
                          <td>Effort Normal dans l'arbaletrier </td>
                          <td><?php echo truncate($p->fd_emb_ar, 20)." N "; ?></td>
                        </tr>
                        <tr>
                          <td>Effort Normal dans l'entrait </td>
                          <td><?php echo truncate($p->ft_emb_ar, 20)." N"; ?></td>
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
                          <td>Largeur de l'entrait </td>
                          <td><?php echo truncate($p->lent_emb_ar, 20)." daN/m "; ?></td>
                        </tr>
                        <tr>
                          <td> Hauteur de l'entrait</td>
                          <td><?php echo truncate($p->haut_emb_ar, 20)." daN/m "; ?></td>
                        </tr>
                        <tr>
                          <td>Hauteur du talon </td>
                          <td><?php echo truncate($p->htal_emb_ar, 20)." mm "; ?></td>
                        </tr>
                        <tr>
                          <td> Longueur du talon</td>
                          <td><?php echo truncate($p->ltal_emb_ar, 20)." mm"; ?></td>
                        </tr>
                        <tr>
                          <td> Largeur Barb</td>
                          <td><?php echo truncate($p->barb_emb_ar, 20)." mm"; ?></td>
                        </tr>
                        <tr>
                          <td> Hauteur Barb</td>
                          <td><?php echo truncate($p->harb_emb_ar, 20)." mm"; ?></td>
                        </tr>
                        <tr>
                          <td> Longueur du flambement</td>
                          <td><?php echo truncate($p->lf_emb_ar, 20)." mm"; ?></td>
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
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b style="color:#20804b;">Résultat 1</b> </h2> 
                    <div class="col-lg-12">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped jambo_table bulk_action" >
                      <thead>
                        <tr>
                          <th>LIBELLE</th>
                          <th>VALEUR</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Profondeur de Carbonisation</td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($pc, 20)."mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Effort normal du au contre fiche  en situation incendie</td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($Ensi, 20)." N";
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

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b style="color:#20804b;">Contre-fiche</b></h2>
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
                          <td>Largeur en situation incendie </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($lsi, 20)." mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Hauteur en situation incendie</td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($hsi, 20)." mm";
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
                    <h2><b style="color:#20804b;">Poinçon</b></h2>
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
                          <td>Largeur en situation incendie</td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($Lsi, 20)." mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Hauteur en situation incendie</td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($Hsi, 20)." mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Longeur du talon en situation incendie</td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($Ltal, 20)." mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Hauteur du talon en situation incendie</td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($Htal, 20)." mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Longeur efficace de compression oblique</td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Leco, 2)." mm";
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
                          <td>Effort normal du au contre fiche  en situation incendie </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($Ensi, 20)." N";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Effort normal dû au poinçon en situation incendie </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo truncate($Ens, 20)." N";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Calcul de l'élancement maximal</td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Cem, 2);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Calcul de l'élancement relatif </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Cer, 3);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Calcul du coefficient d'élancement </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Cce, 2);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Calcul du coefficient de contrainte </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Ccc, 2);
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance en compresssion oblique de l'assemblage </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Rco, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Contrainte de cisaillement </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Cct, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance au cisaillement de l'assemblage </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Rcas, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Contrainte de compression de l'assemblage </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Cca, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance en compression </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Rcp, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Contrainte induite par la charge  </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Ci, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Résistance en traction axial </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Rtax, 2)." Mpa";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Contrainte de la section réduite </td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo number_format($Ces, 2)." Mpa";
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
                          <td><h4>Vérification du cisaillement </h4></td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo " <H4 style=color:red;>".number_format($Vct, 0)." % </H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>Vérification de la compression oblique de l'about </h4></td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo " <H4 style=color:red;>".number_format($Vco, 0)." % </h4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>Vérification de la compression axial du au contre fiche</h4></td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo " <H4 style=color:red;>".number_format($Vte, 0)." % </h4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>Vérification de la compression axial du au poinçon</h4></td>
                          <td>
                            <?php
                                 if($poincon) { 
                                  echo " <H4 style=color:red;>".number_format($Vten, 0)." % </h4>";
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
                <a href="<?php echo site_url(); ?>poincon/update/<?php echo $p->poincon_id; ?>"class="btn btn-success"><i class="fa fa-pencil"></i> Modifier</a>
                <a href="<?php echo site_url('poincon'); ?>" data-id="" class=" btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
               </center>
              </div>
            </div>
          </div>
        </div>