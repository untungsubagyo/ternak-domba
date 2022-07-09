<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		session_start();
	}
	
	function index(){
		$this->load->model('user_model');
		
		//Initialize Session ------------
		$data['menu']='download';
		$this->load->view('download',$data);
	}

}
