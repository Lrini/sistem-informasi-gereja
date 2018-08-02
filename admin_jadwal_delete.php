<?php
	include"library/koneksi.php";
	$id_jadwal	=	$_GET['id_jadwal'];
	
	$hapus	="DELETE FROM tb_jadwal WHERE id_jadwal='$id_jadwal'";
	$hasil	=mysqli_query($konek,$hapus);
	if($hasil){
		echo "<script>alert('Data Berhasil DiHapus'); window.location = 'admin/jadwal.php'</script>";
		//header("location:admin_kegiatan.php");
	}else{
		echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin/jadwal.php'</script>";
		//echo"data gagal dihapus";
	}
	
?>