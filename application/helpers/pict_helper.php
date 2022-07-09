<?php

function UploadFoto($fupload_name,$old_foto){
  //direktori banner
  $vdir_upload = "assets/images/photo/";
  unlink($vdir_upload."kecil_".$old_foto); 
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);
  
  //identitas file asli
  //Simpan dalam versi small 100 pixel
  //Set ukuran gambar hasil perubahan
  
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if($src_width < $src_height){
	  $dst_width = 100;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 100;
	  
	  //proses perubahan ukuran
	  $im = imagecreatetruecolor(100,100);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);
	  
  }else{
	  $dst_height = 100;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 100;
	  
	  //proses perubahan ukuran
	  $im = imagecreatetruecolor(100,100);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  //Simpan gambar
  imagejpeg($im,$vdir_upload ."kecil_".$fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  
  unlink($vfile_upload); 
  return true;
}

function UploadLogin($fupload_name){
  //direktori banner
  $vdir_upload = "assets/flash/images/";
  //unlink($vdir_upload.$fupload_name); 
  $vfile_upload = $vdir_upload.$fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);
  
  //identitas file asli
  //Simpan dalam versi small 100 pixel
  //Set ukuran gambar hasil perubahan
  
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width * 18) < ($src_height * 38)){
	  $dst_width = 380;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 180;
	  
	  $im = imagecreatetruecolor(380,180);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);
	  
  }else{
	  $dst_height = 180;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 380;
	  
	  $im = imagecreatetruecolor(380,180);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  //Simpan gambar
  imagejpeg($im,$vdir_upload.$fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  
  //unlink($vfile_upload); 
  return true;
}

function UploadLogo($fupload_name){
 $vdir_upload = "assets/images/background/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);
}

?>