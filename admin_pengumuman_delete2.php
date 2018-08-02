<?php
	include"library/koneksi.php";
	$id_peng	=	$_GET['id_peng'];
	
	$hapus	="DELETE FROM tb_pengumuman WHERE id_peng='$id_peng'";
	$hasil	=mysqli_query($konek,$hapus);
	if($hasil){
		echo "<script>alert('Data Berhasil DiHapus'); window.location = 'admin/pengumuman.php'</script>";
		//header("location:admin_pengumuman.php");
	}else{
		echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin/pengumuman.php'</script>";
		//echo"data gagal dihapus";
	}
	
?>