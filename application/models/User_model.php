<?php

class User_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function login(){
		$username = $this->input->post('_username'); 
		$password = md5($this->input->post('_password'));
		
		$sql = "SELECT user_id,user_nama,level_id,user_username,user_password,user_aktif,user_logincount,user_email,user_theme,session  FROM web_user WHERE user_username=?";
		$query=$this->db->query($sql,array($username));
		
		$row=$query->row(); 
		
		
		if(($password==$row->user_password)){
			
			$_SESSION['login']    = 1;
			//$_SESSION['sesi']     = $row->session;
			
			$_SESSION['user']     = $row->user_id;
			$_SESSION['nama']     = $row->user_nama;
			$_SESSION['email']     = $row->user_email;
			
			$_SESSION['id_grup']    = $row->level_id;
			$_SESSION['per_page'] = 20;
			
		}
		else{
			$_SESSION['login']=-1;
		}
	}
	
	 
	
	function sesi_grup($sesi=''){
		
		/*$sql = "SELECT level_id FROM web_user WHERE session=?";
		$query=$this->db->query($sql,array($sesi));
		$row=$query->row();
		*/
		return $_SESSION['id_grup'];//$row->level_id;
	}
	
	function logout(){
		if(isset($_SESSION['user'])){
			$id = $_SESSION['user'];
			$sql = "UPDATE web_user SET last_login=NOW() WHERE user_id=?";
			$this->db->query($sql, $id);
			
			$log['id_user']	= $id;
			//$log['log']		= NOW();
			//$this->db->insert('user_log', $log);
		}
		
		unset($_SESSION['err']);
		unset($_SESSION['user']);
		unset($_SESSION['sesi']);
		unset($_SESSION['cari']);
		unset($_SESSION['filter']);
		unset($_SESSION['id_grup']);
	}
	
	
	function autocomplete(){
		$sql   = "SELECT user_username FROM web_user
					UNION SELECT user_nama FROM web_user";
		$query = $this->db->query($sql);
		$data  = $query->result_array();
		
		$i=0;
		$outp='';
		while($i<count($data)){
			$outp .= ",'" .$data[$i]['user_username']. "'";
			$i++;
		}
		$outp = strtolower(substr($outp, 1));
		$outp = '[' .$outp. ']';
		return $outp;
	}
	
	
	function search_sql(){
		if(isset($_SESSION['cari'])){
		$cari = $_SESSION['cari'];
			$kw = $this->db->escape_like_str($cari);
			$kw = '%' .$kw. '%';
			$search_sql= " AND (u.username LIKE '$kw' OR u.nama LIKE '$kw')";
			return $search_sql;
			}
		}
	
	function filter_sql(){		
		if(isset($_SESSION['filter'])){
			$kf = $_SESSION['filter'];
			$filter_sql= " AND u.id_grup = $kf";
		return $filter_sql;
		}
	}
	
	
	function paging($p=1,$o=0){
	
		$sql      = "SELECT COUNT(id) AS id FROM user u WHERE 1";
		$sql     .= $this->search_sql();     
		$query    = $this->db->query($sql);
		$row      = $query->row_array();
		$jml_data = $row['id'];
		
		$this->load->library('paging');
		$cfg['page']     = $p;
		$cfg['per_page'] = $_SESSION['per_page'];
		$cfg['num_rows'] = $jml_data;
		
		$this->paging->init($cfg);
		
		return $this->paging;
	}
	
	
	function list_data($o=0,$offset=0,$limit=500){
	
		//Ordering SQL
		switch($o){
			case 1: $order_sql = ' ORDER BY u.username'; break;
			case 2: $order_sql = ' ORDER BY u.username DESC'; break;
			case 3: $order_sql = ' ORDER BY u.nama'; break;
			case 4: $order_sql = ' ORDER BY u.nama DESC'; break;
			case 5: $order_sql = ' ORDER BY g.nama'; break;
			case 6: $order_sql = ' ORDER BY g.nama DESC'; break;
			case 7: $order_sql = ' ORDER BY u.last_login'; break;
			case 8: $order_sql = ' ORDER BY u.last_login DESC'; break;
			default:$order_sql = ' ORDER BY u.id_grup,id_urusan,id_bidang,id_unit,id_sub_unit,username';
		}
	
		//Paging SQL
		$paging_sql = ' LIMIT ' .$offset. ',' .$limit;
		
		//Main Query
		$sql   = "SELECT u.*,g.nama as grup,(SELECT nama FROM user WHERE id=u.id_parent_skpd) AS sub_skpd
					FROM user u, user_grup g 
					WHERE u.id_grup = g.id";
			
		$sql .= $this->search_sql();
		$sql .= $this->filter_sql();
		$sql .= $order_sql;
		$sql .= $paging_sql;
		
		$query = $this->db->query($sql);
		$data=$query->result_array();
		
		//Formating Output
		$i=0;
		$j=$offset;
		while($i<count($data)){
			$data[$i]['no']=$j+1;
			
			
			//$log['id_user']	= $data[$i]['id'];
			//$log['log']		= "NOW()";
			//$this->db->insert('user_log', $log);
			
			$i++;
			$j++;
		}
		return $data;
	}
	
	function get_nama($id_skpd){
		$sql="SELECT nama FROM user WHERE id='$id_skpd'";
		$rs=$this->db->query($sql);
		$row=$rs->row();
		return $row->nama;
	}
	function get_kode_unit($id_skpd){
		$sql="SELECT concat(id_urusan,'.',LPAD(id_bidang,2,'0'),'.',LPAD(id_unit,2,'0'),'.',LPAD(id_sub_unit,2,'0')) kode_unit FROM user WHERE id='$id_skpd'";
		$rs=$this->db->query($sql);
		$row=$rs->row();
		return $row->kode_unit;
	}
	function list_data_userlapor($tahun=0,$bulan=0,$o=0,$offset=0,$limit=500){
	
		//Ordering SQL
		/*switch($o){
			case 1: $order_sql = ' ORDER BY u.username'; break;
			case 2: $order_sql = ' ORDER BY u.username DESC'; break;
			case 3: $order_sql = ' ORDER BY u.nama'; break;
			case 4: $order_sql = ' ORDER BY u.nama DESC'; break;
			case 5: $order_sql = ' ORDER BY g.nama'; break;
			case 6: $order_sql = ' ORDER BY g.nama DESC'; break;
			default:$order_sql = ' ORDER BY u.username';
		}*/
	
		//Paging SQL
		
		if($bulan=="0"){
			if(date('m')>1){
				$bulan=date('m')-1;
			}else{
				$tahun--;
				$bulan=12;
			}
		}else{
			if($bulan>1){
				$bulan--;
			}else{
				$tahun--;
				$bulan=12;
			}
		}
		$paging_sql = ' LIMIT ' .$offset. ',' .$limit;
		
		//Main Query
		$sql="SELECT nama,id
		,(SELECT count(*) FROM target WHERE tahun='$tahun' AND id_skpd=`user`.id) ntarget 
		,(SELECT count(*) FROM target WHERE tahun='$tahun' and bulan='$bulan' AND id_skpd=`user`.id and ((bp_sp2d+bm_sp2d+bb_sp2d)>0)) nsp2d 
		,(SELECT count(*) FROM target WHERE tahun='$tahun' and bulan='$bulan' AND id_skpd=`user`.id and ((bp_spj+bm_spj+bb_spj)>0)) nspj 
		from `user` WHERE id_grup='3' ";
		$sql .= $paging_sql;
			$rs=$this->db->query($sql);
			
		/*$sql .= $this->search_sql();
		$sql .= $this->filter_sql();
		$sql .= $order_sql;
		$sql .= $paging_sql;
		*/
		$query = $this->db->query($sql);
		//$data=$query->result_array();
		
		//Formating Output
		$i=0;
		$j=$offset;
		/*while($i<count($data)){
			$data[$i]['no']=$j+1;
			
			
			//$log['id_user']	= $data[$i]['id'];
			//$log['log']		= "NOW()";
			//$this->db->insert('user_log', $log);
			
			$i++;
			$j++;
		}*/
		return $query;
	}
	function list_data_skpdlapor($tahun=0,$o=0,$offset=0,$limit=500){
	
		//Ordering SQL
		/*switch($o){
			case 1: $order_sql = ' ORDER BY u.username'; break;
			case 2: $order_sql = ' ORDER BY u.username DESC'; break;
			case 3: $order_sql = ' ORDER BY u.nama'; break;
			case 4: $order_sql = ' ORDER BY u.nama DESC'; break;
			case 5: $order_sql = ' ORDER BY g.nama'; break;
			case 6: $order_sql = ' ORDER BY g.nama DESC'; break;
			default:$order_sql = ' ORDER BY u.username';
		}*/
	
		//Paging SQL
		
		$paging_sql = ' LIMIT ' .$offset. ',' .$limit;
		
		//Main Query
		$sql="SELECT nama,id
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='1' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n1 
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='2' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n2
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='3' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n3
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='4' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n4
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='5' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n5
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='6' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n6
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='7' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n7
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='8' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n8
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='9' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n9
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='10' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n10
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='11' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n11
		,(SELECT count(*) FROM target WHERE tahun='".($tahun)."' AND bulan='12' AND (bp_spj>0 or bb_spj>0 or bm_spj>0) AND id_skpd=`user`.id) n12
		from `user` WHERE id_grup='3' ";
		$sql .= $paging_sql;
			$rs=$this->db->query($sql);
			
		/*$sql .= $this->search_sql();
		$sql .= $this->filter_sql();
		$sql .= $order_sql;
		$sql .= $paging_sql;
		*/
		$query = $this->db->query($sql);
		
		//Formating Output
		$i=0;
		$j=$offset;
		return $query;
	}
	
	function get_user($id=0){
		$sql   = "SELECT user.*,concat(user.id_urusan,'.',user.id_bidang,'.',user.id_unit,'.',user.id_sub_unit) kode  FROM user 
		LEFT JOIN ref_unit unit ON user.id_urusan=unit.id_urusan AND user.id_bidang=unit.id_bidang AND user.id_unit=unit.id_unit 
		LEFT JOIN ref_sub_unit sub_unit ON user.id_urusan=sub_unit.id_urusan AND user.id_bidang=sub_unit.id_bidang AND user.id_unit=sub_unit.id_unit AND user.id_sub_unit=sub_unit.id_sub_unit WHERE id=?";
		$query = $this->db->query($sql,$id);
		$data  = $query->row_array();
		
		//Formating Output
		$data['password'] = 'radiisi';
		return $data;
	}
	
	function get_user2($user=''){
		$sql   = "SELECT id,nama,username FROM user WHERE username=?";
		$query = $this->db->query($sql,$user);
		return $query->row_array();
	}
		
	function update_setting($id=0){
		
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file   = $_FILES['foto']['type'];
		$nama_file   = $_FILES['foto']['name'];
		$old_foto    = $this->input->post('old_foto');
		if (!empty($lokasi_file)){
			if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" ){
				$success=-13;
			} else {
				UploadFoto($nama_file,$old_foto);
				 
				$sqla  = "UPDATE user SET foto=? WHERE id=?";
				$outp = $this->db->query($sqla,array($nama_file,$id));
				$success=1;
			}
		}
		
					$peng 		= $this->input->post('pengguna');
					$nip_peng 		= $this->input->post('nip_pengguna');
					$sql  = "UPDATE user SET nama=? ,nip_pengguna = ? WHERE id=?";
					$outp = $this->db->query($sql,array($peng,$nip_peng,$id));
		
		if($_POST['pass_baunit']){
			$password 		= md5($this->input->post('pass_lama'));
			$pass_baru 		= $this->input->post('pass_baru');
			$pass_baunit 	= $this->input->post('pass_baunit');
			//$nama 			= $this->input->post('nama');
			$outp = NULL;
			$sql = "SELECT password,id_grup,session FROM user WHERE id=?";
			$query=$this->db->query($sql,array($id));
			$row=$query->row();
			
			
			if($password==$row->password){
				if($pass_baru == $pass_baunit){
					$pass_baru = md5($pass_baru);
					$sql  = "UPDATE user SET password=? WHERE id=?";
					$outp = $this->db->query($sql,array($pass_baru,$id));
				}
			}
		}
		if($sukses==1){
			if($outp) $_SESSION['success']=1;
				else $_SESSION['success']=-1;
		}else
			$_SESSION['success']=$sukses;
	}
	
	function list_grup(){
		$sql   = "SELECT * FROM user_grup";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function list_skpd(){
		$sql   = "SELECT id,nama FROM user WHERE id_grup = 3";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function insert(){
		$data = $_POST;
		$data['password'] = md5($data['password']);
		unset($data['old_foto']);
		unset($data['foto']);
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file   = $_FILES['foto']['type'];
		$nama_file   = $_FILES['foto']['name'];
		$old_foto    = $this->input->post('old_foto');
		if (!empty($lokasi_file)){
			if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png"){
				$_SESSION['success']=-1;
			} else {
				UploadFoto($nama_file,$old_foto);
				$data['foto'] = $nama_file;
			}
		  }
		
		$data['session']			= md5(now());
		
		$outp = $this->db->insert('user',$data);
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
	
	function update($id=0){
			$data = $_POST;
			unset($data['old_foto']);
			unset($data['foto']);
			$lokasi_file = $_FILES['foto']['tmp_name'];
			$tipe_file   = $_FILES['foto']['type'];
			$nama_file   = $_FILES['foto']['name'];
			$old_foto    = $this->input->post('old_foto');
			
			if (!empty($lokasi_file)){
				if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png"){
					$_SESSION['success']=-1;
				} else {
					UploadFoto($nama_file,$old_foto);
					$data['foto'] = $nama_file;
					 
				}
			}
		  $kode=explode('.',$data['id_sub_unit']);
		  $data['id_urusan']=$kode[0];
		  $data['id_bidang']=$kode[1]*1;
		  $data['id_unit']=$kode[2]*1;
		  $data['id_sub_unit']=$kode[3]*1;
		if($data['password']=='radiisi'){
			unset($data['password']);
			$this->db->where('id',$id);
			$outp = $this->db->update('user',$data);
		}
		else{
			$data['password'] = md5($data['password']);
			$this->db->where('id',$id);
			$outp = $this->db->update('user',$data);
		}
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
		
	function insertx(){
		  $lokasi_file = $_FILES['foto']['tmp_name'];
		  $tipe_file   = $_FILES['foto']['type'];
		  $nama_file   = $_FILES['foto']['name'];
		  $old_foto    = $this->input->post('old_foto');
		  if (!empty($lokasi_file)){
			if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png"){
				$_SESSION['success']=-1;
			} else {
				UploadFoto($nama_file,$old_foto);
			}
		  }
		  
		$id_grup    		= $this->input->post('group');
		$username    		= $this->input->post('username');
		$password    		= md5($this->input->post('password'));
		$nama        		= $this->input->post('nama');
		
		if($id_grup != 4) $id_parent_skpd = NULL;
			else $id_parent_skpd    = $this->input->post('sub_skpd');

		$no_hp  			= $this->input->post('nomor_hp');
		if($nama_file)
			$foto       	= $nama_file;
		else
			$foto			= "";
		
		$nip       = $this->input->post('nip');
		$session			= md5(now());
		
		$sql = "INSERT INTO user (id_grup,username,password,nama,no_hp,foto,nip,session,last_login)
				VALUES (?,?,?,?,?,?,?,?, NOW())";
				
		$outp = $this->db->query($sql, array($id_grup,$username,$password,$nama,$no_hp,$foto,$nip,$session));
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
	
	function updatex($id=0){
		  $lokasi_file = $_FILES['foto']['tmp_name'];
		  $tipe_file   = $_FILES['foto']['type'];
		  $nama_file   = $_FILES['foto']['name'];
		  $old_foto    = $this->input->post('old_foto');
		  if (!empty($lokasi_file)){
			if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png"){
				$_SESSION['success']=-1;
			} else {
				UploadFoto($nama_file,$old_foto);
			}
		  }
		  
		$id_grup    		= $this->input->post('group');
			if($id_grup==0) $id_grup = 1;
		$username    		= $this->input->post('username');
		$password    		= $this->input->post('password');
		$nama        		= $this->input->post('nama');
		$no_hp  			= $this->input->post('nomor_hp');
		if($nama_file)
			$foto       	= $nama_file;
		else
			$foto			= $old_foto;
		
		$nip       			= $this->input->post('nip');
		//$session			= md5(now());
		
		if($password=='radiisi'){
			$sql  = "UPDATE user SET id_grup=?,nama=?,no_hp=?,foto=?,nip=? WHERE username=?";	
			$outp = $this->db->query($sql, array($id_grup,$nama,$no_hp,$foto,$nip,$username));
		}
		else{
			$password = md5($password);
			$sql  = "UPDATE user SET id_grup=?,password=?,nama=?,no_hp=?,foto=?,nip=? WHERE username=?";
			$outp = $this->db->query($sql, array($id_grup,$password,$nama,$no_hp,$foto,$nip,$username));
		}
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
	
	function delete($id=''){
		$sql  = "DELETE FROM user WHERE id=?";
		$outp = $this->db->query($sql,array($id));
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
	
	function openupload($id=''){
		$sql  = "UPDATE user SET statusupload='1' WHERE id=?";
		$outp = $this->db->query($sql,array($id));
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
	function closeupload($id=''){
		$sql  = "UPDATE user SET statusupload='0' WHERE id=?";
		$outp = $this->db->query($sql,array($id));
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
	
	function openupload_all(){
		$sql  = "UPDATE user SET statusupload='1'";
		$outp = $this->db->query($sql);
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
	function closeupload_all(){
		$sql  = "UPDATE user SET statusupload='0'";
		$outp = $this->db->query($sql);
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
	
	function delete_all(){
		$id_cb = $_POST['id_cb'];
		
		if(count($id_cb)){
			foreach($id_cb as $id){
				$sql  = "DELETE FROM user WHERE id=?";
				$outp = $this->db->query($sql,array($id));
			}
		}
		else $outp = false;
		
		if($outp) $_SESSION['success']=1;
			else $_SESSION['success']=-1;
	}
	
}

?>