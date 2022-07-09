<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_password extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		session_start();
	}
	
	function index(){
		$this->load->model('user_model');
		
		//Initialize Session ------------
		$data['menu']='registrasi';
		$this->load->view('request_password',$data);
	}
}
