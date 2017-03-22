<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>

            <ul class="nav side-menu">

                  <li>
                    <a href="<?php echo site_url('home'); ?>">
                    <i class="fa fa-home"></i> Acceuil</a>
                  </li>

                <?php if($this->session->userdata("role_libelle") != 'Boss') { ?>

                  <li>
                      <a href="<?php echo site_url('programme'); ?>">
                      <i class="fa fa-edit"></i> Programmes</a>
                  </li>

                  <li>
                      <a href="<?php echo site_url('famille'); ?>">
                      <i class="fa fa-group"></i> Famille</a>
                  </li>

                  <li>
                      <a href="<?php echo site_url('adherant'); ?>">
                      <i class="fa fa-male"></i> Adherant</a>
                  </li>

                  <li>
                      <a>
                          <i class="fa fa-briefcase"></i> Article <span class="fa fa-chevron-down"></span>
                      </a>
                      <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('package'); ?>">Package</a></li>
                      <li><a href="<?php echo site_url('articletype'); ?>">Type article</a></li>
                      <li><a href="<?php echo site_url('article'); ?>">Article</a></li>
                    </ul>
                  </li>
                  
                  <li>
                      <a href="<?php echo site_url('materiel'); ?>">
                      <i class="fa fa-cubes"></i> Matériel</a>
                  </li>

                  <li>
                      <a>
                          <i class="fa fa-institution"></i> Batiment <span class="fa fa-chevron-down"></span>
                      </a>
                      <ul class="nav child_menu">
                        <li><a href="<?php echo site_url('batiment'); ?>">Batiment</a></li>
                        <li><a href="<?php echo site_url('salle'); ?>">Salle</a></li>
                        <li><a href="<?php echo site_url('salleadherant'); ?>">Salle - Adhérant</a></li>
                      </ul>
                  </li>

                  <li>
                      <a>
                          <i class="fa fa-arrows"></i> Méditation <span class="fa fa-chevron-down"></span>
                      </a>
                      <ul class="nav child_menu">
                          <li><a href="<?php echo site_url('semaine'); ?>">Semaine</a></li>
                          <li><a href="<?php echo site_url('meditation'); ?>">Meditation</a></li>
                          <li><a href="<?php echo site_url('presence'); ?>">Présence</a></li>
                      </ul>
                  </li>

                <?php } else { ?>
                  <li>
                      <a href="<?php echo site_url('adherant'); ?>">
                      <i class="fa fa-male"></i> Adherant</a>
                  </li>
                <?php } ?>

                </ul>
              </div>

           <?php if($this->session->userdata("role_libelle") != 'Boss') { ?>
              <div class="menu_section">
                <h3>Gestion</h3>
                <ul class="nav side-menu">
                  <li>
                      <a>
                          <i class="fa fa-ambulance"></i> Gestion des malades <span class="fa fa-chevron-down"></span>
                      </a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('malade'); ?>">Malade</a></li>
                      <li><a href="<?php echo site_url('traitement'); ?>">Traitement</a></li>
                    </ul>
                  </li>                  
                </ul>
              </div>

          <?php } ?>

            </div>
            <!-- /sidebar menu -->


             <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>