<?php

class Kandang_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function list_data()
	{
		$this->db->select('kandang.*,mitra.nama,mitra.alamat,pengajuan_kandang.luas_lahan');
		$this->db->join('pengajuan_kandang','pengajuan_kandang.pengajuan_id=kandang.pengajuan_id');
		$this->db->join('mitra','mitra.mitra_id=pengajuan_kandang.mitra_id');
		$rs = $this->db->get('kandang');
		return $rs->result();
	}
	
	public function list_data_bast()
	{
		$this->db->select('kandang.*,mitra.nama,mitra.alamat,pengajuan_kandang.luas_lahan');
		$this->db->join('pengajuan_kandang','pengajuan_kandang.pengajuan_id=kandang.pengajuan_id');
		$this->db->join('mitra','mitra.mitra_id=pengajuan_kandang.mitra_id');
		$this->db->where('tanggal_bast != ','0000-00-00');
		$rs = $this->db->get('kandang');
		// echo $this->db->last_query();
		return $rs->result();
	}
	
	public function get_data_by_id($id)
	{
		$this->db->select('kandang.*,mitra.nama,mitra.alamat,pengajuan_kandang.luas_lahan');
		$this->db->join('pengajuan_kandang','pengajuan_kandang.pengajuan_id=kandang.pengajuan_id');
		$this->db->join('mitra','mitra.mitra_id=pengajuan_kandang.mitra_id');
		$this->db->where('kandang_id',$id);
		$rs = $this->db->get('kandang');
		
		return $rs->row_array();
	}
	
	public function save($data)
	{
		if(isset($data['kandang_id']))
			$id= $data['kandang_id'];
		else
			$id="";
		 
		if($id){
			$this->db->where('kandang_id',$id);
			$rs=$this->db->update('kandang',$data);
		}else
			$rs=$this->db->insert('kandang',$data); 
	}
	public function save_bast($data)
	{ 
		$id= $data['kandang_id'];
		 
			$this->db->where('kandang_id',$id);
			$rs=$this->db->update('kandang',$data);
			echo $this->db->last_query();
		 
	}

	public function delete($id)
	{
		$this->db->where('pengajuan_id',$id);
		$rs=$this->db->delete('kandang');
		
		return $rs;
	}
}

?>
