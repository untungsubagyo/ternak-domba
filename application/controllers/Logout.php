<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		session_start();
	}
	
	function index(){
		$this->load->model('user_model');
		
			$_SESSION['login']=0;
			$_SESSION['success']  = 0;
			$_SESSION['per_page'] = 20;
			$_SESSION['cari']  = '';
			$_SESSION['pengumuman'] = 0;
			$this->user_model->logout();
		redirect('login');
	}

}
