<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>

            <ul class="nav side-menu">

                  <li>
                    <a href="<?php echo site_url('home'); ?>">
                    <i class="fa fa-home"></i> Acceuil</a>
                  </li>

                      <?php //if($this->session->userdata("role_libelle") != 'Boss') { ?>
                  <li>
                    <a href="<?php echo site_url('bois'); ?>">
                    <i class="fa fa-align-justify"></i> bois</a>
                  </li>
                  <li><a><i class="fa fa-cogs"></i> Paramètre <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('stabilite'); ?>">Stabilite</a></li>
                      <li><a href="<?php echo site_url('categorie'); ?>">Catégorie</a></li>
                      <li><a href="<?php echo site_url('type_bois'); ?>">Type de Bois</a></li>
                      <li><a href="<?php echo site_url('coefficient'); ?>">Coefficient</a></li>
                      <li><a href="<?php echo site_url('klef'); ?>">Klef</a></li>
                    </ul>
                  </li>              
                  <li><a><i class="fa fa-folder-open-o"></i> Projet <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('emb_arriere'); ?>">Embrèvement Arrière</a></li>
                      <li><a href="<?php echo site_url('emb_avant'); ?>">Embrèvement Avant</a></li>
                      <li><a href="<?php echo site_url('emb_double'); ?>">Embrèvement Double</a></li>
                      <li><a href="<?php echo site_url('poincon'); ?>">Poinçon Contre-fiche</a></li>
                      <li><a href="<?php echo site_url('panne'); ?>">Flexion Compose</a></li>
                      <li><a href="<?php echo site_url('flexion_simple'); ?>">Flexion Simple</a></li>
                      <li><a href="<?php echo site_url('poteau_centre'); ?>">Poteau Centré</a></li>
                      <li><a href="<?php echo site_url('flexion_compose'); ?>">Colone en Flexion Composé</a></li>
                      <li><a href="<?php echo site_url('poutre'); ?>">Poutre en consol</a></li>
                      <li><a href="<?php echo site_url('compression'); ?>">Compression Axial</a></li>
                      <li><a href="<?php echo site_url('traction'); ?>">Traction Axial</a></li>
                    </ul>
                  </li>
                  <li>
                      <a href="<?php echo site_url('statistique'); ?>">
                      <i class="fa fa-line-chart"></i> Statistique</a>
                  </li>

                <?php //} else { ?>
                 
                <?php //} ?>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>