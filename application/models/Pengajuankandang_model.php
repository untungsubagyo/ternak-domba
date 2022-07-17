<?php

class Pengajuankandang_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function list_data()
	{
		$this->db->select('pengajuan_kandang.*,mitra.nama');
		$this->db->join('mitra','mitra.mitra_id=pengajuan_kandang.mitra_id');
		$rs = $this->db->get('pengajuan_kandang');
		return $rs->result();
	}
	
	public function get_data_by_id($id)
	{
		$this->db->select('pengajuan_kandang.*,mitra.nama');
		$this->db->join('mitra','mitra.mitra_id=pengajuan_kandang.mitra_id');
		$this->db->where('pengajuan_id',$id);
		$rs = $this->db->get('pengajuan_kandang');
		
		return $rs->row_array();
	}
	public function save($data)
	{
		 
		$id= $data['pengajuan_id'];
		 
		if($id){
			$this->db->where('pengajuan_id',$id);
			$rs=$this->db->update('pengajuan_kandang',$data);
		}else
			$rs=$this->db->insert('pengajuan_kandang',$data);
		echo $this->db->last_query();
	}

	public function delete($id)
	{
		$this->db->where('pengajuan_id',$id);
		$rs=$this->db->delete('pengajuan_kandang');
		
		return $rs;
	}
}

?>
