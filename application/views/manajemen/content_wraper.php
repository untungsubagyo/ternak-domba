<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>e-Ternak</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php //$this->load->view('manajemen/info_boxes');?>
      <?php //$this->load->view('manajemen/monthly_recap');?>

      

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <?php //$this->load->view('manajemen/visitors');?>
          <div class="row">
            <div class="col-md-6">
				<?php //$this->load->view('manajemen/direct_chat');?>
            </div>
            <!-- /.col -->

            <div class="col-md-6">
				<?php //$this->load->view('manajemen/latest_members');?>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
			<?php //$this->load->view('manajemen/latest_orders');?>
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <?php //$this->load->view('manajemen/info_box2');?>
          <?php //$this->load->view('manajemen/browser_usage');?>
          <?php //$this->load->view('manajemen/product_list');?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->