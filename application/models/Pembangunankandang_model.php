<?php

class Pembangunankandang_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function list_data()
	{
		$this->db->select('pembangunan_kandang.*,mitra.nama,mitra.alamat,pengajuan_kandang.luas_lahan');
		$this->db->join('pengajuan_kandang','pengajuan_kandang.pengajuan_id=pembangunan_kandang.pengajuan_id');
		$this->db->join('mitra','mitra.mitra_id=pengajuan_kandang.mitra_id');
		$rs = $this->db->get('pembangunan_kandang');
		return $rs->result();
	}
	
	public function list_data_bast()
	{
		$this->db->select('pembangunan_kandang.*,mitra.nama,mitra.alamat,pengajuan_kandang.luas_lahan');
		$this->db->join('pengajuan_kandang','pengajuan_kandang.pengajuan_id=pembangunan_kandang.pengajuan_id');
		$this->db->join('mitra','mitra.mitra_id=pengajuan_kandang.mitra_id');
		$this->db->where('tanggal_bast != ','0000-00-00');
		$rs = $this->db->get('pembangunan_kandang');
		// echo $this->db->last_query();
		return $rs->result();
	}
	
	public function get_data_by_id($id)
	{
		$this->db->select('pembangunan_kandang.*,mitra.nama,mitra.alamat,pengajuan_kandang.luas_lahan');
		$this->db->join('pengajuan_kandang','pengajuan_kandang.pengajuan_id=pembangunan_kandang.pengajuan_id');
		$this->db->join('mitra','mitra.mitra_id=pengajuan_kandang.mitra_id');
		$this->db->where('pembangunan_id',$id);
		$rs = $this->db->get('pembangunan_kandang');
		
		return $rs->row_array();
	}
	
	public function save($data)
	{
		if(isset($data['pembangunan_id']))
			$id= $data['pembangunan_id'];
		else
			$id="";
		 
		if($id){
			$this->db->where('pembangunan_id',$id);
			$rs=$this->db->update('pembangunan_kandang',$data);
		}else
			$rs=$this->db->insert('pembangunan_kandang',$data); 
	}
	public function save_bast($data)
	{ 
		$id= $data['pembangunan_id'];
		 
			$this->db->where('pembangunan_id',$id);
			$rs=$this->db->update('pembangunan_kandang',$data);
			echo $this->db->last_query();
		 
	}

	public function delete($id)
	{
		$this->db->where('pengajuan_id',$id);
		$rs=$this->db->delete('pembangunan_kandang');
		
		return $rs;
	}
}

?>
