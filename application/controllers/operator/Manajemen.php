<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajemen extends CI_Controller{

	function __construct(){
		parent::__construct(); 
		if(!isset($_SESSION['user'])) redirect('login');
		$this->load->model('user_model');
		 
		$this->load->library(array('fungsi'));
		//Initialize Session ------------
		//$_SESSION['success']  = 0;
		$_SESSION['per_page'] = 20;
		$_SESSION['cari']  = '';
		//-------------------------------		 
	}
	
	function index($id=""){
		$p=$this->uri->segment('3');
		$p=($p==0?"1":$p);
		$data['p']        = $p;
		if(isset($_POST['per_page'])) 
			$_SESSION['per_page']=$_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];
		$data['menu'] = 'home';
		$data['submenu']='dashboard';
		$data['id']=$id;
		 
		$this->load->view('manajemen/dashboard',$data); 
	}					
}
