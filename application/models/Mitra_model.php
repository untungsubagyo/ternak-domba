<?php

class Mitra_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	public function list_data()
	{
		$rs = $this->db->get('mitra');
		return $rs;
	}
	
}

?>