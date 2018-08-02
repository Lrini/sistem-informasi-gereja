<?php
include"library/koneksi.php";	
$konek = mysqli_connect("localhost","root","","betel");
if(!empty($_FILES) && $_FILES['file']['size'] > 0 && $_FILES['file']['error']==0)
					{
					$fileName=$_FILES['file']['name'];
					
					$movie=move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$fileName);
					$im_src = imagecreatefromjpeg('images/'.$fileName);
					$src_width = imageSX($im_src);
					$src_height = imageSY($im_src);

					//Set ukuran gambar hasil perubahan
					$dst_width = 600;
					$dst_height = 600;

					//proses perubahan ukuran
					$im = imagecreatetruecolor($dst_width,$dst_height);
					imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

					//Simpan gambar
					imagejpeg($im,'images/'.$fileName,100);

					//Hapus gambar di memori komputer
					imagedestroy($im_src);
					imagedestroy($im);
					if ($movie){
	
					$id_jemaat		=	$_POST['id_jemaat'];
					$KK				=	$_POST['KK'];
					//$mejelis		=	$_POST['mejelis'];
					$nama_jemaat	=	$_POST['nama_jemaat'];
					$id_KK			=	$_POST['id_KK'];									
					//$id_rayon		=	$_POST['id_rayon'];
					$JK				=	$_POST['jk'];
					$tem_lahir		=	$_POST['tem_lahir'];
					$tgl_lahir		=	$_POST['tgl_lahir'];
					$pendidikan		=	$_POST['pendidikan'];
					$pekerjaan		=	$_POST['pekerjaan'];
					$id_rayon		=	$_POST['id_rayon'];
					$sts_nikah		=	$_POST['sts_nikah'];
					$sts_sidi		=	$_POST['sts_sidi'];
					$sts_baptis		=	$_POST['sts_baptis'];
					$alamat_jemaat	=	$_POST['alamat_jemaat'];
					//$no_hp			=	$_POST['no_hp'];
					$status			=	$_POST['Status'];
					$keterangan 	=$_POST['keterangan'];
     	 $simpan = mysqli_query($konek,"update tb_jemaat set KK='$KK',id_KK='$id_KK',nama_jemaat='$nama_jemaat',JK='$JK', Tem_Lahir='$tem_lahir', Tgl_Lahir='$tgl_lahir', Pendidikan='$pendidikan', Pekerjaan='$pekerjaan',id_rayon='$id_rayon', sts_nikah='$sts_nikah', sts_sidi='$sts_sidi', 
										sts_baptis='$sts_baptis', Status='$status',alamat_jemaat='$alamat_jemaat', Keterangan='$keterangan',gambar='$fileName' where id_jemaat='$id_jemaat'");
		if($simpan){
	 header('location:jemaat.php');
	 } else {
	 echo "<script>alert('Gagal Di simpan');</script>";
	}			
					}
					}
?>