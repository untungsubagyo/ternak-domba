<?php

class Limbah_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function list_data()
	{
		$rs = $this->db->get('limbah');
		return $rs->result();
	}
	
	public function get_data_by_id($id)
	{
		$this->db->where('limbah_id',$id);
		$rs = $this->db->get('limbah');
		
		return $rs->row_array();
	}
	public function save($data)
	{
		 
		$id= $data['limbah_id_edit'];
		unset($data['limbah_id_edit']);

		if($data['password']){
			$data['password']=md5($data['password']);
		}else{
			unset($data['password']);
		}
		if($id){
			$this->db->where('limbah_id',$id);
			$rs=$this->db->update('limbah',$data);
		}else
			$rs=$this->db->insert('limbah',$data);
		echo $this->db->last_query();
	}

	public function delete($id)
	{
		$this->db->where('limbah_id',$id);
		$rs=$this->db->delete('limbah');
		
		return $rs;
	}
}

?>
