<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Manajemen Pendataan Domba KOIN</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/css/css.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/template/adminbsb/css/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url();?>assets/template/adminbsb/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <?php $this->load->view('manajemen/top_bar_bsb');?>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <?php $this->load->view('manajemen/user_info_bsb');?>
            <!-- Menu -->
            <div class="menu">
                 <?php $this->load->view('manajemen/sidebar_menu_bsb');?>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2022 <a href="javascript:void(0);">Pendataan Domba KOIN</a>.
                </div>
                <div class="version">
                    
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
		 
			 
        </div>
    </section>

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
    <script>
	<?php
		if($id=="sapi"){
	?>
		$(function () {
			getMorris('line', 'line_chart');
			getMorris('bar', 'bar_chart'); 
			getMorris('bar1', 'bar_chart1'); 
			getMorris('bar2', 'bar_chart2'); 
		});
		<?php }else if($id=="ayam"){ ?>
		$(function () {
			
			getMorris('ayam_per_bangsa', 'ayam_per_bangsa'); 
			getMorris('produksi_doc_4_tahun_terakhir', 'produksi_doc_4_tahun_terakhir'); 
		});
			<?php } ?>
		function getMorris(type, element) {
           
			if (type === 'line') {
                 $.ajax({
                    type:"ajax",
                    url:"<?php echo base_url();?>reproduksi/kelahiransapi/get_rekap_per_tahun",
                    async:false,
                    dataType:"json",
                    success:function(data){
                        Morris.Line({
                            element: element,
                            data: data,
                            xkey: 'tahun',
                            ykeys: ['n'],
                            labels: ['Jumlah Kelahiran'],
                            lineColors: ['rgb(233, 30, 99)'],
                            lineWidth: 3
                        });         
                    }
                })
				
			} else if (type === 'bar') {
                $.ajax({
                    type:"ajax",
                    url:"<?php echo base_url();?>populasi/sapi/get_rekap_per_bangsa",
                    async:false,
                    dataType:"json",
                    success:function(data){
                        Morris.Bar({
                            element: element,
                            data: data,
                            xkey: 'nama',
                            ykeys: ['jumlah'],
                            labels: ['Jumlah'],
                            barColors: [ 'rgb(0, 188, 212)'],
                        });
                    }
                })
				
			}  else if (type === 'bar1') {
                $.ajax({
                    type:"ajax",
                    url:"<?php echo base_url();?>populasi/sapi/get_rekap_per_sex_per_bangsa",
                    async:false,
                    dataType:"json",
                    success:function(data){
                        Morris.Bar({
                            element: element,
                            data: data,
                            xkey: 'bangsa',
                            ykeys: ['jantan','betina'],
                            labels: ['Jantan','Betina'],
                            barColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)'],
                        });
                    }
                })
				
			}else if (type === 'bar2') {
                $.ajax({
                    type:"ajax",
                    url:"<?php echo base_url();?>populasi/sapi/get_rekap_per_golongan_umur_per_bangsa",
                    async:false,
                    dataType:"json",
                    success:function(data){
                        Morris.Bar({
                            element: element,
                            data: data,
                            xkey: 'bangsa',
                            ykeys: ['pedet','muda','dewasa'],
                            labels: ['Pedet','Muda','Dewasa'],
                            barColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)'],
                        });
                    }
                })
				
			} else if (type === 'ayam_per_bangsa') {
				
                $.ajax({
                    type:"ajax",
                    url:"<?php echo base_url();?>landing_page/get_rekap_ayam_per_bangsa",
                    async:false,
                    dataType:"json",
                    success:function(data){
                        Morris.Bar({
                            element: element,
                            data: data,
                            xkey: 'nama',
                            ykeys: ['jumlah_jantan','jumlah_betina','jumlah_unsex'],
                            labels: ['Jantan','Betina','Unsex'],
                            barColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)'],
                        });
                    }
                })
				
			} else if (type === 'produksi_doc_4_tahun_terakhir') {
				
                $.ajax({
                    type:"ajax",
                    url:"<?php echo base_url();?>landing_page/get_produksi_doc_4_tahun_terakhir",
                    async:false,
                    dataType:"json",
                    success:function(data){
                        Morris.Line({
                            element: element,
                            data: data,
                            xkey: 'tahun',
                            ykeys: ['nilai'],
                            labels: ['Jumlah Produksi'],
                            lineColors: ['rgb(233, 30, 99)'],
                            lineWidth: 3
                        });         
                    }
                })
				
			}
		}
	</script>
 
	
    <!-- ChartJs -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/template/adminbsb/js/admin.js"></script>
</body>

</html>