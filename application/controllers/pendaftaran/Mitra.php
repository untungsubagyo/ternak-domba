<?php
class Mitra extends CI_Controller{
	function __construct(){
		parent::__construct(); 
		if(!isset($_SESSION['user'])){redirect("login");}
		$this->load->model('mitra_model');
	}
	function index(){
		$data['menu']="pendaftaran";
		$data['submenu']="mitra";
		$data['judul']="Pendaftaran Mitra";
		$this->load->view('layout/header',$data);
		$this->load->view('pendaftaran/mitra/table',$data);
		$this->load->view('pendaftaran/mitra/modal',$data);
		$this->load->view('layout/footer',$data);
	}
	
	function get_all(){
		$data=$this->mitra_model->list_data();
		echo json_encode($data);
	}

}
