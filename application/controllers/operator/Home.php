<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		session_start();
		
		$this->load->model('user_model');
		
		if(!isset($_SESSION['user'])) redirect('login');
		
		$this->load->library(array('fungsi'));
		//Initialize Session ------------
		//$_SESSION['success']  = 0;
		$_SESSION['per_page'] = 20;
		$_SESSION['cari']  = '';
		//-------------------------------		 
	}
	
	function index(){
		redirect('operator/manajemen');
		$p=$this->uri->segment('3');
		$p=($p==0?"1":$p);
		$data['p']        = $p;
		if(isset($_POST['per_page'])) 
			$_SESSION['per_page']=$_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];
		$data['menu'] = 'dashboard';
		$_SESSION['menu'] = 'dashboard';
		$_SESSION['submenu']='';
		if(isset($_SESSION['sesi']))
			$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
		else
			$grup=null;
		$header['grup']=$grup;
		
		 
		$this->load->view('operator/dashboard',$data); 
	}	
	
	function tunggu(){
		$this->load->view('operator/tunggu'); 
	}
}