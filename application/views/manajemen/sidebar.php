<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
<?php 
	$this->load->view('manajemen/sidebar_user_panel');
	$this->load->view('manajemen/search_form');
	$data['menu']=$menu;
	$data['submenu']=$submenu;
	$this->load->view('manajemen/sidebar_menu',$data);
?>
	</section>
    <!-- /.sidebar -->
  </aside>