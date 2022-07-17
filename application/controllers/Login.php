<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct(); 
	}
	
	function index(){
		$this->load->model('user_model');
		//Initialize Session ------------		
		if(isset($_SESSION['login'])&&($_SESSION['login']==1)&&(isset($_SESSION['user']))){
			redirect('operator/home');
		}
		//-------------------------------
		
		$this->load->view('login');
	}
	
	function auth(){
		$this->load->model('user_model');
		$this->user_model->login();
		
		if(isset($_SESSION['user'])){
			$id_grup	= $_SESSION['id_grup'];//$this->user_model->sesi_grup($_SESSION['sesi']);
			 
			//if($id_grup<=3){
				redirect('operator/manajemen'); 
			//}else{
			//	$_SESSION['err']=1;
			//	redirect('dashboard');
			//}
		}else{
			$_SESSION['err']="Username atau Password tidak dikenal";
			redirect('login');
		}
	}
	
	function auth1(){
		$this->load->model('user_model');
		$this->user_model->login();
		redirect('main');
	}

}
