<?php

class Obat_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function list_data()
	{
		$rs = $this->db->get('obat');
		return $rs->result();
	}
	
	public function get_data_by_id($id)
	{
		$this->db->where('obat_id',$id);
		$rs = $this->db->get('obat');
		
		return $rs->row_array();
	}
	public function save($data)
	{
		 
		$id= $data['obat_id_edit'];
		unset($data['obat_id_edit']);

		if($data['password']){
			$data['password']=md5($data['password']);
		}else{
			unset($data['password']);
		}
		if($id){
			$this->db->where('obat_id',$id);
			$rs=$this->db->update('obat',$data);
		}else
			$rs=$this->db->insert('obat',$data);
		echo $this->db->last_query();
	}

	public function delete($id)
	{
		$this->db->where('obat_id',$id);
		$rs=$this->db->delete('obat');
		
		return $rs;
	}
}

?>
