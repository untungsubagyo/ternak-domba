<?php

class Domba_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function list_data()
	{
		$rs = $this->db->get('domba');
		return $rs->result();
	}
	
	public function get_data_by_id($id)
	{
		$this->db->where('domba_id',$id);
		$rs = $this->db->get('domba');
		
		return $rs->row_array();
	}
	public function save($data)
	{
		 
		$id= $data['domba_id_edit'];
		unset($data['domba_id_edit']);

		if($data['password']){
			$data['password']=md5($data['password']);
		}else{
			unset($data['password']);
		}
		if($id){
			$this->db->where('domba_id',$id);
			$rs=$this->db->update('domba',$data);
		}else
			$rs=$this->db->insert('domba',$data);
		echo $this->db->last_query();
	}

	public function delete($id)
	{
		$this->db->where('domba_id',$id);
		$rs=$this->db->delete('domba');
		
		return $rs;
	}
}

?>
