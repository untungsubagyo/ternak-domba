<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"><!--<![endif]-->
<?php 
	$data['submenu']='dashboard';
	$this->load->view("headtitle",$data);
	$this->load->view("headtitle1",$data);
?>
<body class="page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header">
           <?php 
		   $this->load->view("headertop");
		   ?>
           <?php 
			$data['menu']=$menu;
			$this->load->view("headermenu",$data);
		   ?>
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">

            <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">     

                        </div>
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                
                <!-- END PAGE CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <?php //$this->load->view("footer"); ?>
	
	<!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/node-waves/waves.js"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-countto/jquery.countTo.js"></script>
    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/morrisjs/morris.js"></script>
	
    <!-- Custom Js --> 
   
 
	
    <!-- ChartJs -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.time.js"></script>
	</html>
</html>