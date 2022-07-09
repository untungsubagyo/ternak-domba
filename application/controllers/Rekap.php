<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekap extends CI_Controller{

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
		 
		$p=$this->uri->segment('3');
		$p=($p==0?"1":$p);
		$data['p']        = $p;
		if(isset($_POST['per_page'])) 
			$_SESSION['per_page']=$_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];
		$data['menu'] = 'Rekap';
		$data['submenu']='dashboard';
		 
		
		$this->load->view('rekap/verifikasi',$data); 
	}
	
	function verifikasi(){
		 
		$p=$this->uri->segment('3');
		$p=($p==0?"1":$p);
		$data['p']        = $p;
		if(isset($_POST['per_page'])) 
			$_SESSION['per_page']=$_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];
		$data['menu'] = 'rekap';
		$data['submenu']='verifikasi';
		 
		
		$this->load->view('rekap/verifikasi',$data); 
	}
	
	function kinerja(){
		 
		$p=$this->uri->segment('3');
		$p=($p==0?"1":$p);
		$data['p']        = $p;
		if(isset($_POST['per_page'])) 
			$_SESSION['per_page']=$_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];
		$data['menu'] = 'rekap';
		$data['submenu']='verifikasi';
		 
		
		$this->load->view('rekap/kinerja',$data); 
	}
	
	function verifikasi_detail(){
		 
		$p=$this->uri->segment('3');
		
		$p=($p==0?"1":$p);
		
		$data['p']        = $p;
		if(isset($_POST['per_page'])) 
			$_SESSION['per_page']=$_POST['per_page'];
		$data['npsn']=$p;
		$data['per_page'] = $_SESSION['per_page'];
		$data['menu'] = 'rekap';
		$data['submenu']='verifikasi';
		 
		
		$this->load->view('rekap/verifikasi_detail',$data); 
	}					
}