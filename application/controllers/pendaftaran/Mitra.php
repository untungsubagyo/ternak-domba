<?php
class Mitra extends CI_Controller{
	function __construct(){
		parent::__construct(); 
		if(!isset($_SESSION['user'])){redirect("login");}
		$this->load->model('mitra_model');
	}
	
	public function index()
	{
		$data['menu']="pendaftaran";
		$data['submenu']="mitra";
		$data['judul']="Pendaftaran Mitra";
		$this->load->view('layout/header',$data);
		$this->load->view('pendaftaran/mitra/table',$data);
		$this->load->view('pendaftaran/mitra/modal',$data);
		$this->load->view('layout/footer',$data);
		$this->load->view('pendaftaran/mitra/script',$data);
	}
	
	public function get_all()
	{
		$data=$this->mitra_model->list_data();
		echo json_encode($data);
	}

	function get_data(){
		$kode=$this->input->get('id');
		$data=$this->mitra_model->get_data_by_id($kode);
		echo json_encode($data);
	}

	public function save()
	{
		$data=$_POST; 
		$this->mitra_model->save($data);
	}

	public function delete()
	{
		$id=$this->input->post('id');
		$data=$this->mitra_model->delete($id);
		echo json_encode($data);
	}

}
