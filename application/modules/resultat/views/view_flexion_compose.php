<div class="right_col" role="main">
          <div class="">
            <div class="page-title"><br><br>
              <div class="title_center">
                <center><h3 >Résultat du Projet : <?php  echo "<b style=color:red;>".ucfirst($flexion_composes->libelle)."</b>"; ?> <br><br>   
                  Note de calcul de Bois: 
                  <?php 
                    if($flexion_composes) { 
                                  echo "<b style=color:red;>"."Colonne en Flexion Composé"."</b>";
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
                      <?php foreach($flexion_compose as $p) { 
                        
                          $categorie = $this->model_categorie->getById($p->categorie_id);
                          $E = $categorie[0]->kmaj_emb_ar;
                          $F = $categorie[0]->kcr_emb_ar;
                          $G = $categorie[0]->kc90_emb_ar;
                          $H = $categorie[0]->kfi_emb_ar;
                          $I = $categorie[0]->vitesse_emb_ar;
                          $J = $categorie[0]->vitesse_1_emb_ar;
                        
                          $flexion_compose = $this->model_flexion_compose->getById($p->flexion_compose_id);
                          $tr = $flexion_compose[0]->tr_emb_ar;
                          $tpr = $flexion_compose[0]->tpr_emb_ar;
                          $cpg = $flexion_compose[0]->cpg;
                          $cvq = $flexion_compose[0]->cvq;
                          $cvq1 = $flexion_compose[0]->cvq1;
                          $cvq2 = $flexion_compose[0]->cvq2;
                          $Ff = $flexion_compose[0]->face_emb_ar;
                          $Lp = $flexion_compose[0]->lar_p;
                          $lp = $flexion_compose[0]->long_p;
                          $lc = $flexion_compose[0]->long_c;
                          $hp = $flexion_compose[0]->haut_p;
                          $m = $flexion_compose[0]->m;

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

                          $pu =((1.35 * $cpg)+(1.5 * $cvq));
                          $CE =(1.35 * $cpg)+(1.5 * ($cvq + ($c0 * $cvq1) + (0.5 * $cvq2)));
                          $ct =($cpg +  $cvq + ($c0 * $cvq1) + (0.5 * $cvq2));
                          $lt =((1+$kdef)*$cpg) + ($cvq + ($c0*$cvq1)+(0.5*$cvq2)+$kdef*(($cvq*$c0)+($c2*($cvq1+$cvq2))));
                          $Ca =($cpg+($cvq*$c1)+(($c2*($cvq1+$cvq2))));
                          $Pc = ($I*($tr-$tpr))+(1*7);
                          $Lcsi = ($lc-($Ff*$Pc));
                          $Lsi =($Lp-($Ff * $Pc));
                          $Cn = ($Ca*(($Lsi/2)+($Lcsi/2)));
                          $Hsi =($lp-($Ff * $Pc));
                          $Ssi = $Lsi * $Hsi;
                          $X = ($Lsi * pow($Hsi, 3))/12;
                          $Y = ($Hsi * pow($Lsi, 3))/12;
                          $In = max($X,$Y);
                          $Lf = $m * $hp;
                          $El = $Lf/(sqrt($In/$Ssi));
                          $Rctr = $Rct * $H;
                          $Er = $El*(sqrt($Rctr/($Mma*1000))/3.14159);
                          $Ccc = 0.5*(1+$J*($Er-0.3)+pow($Er, 2));
                          $ccc = 1/($Ccc+sqrt(pow($Ccc, 2)-pow($Er, 2)));
                          $Cca = $Ca *(10/$Ssi);
                          $Rfl = $Rct*$H*$ccc;
                          $Rflx = $Rf*$H;
                          $Vca = (($Cca/$Rfl)+((6*$Cn)/($Lsi*pow($Hsi, 2))*$Rctr))*100;

                          
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
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
                          <td> Charge G</td>
                          <td><?php echo truncate($p->cpg, 20)." daN/m "; ?></td>
                        </tr>
                        <tr>
                          <td>Charge Q </td>
                          <td><?php echo truncate($p->cvq, 20)." daN/m "; ?></td>
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
                          <td>Charge qi1 </td>
                          <td><?php echo truncate($p->cvq1, 20)." daN/m "; ?></td>
                        </tr>
                        <tr>
                          <td> Charge qi2</td>
                          <td><?php echo truncate($p->cvq2, 20)." daN/m "; ?></td>
                        </tr>
                        <tr>
                          <td>Largeur du poteau </td>
                          <td><?php echo truncate($p->lar_p, 20)." mm "; ?></td>
                        </tr>
                        <tr>
                          <td> Longueur du poteau</td>
                          <td><?php echo truncate($p->long_p, 20)." mm"; ?></td>
                        </tr>
                        <tr>
                          <td>Longueur du consol </td>
                          <td><?php echo truncate($p->long_c, 20)." mm"; ?></td>
                        </tr>
                        <tr>
                          <td> Hauteur du poteau</td>
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

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b style="color:#20804b;">Combinaison à l'Elu</b></h2>
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
                          <td>pu1=1,35G+1,50 Q </td>
                          <td>
                            <?php
                                 if($flexion_compose) { 
                                  echo round($pu)." daN";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td> Combinaison à ELU pu2=1,35G+1,50 (Q +ψ0V)</td>
                          <td>
                            <?php
                                 if($flexion_compose) { 
                                  echo round($CE)." daN";
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
                    <h2><b style="color:#20804b;">Combinaison à l'Els</b></h2>
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
                          <td>ELS court terme puEls1=G+ (Q+(ψ0Qi)</td>
                          <td>
                            <?php
                                 if($flexion_compose) { 
                                  echo round($ct)." daN";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>ELS long terme puEls3=(1+Kdef)*G+ (Q+(ψ0Qi)+Kdefψ2Qi)</td>
                          <td>
                            <?php
                                 if($flexion_compose) { 
                                  echo round($lt)." daN";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Combinaison accidentelle puca=G +(Y1+ψ2 Qi)</td>
                          <td>
                            <?php
                                 if($flexion_compose) { 
                                  echo round($Ca)." daN";
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
                    <h2><b style="color:#d46c1e;"><center>COMBINAISON EN SITUATION ACCIDENTELLE </center></b></h2>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b style="color:#20804b;">ACC</b></h2>
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
                          <td><H2>Pu</H2></td>
                          <td>
                            <?php
                                 if($flexion_compose) { 
                                  echo "<H2 style=color:red;>".$Ca." daN/m </H2>";
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
                                  echo " <H4 style=color:red;>".round($Ssi)." mm<SUP>2 </h4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td><h4>Largeur du consol en situation incendie  C,d,fi </h4></td>
                          <td>
                            <?php
                                 if($flexion_compose) { 
                                  echo " <H4 style=color:red;>".number_format($Lcsi, 0)." mm</H4>";
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
                                 if($flexion_compose) { 
                                  echo round($Pc)." mm";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                        <tr>
                          <td>containte normal Mu,d,fi = Fxe </td>
                          <td>
                            <?php
                                 if($flexion_compose) { 
                                  echo ($Cn)." mm<SUP>4";
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
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
                                 if($flexion_compose) { 
                                  echo round($Rfl, 2)." Mpa";
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
                                 if($flexion_compose) { 
                                  echo round($Rflx, 2)." Mpa";
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
                          <td><h4>Vérification de la compression axial </h4></td>
                          <td>
                            <?php
                                 if($flexion_compose) { 
                                  echo " <H4 style=color:red;>".round($Vca, 0)." % </H4>";
                                 } else {
                                  echo '';
                                 }
                             ?>
                          </td>
                        </tr>
                      </tbody>
                      </table>
              <center>
                <a href="<?php echo site_url(); ?>flexion_compose/update/<?php echo $p->flexion_compose_id; ?>"class="btn btn-success"><i class="fa fa-pencil"></i> Modifier</a>
                <a href="<?php echo site_url('flexion_compose'); ?>" class=" btn btn-primary"><i class="fa fa-reply"></i> Retour</a>
                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
              </center>
            </div>
          </div>
        </div>
        </div>
        </div>