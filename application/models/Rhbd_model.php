<?php

class Rhbd_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function list_data()
	{
		$rs = $this->db->get('rhbd');
		return $rs->result();
	}
	
	public function get_data_by_id($id)
	{
		$this->db->where('rhbd_id',$id);
		$rs = $this->db->get('rhbd');
		
		return $rs->row_array();
	}
	public function save($data)
	{
		 
		$id= $data['rhbd_id_edit'];
		unset($data['rhbd_id_edit']);

		if($data['password']){
			$data['password']=md5($data['password']);
		}else{
			unset($data['password']);
		}
		if($id){
			$this->db->where('rhbd_id',$id);
			$rs=$this->db->update('rhbd',$data);
		}else
			$rs=$this->db->insert('rhbd',$data);
		echo $this->db->last_query();
	}

	public function delete($id)
	{
		$this->db->where('rhbd_id',$id);
		$rs=$this->db->delete('rhbd');
		
		return $rs;
	}
}

?>
