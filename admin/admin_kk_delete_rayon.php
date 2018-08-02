<?php
	include"library/koneksi.php";
	$id_kk	=	$_GET['id_kk'];
	
	$hapus	="DELETE FROM tb_kk WHERE id_kk='$id_kk'";
	$hasil	=mysqli_query($konek,$hapus);
	if($hasil){
		echo "<script>alert('Data Berhasil DiHapus'); window.location = 'admin_kk_rayon.php'</script>";
		//header("location:admin_kk_rayon.php");
	}else{
		echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_kk_rayon.php'</script>";
		//echo"data gagal dihapus";
	}
	
?>