<?php
	include"library/koneksi.php";
	$ID_peng	=	$_GET['ID_peng'];
	
	$hapus	="DELETE FROM tb_pengumuman WHERE ID_peng='$ID_peng'";
	$hasil	=mysqli_query($konek,$hapus);
	if($hasil){
		echo "<script>alert('Data Berhasil DiHapus'); window.location = 'pengumuman.php'</script>";
		//header("location:admin_pengumuman.php");
	}else{
		echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'pengumuman.php'</script>";
		//echo"data gagal dihapus";
	}
	
?>