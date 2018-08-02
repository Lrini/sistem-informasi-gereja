<?php
include"library/koneksi.php";	
$konek = mysqli_connect("localhost","root","","betel");
if (isset($_POST['submit'])){
      	$id_jadwal		=	$_POST['id_jadwal'];
		$tem_ibadah		= $_POST['tem_ibadah'];
		$pim_ibadah = $_POST ['pim_ibadah'];
		$id_rayon = $_POST ['id_rayon'];
		$tgl_ibadah = $_POST ['tgl_ibadah'];
     	 $simpan = mysqli_query($konek,"update tb_jadwal set tem_ibadah='$tem_ibadah',pim_ibadah='$pim_ibadah',id_rayon='$id_rayon',tgl_ibadah='$tgl_ibadah' where id_jadwal='$id_jadwal'");
		if($simpan){
	 header('location:admin/jadwal.php');
	 } else {
	 echo "<script>alert('Gagal Di simpan');</script>";
	}
	 }				
?>