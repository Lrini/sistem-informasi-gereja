<?php
include"library/koneksi.php";	
$konek = mysqli_connect("localhost","root","","betel");
if (isset($_POST['submit'])){
      	$id_jemaat		=	$_POST['id_jemaat'];
					$KK				=	$_POST['KK'];
					$mejelis		=	$_POST['mejelis'];
					$nama_jemaat	=	$_POST['nama_jemaat'];
					$id_KK			=	$_POST['id_KK'];									
					//$id_rayon		=	$_POST['id_rayon'];
					//$JK				=	$_POST['jk'];
					//$tem_lahir		=	$_POST['tem_lahir'];
					//$tgl_lahir		=	$_POST['tgl_lahir'];
					//$pendidikan		=	$_POST['Pendidikan'];
					//$pekerjaan		=	$_POST['Pekerjaan'];
					//$id_rayon		=	$_POST['id_rayon'];
					//$sts_nikah		=	$_POST['sts_nikah'];
					//$sts_sidi		=	$_POST['sts_sidi'];
					//$sts_baptis		=	$_POST['sts_baptis'];
					//$alamat_jemaat	=	$_POST['alamat_jemaat'];
					//$no_hp			=	$_POST['no_hp'];
					//$status			=	$_POST['Status'];
					//$keterangan 	=$_POST['Keterangan'];
     	 $simpan = mysqli_query($konek,"update tb_jemaat set KK='$KK',id_KK='$id_KK',nama_jemaat='$nama_jemaat' where id_jemaat='$id_jemaat'");
		if($simpan){
	 header('location:admin_jemaat.php');
	 } else {
	 echo "<script>alert('Gagal Di simpan');</script>";
	}
	 }				
?>