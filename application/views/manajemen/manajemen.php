<!DOCTYPE html>
<html>
<?php $this->load->view('manajemen/heading');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
      <?php $this->load->view('manajemen/header');?>
      <?php $this->load->view('manajemen/sidebar');?>
      <?php $this->load->view('manajemen/content_wraper');?>
      <?php $this->load->view('manajemen/footer');?>
      <?php //$this->load->view('manajemen/control_sidebar');?>
</div>
<!-- ./wrapper -->

      <?php $this->load->view('manajemen/script');?>
</body>
</html>
