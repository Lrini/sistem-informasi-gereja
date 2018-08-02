<?php
	include"library/koneksi.php";
	$konek = mysqli_connect("localhost","root","","betel");
	$id_majelis	=$_GET['id_majelis'];
	
	$hapus	="DELETE FROM tb_jab_detail WHERE id_majelis='$id_majelis'";
	$hasil	=mysqli_query($konek,$hapus);
	if($hasil){
		echo "<script>alert('Data Berhasil DiHapus'); window.location = 'admin_majelis.php'</script>";
		//header("location:admin_majelis.php");
	}else{
		echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_majelis.php'</script>";
		//echo"data gagal dihapus";
	}
	
?>