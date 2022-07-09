<?php

	function Rupiah($nil=0){
		$nil = $nil + 0;
		if(($nil*100)%100 == 0){
			$nil = $nil.".00";
		}elseif(($nil*100)%10 == 0){
			$nil = $nil."0";
		}
		$nil = str_replace('.', ',', $nil);
		$str1 = $nil;
		$str2= "";
		$dot = "";
		$str = strrev($str1);
		$arr = str_split($str, 3);
		$i=0;
		foreach($arr as $str){
			$str2 = $str2.$dot.$str;
			if(strlen($str)==3 AND $i>0)$dot = '.';
			$i++;
		}
		$rp = strrev($str2);
		if($rp != "" AND $rp > 0){return "Rp. $rp";}else{return "Rp. 0,00";}		 
	}

	function Rupiah2($nil=0){
		$nil = $nil + 0;
		if(($nil*100)%100 == 0){
			$nil = $nil.".00";
		}elseif(($nil*100)%10 == 0){
			$nil = $nil."0";
		}
		$nil = str_replace('.', ',', $nil);
		$str1 = $nil;
		$str2= "";
		$dot = "";
		$str = strrev($str1);
		$arr = str_split($str, 3);
		$i=0;
		foreach($arr as $str){
			$str2 = $str2.$dot.$str;
			if(strlen($str)==3 AND $i>0)$dot = '.';
			$i++;
		}
		$rp = strrev($str2);
		if($rp != "" AND $rp > 0){return "Rp.$rp";}else{return "-";}		 
	}
	
	function Rupiah3($nil=0){
		$nil = $nil + 0;
		if(($nil*100)%100 == 0){
			$nil = $nil.".00";
		}elseif(($nil*100)%10 == 0){
			$nil = $nil."0";
		}
		$nil = str_replace('.', ',', $nil);
		$str1 = $nil;
		$str2= "";
		$dot = "";
		$str = strrev($str1);
		$arr = str_split($str, 3);
		$i=0;
		foreach($arr as $str){
			$str2 = $str2.$dot.$str;
			if(strlen($str)==3 AND $i>0)$dot = '.';
			$i++;
		}
		$rp = strrev($str2);
		if($rp != "" AND $rp > 0){return "$rp";}else{return "0,00";}		 
	}
	
	function jecho($a,$b,$str){
		if($a==$b){
			echo $str;
		}
	}
	
	function selected($a,$b,$opt=0){
		if($a==$b){
			if($opt)
				echo "checked='checked'";
			else echo "selected='selected'";
		}
	}
	
	function rev_tgl($tgl){
		$ar=explode('-',$tgl);
		$o=$ar[2].'-'.$ar[1].'-'.$ar[0];
		return $o;
	}
	
	function bulan($bln){
		$nm = '';
		switch($bln){
			case '1':
				$nm = 'Januari';
				break;
			case '2':
				$nm = 'Februari';
				break;
			case '3':
				$nm = 'Maret';
				break;
			case '4':
				$nm = 'April';
				break;
			case '5':
				$nm = 'Mei';
				break;
			case '6':
				$nm = 'Juni';
				break;
			case '7':
				$nm = 'Juli';
				break;
			case '8':
				$nm = 'Agustus';
				break;
			case '9':
				$nm = 'September';
				break;
			case '10':
				$nm = 'Oktober';
				break;
			case '11':
				$nm = 'November';
				break;
			case '12':
				$nm = 'Desember';
				break;
			default:
				$nm = '';
				break;
		}
		return $nm;
	}
	
	function nama_bulan($tgl){
		$ar=explode('-',$tgl);
		
		$nm = '';
		switch($ar[1]){
			case '01':
				$nm = 'Januari';
				break;
			case '02':
				$nm = 'Februari';
				break;
			case '03':
				$nm = 'Maret';
				break;
			case '04':
				$nm = 'April';
				break;
			case '05':
				$nm = 'Mei';
				break;
			case '06':
				$nm = 'Juni';
				break;
			case '07':
				$nm = 'Juli';
				break;
			case '08':
				$nm = 'Agustus';
				break;
			case '09':
				$nm = 'September';
				break;
			case '10':
				$nm = 'Oktober';
				break;
			case '11':
				$nm = 'November';
				break;
			case '12':
				$nm = 'Desember';
				break;
		}
		
		$o = $ar[0] .' '. $nm .' '. $ar[2];
		return $o;
	}
	
	function dua_digit($i){
		if($i<10) $o='0'.$i;
			else $o=$i;
		return $o;
	}
	
	function tiga_digit($i){
		if($i<10) $o='00'.$i;
		else if($i<100) $o='0'.$i;
			else $o=$i;
		return $o;
	}
	
	function to_rupiah($inp=''){
		$outp = str_replace('.', '', $inp);
		$outp = str_replace(',', '.', $outp);
		return $outp;
	}
	
	function rp($inp=0){
		return number_format($inp, 2, ',', '.');
	}
	
	function pertumbuhan($a=1,$b=1,$c=1,$d=1){
		$x=0;
		$y=0;
		$z=0;
		if($a>1) $x = (($b-$a)/$a);
		if($b>1) $y = (($c-$b)/$b);
		if($c>1) $z = (($d-$c)/$c);
		$outp = (($x+$y+$z)/3)*100;
		$outp = round($outp,2);
		$outp = str_replace('.',',',$outp) . ' %';;
		return $outp;
	}
	
	function koma ($a=1) {
	if(substr_count($a, '.'))
	
	$a = str_replace(".", ",",$a);
	else $a = number_format($a,0, ',', '.');
	return $a;
	}
	function tgl_indo2($tgl){
			$tanggal = substr($tgl,8,2);
			$jam = substr($tgl,11,8);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam.' WIB';		 
	}	

	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}

	function tgl_indo_out($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $tanggal.'-'.$bulan.'-'.$tahun;		 
	}

	function tgl_indo_in($tgl){
			$tanggal = substr($tgl,0,2);
			$bulan = substr($tgl,3,2);
			$tahun = substr($tgl,6,4);
			return $tahun.'-'.$bulan.'-'.$tanggal;		 
	}
		
	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
	
		}
		
//time out
function timer(){
	$time=2000;
	$_SESSION[timeout]=time()+$time;
}
function cek_login(){
	$timeout=$_SESSION[timeout];
	if(time()<$timeout){
		timer();
		return true;
	}else{
		unset($_SESSION[timeout]);
		return false;
	}
}

?>