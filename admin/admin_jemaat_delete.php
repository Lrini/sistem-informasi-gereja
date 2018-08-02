<?php
	include"library/koneksi.php";
	$id_jemaat	=	$_GET['id_jemaat'];
	
	$hapus	="DELETE FROM tb_jemaat WHERE id_jemaat='$id_jemaat'";
	$hasil	=mysqli_query($konek,$hapus);
	if($hasil){
		echo "<script>alert('Data Berhasil DiHapus'); window.location = 'admin_jemaat.php'</script>";
		//header("location:admin_kegiatan.php");
	}else{
		echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_jemaat'</script>";
		//echo"data gagal dihapus";
	}
	
?>