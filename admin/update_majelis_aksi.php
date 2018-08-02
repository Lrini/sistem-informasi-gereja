<?php
include"library/koneksi.php";	
$konek = mysqli_connect("localhost","root","","betel");
if (isset($_POST['submit'])){
      	$id_jemaat		=	$_POST['id_jemaat'];
		$id_majelis		= $_POST['id_majelis'];
		$pengurus_gereja = $_POST ['pengurus_gereja'];
		$pengurus_rayon = $_POST ['pengurus_rayon'];
		$status = $_POST ['status'];
		$periode = $_POST ['periode'];
		$jabatan = $_POST ['jabatan'];
     	 $simpan = mysqli_query($konek,"update tb_pelayanan set Pengurus_gereja='$pengurus_gereja',Pengurus_rayon='$pengurus_rayon',status='$status',Periode='$periode',Jabatan='$jabatan' where id_jemaat='$id_jemaat'");
		if($simpan){
	 header('location:majelis.php');
	 } else {
	 echo "<script>alert('Gagal Di simpan');</script>";
	}
	 }				
?>