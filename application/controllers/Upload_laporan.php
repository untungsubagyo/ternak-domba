<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_laporan extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		session_start();
	}
	
	function index(){
		if(isset($_SESSION['sesi'])){
			$this->load->model('user_model');
			$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
			if($grup>=1){
				redirect('upload_laporan'); 
			}else{
				$_SESSION['err']=1;
				redirect('dashboard');
			}
		}else{
			$_SESSION['err']=1;		
			redirect('dashboard');
		}
	}

}
