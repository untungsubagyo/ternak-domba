<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing_page extends CI_Controller {
	function __construct(){
		parent::__construct(); 
	}
	
	function index($id=""){
		$this->load->model('user_model');
		//Initialize Session ------------
		if(!isset($_SESSION['login'])){
			$_SESSION['login']=0;
			$_SESSION['success']  = 0;
			$_SESSION['per_page'] = 20;
			$_SESSION['cari']  = '';
			$_SESSION['pengumuman'] = 0;
			$this->user_model->logout();
		}
		//-------------------------------
		$data['id']=$id;
		$data['menu']="landing_page";
		$this->load->view('landing_page',$data);
	}
	   
	function auth(){
		$this->load->model('user_model');
		$this->user_model->login();
		redirect('main');
	}
}
