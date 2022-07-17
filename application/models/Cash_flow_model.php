<?php

class Cash_flow_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function list_data()
	{
		$rs = $this->db->get('mitra');
		return $rs->result();
	}
	
	public function get_data_by_id($id)
	{
		$this->db->where('mitra_id',$id);
		$rs = $this->db->get('mitra');
		
		return $rs->row_array();
	}
	public function save($data)
	{
		 
		$id= $data['mitra_id_edit'];
		unset($data['mitra_id_edit']);

		if($data['password']){
			$data['password']=md5($data['password']);
		}else{
			unset($data['password']);
		}
		if($id){
			$this->db->where('mitra_id',$id);
			$rs=$this->db->update('mitra',$data);
		}else
			$rs=$this->db->insert('mitra',$data);
		echo $this->db->last_query();
	}

	public function delete($id)
	{
		$this->db->where('mitra_id',$id);
		$rs=$this->db->delete('mitra');
		
		return $rs;
	}
}

?>
