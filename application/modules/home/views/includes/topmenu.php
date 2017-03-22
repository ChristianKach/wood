<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" 
                  data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/template/images/user.png" alt="">

                    <?php echo $this->session->userdata("user_username") ? $this->session->userdata("user_username") : ""; ?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span> Paramètres</span>
                      </a>
                    </li>
                    <li><a href="http://www.matlle.com">Aide</a></li>
                    <li><a href="<?php echo site_url('user/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Déconnexion</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->