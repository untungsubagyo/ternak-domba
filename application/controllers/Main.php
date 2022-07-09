<?php
class Main extends CI_Controller{
	function __construct(){
		parent::__construct();
		session_start();
	}
	
	function index(){		
		if(isset($_SESSION['sesi'])){
			$this->load->model('user_model');
			$id_grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
			
			if($id_grup<=3){
				redirect('operator/home'); 
			}else{
				$_SESSION['err']=1;
				redirect('landing_page');
			}
		}else{
			$_SESSION['err']=1;		
			redirect('landing_page');
		}
	}	
}