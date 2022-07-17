<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $judul;?> | Sistem Pendataan Domba KOIN</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url();?>assets/template/adminbsb/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?php echo base_url();?>assets/css/roboto.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/materialicons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/css/style.css" rel="stylesheet">
	
	<!-- Bootstrap Select Css -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url();?>assets/template/adminbsb/css/themes/all-themes.css" rel="stylesheet" />
	
    <link href="<?php echo base_url();?>assets/css/autosuggest/jquery.coolautosuggest.css" rel="stylesheet" />
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
            
            <?php $this->load->view('manajemen/sidebar_menu_bsb');?>
            
            <?php $this->load->view('manajemen/footer_bsb');?>
        </aside>
        <!-- #END# Left Sidebar -->
        <?php $this->load->view('manajemen/right_side_bar_bsb');?>
    </section>
