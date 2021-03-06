<?php
class Mitra extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['user'])) {
			redirect("login");
		}
		$this->load->model('mitra_model');
	}

	public function index()
	{
		$data['menu'] = "pendaftaran";
		$data['submenu'] = "mitra";
		$data['judul'] = "Pendaftaran Mitra";
		$this->load->view('layout/header', $data);
		$this->load->view('pendaftaran/mitra/table', $data);
		$this->load->view('pendaftaran/mitra/modal', $data);
		$this->load->view('layout/footer', $data);
		$this->load->view('pendaftaran/mitra/script', $data);
	}

	public function get_all()
	{
		$data = $this->mitra_model->list_data();
		echo json_encode($data);
	}

	function get_data()
	{
		$kode = $this->input->get('id');
		$data = $this->mitra_model->get_data_by_id($kode);
		echo json_encode($data);
	}

	public function save()
	{
		$data = $_POST;
		$this->mitra_model->save($data);
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$data = $this->mitra_model->delete($id);
		echo json_encode($data);
	}

	public function upload_ktp()
	{
		if (isset($_POST) == true) {
			//menghasilkan nama file yang unik, akan ada angka acak didepannya
			$path = $_FILES['file']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$namaFile = time() . '_' . hexdec(uniqid()).".".$ext;

			//folder upload
			$targetDir = "assets/upload/mitra/ktp/";
			$targetFilePath = $targetDir . $namaFile;

			//membolehkan ekstensiOk file tertentu
			$ekstensiFile = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			$ekstensiOk = array('jpg', 'png', 'jpeg', 'gif');

			if (in_array($ekstensiFile, $ekstensiOk)) {
				//upload file ke server
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
					//memasukkan file data ke dalam database jika diperlukan
					//........
					$respon['status'] = 'ok';
					$respon['name'] = $namaFile;
				} else {
					$respon['status'] = 'err';
				}
			} else {
				$respon['status'] = 'type_err';
			}

			//menampilkan data respon dalam format JSON
			echo json_encode($respon);
		}
	}
	public function upload_sertifikat()
	{
		if (isset($_POST) == true) {
			//menghasilkan nama file yang unik, akan ada angka acak didepannya
			$path = $_FILES['file']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$namaFile = time() . '_' . hexdec(uniqid()).".".$ext;

			//folder upload
			$targetDir = "assets/upload/mitra/sertifikat/";
			$targetFilePath = $targetDir . $namaFile;

			//membolehkan ekstensiOk file tertentu
			$ekstensiFile = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			$ekstensiOk = array('jpg', 'png', 'jpeg', 'gif');

			if (in_array($ekstensiFile, $ekstensiOk)) {
				//upload file ke server
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
					//memasukkan file data ke dalam database jika diperlukan
					//........
					$respon['status'] = 'ok';
					$respon['name'] = $namaFile;
				} else {
					$respon['status'] = 'err';
				}
			} else {
				$respon['status'] = 'type_err';
			}

			//menampilkan data respon dalam format JSON
			echo json_encode($respon);
		}
	}
	public function get_nama()
	{
		$nama = $this->uri->segment(4);
		$this->db->like('nama',"$nama");
		$rs=$this->db->get('mitra'); 
		if ($rs->num_rows() > 0) {
			foreach ($rs->result() as $row) {
				// Store data in array
				$arr[] = array( 
					"mitra_id" => $row->mitra_id,
					"data" => $row->nama,
					"description" => $row->nama,
				);
			}
		} else {
			$arr[] = array(
				 
				"mitra_id" => "-",
				"data" => "Mitra tidak ditemukan",
				"description" => "Tidak ditemukan"
			);
		}
		echo json_encode($arr);
	}
}
