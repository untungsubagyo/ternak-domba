<?php
class Pembayaran_angsuran_kandang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['user'])) {
			redirect("login");
		}
		$this->load->model('pembayaran_angsuran_kandang_model');
	}

	public function index()
	{
		$data['menu'] = "transaksi";
		$data['submenu'] = "pembayaran_angsuran_kandang";
		$data['judul'] = "Transaksi Pembayaran Angsuran Kandang";
		$this->load->view('layout/header', $data);
		$this->load->view('transaksi/pembayaran_angsuran_kandang/table', $data);
		$this->load->view('transaksi/pembayaran_angsuran_kandang/modal', $data);
		$this->load->view('layout/footer', $data);
		$this->load->view('transaksi/pembayaran_angsuran_kandang/script', $data);
	}

	public function get_all()
	{
		$data = $this->pembayaran_angsuran_kandang_model->list_data();
		echo json_encode($data);
	}

	function get_data()
	{
		$kode = $this->input->get('id');
		$data = $this->pembayaran_angsuran_kandang_model->get_data_by_id($kode);
		echo json_encode($data);
	}

	public function save()
	{
		$data = $_POST;
		$this->pembayaran_angsuran_kandang_model->save($data);
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$data = $this->pembayaran_angsuran_kandang_model->delete($id);
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
			$targetDir = "assets/upload/pembayaran_angsuran_kandang/ktp/";
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
			$targetDir = "assets/upload/pembayaran_angsuran_kandang/sertifikat/";
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
}
