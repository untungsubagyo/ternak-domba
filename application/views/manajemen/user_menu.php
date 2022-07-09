<!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets/images/photo/kuser.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo strtoupper($_SESSION['nama']);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>assets/images/photo/kuser.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo strtoupper($_SESSION['nama'])." - ".($_SESSION['id_grup']==1?"Administrator":($_SESSION['id_grup']==2?"KOPERASI":($_SESSION['id_grup']==3?"PROPINSI":"FARM")));?>
                  <!--small>Member Sejak Nov. 2018</small-->
                </p>
              </li>
              <!-- Menu Body -->
              <!--li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              <!--/li-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>