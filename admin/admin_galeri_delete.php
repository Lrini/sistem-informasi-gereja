<?php
	include"library/koneksi.php";
	$id_galery	=	$_GET['id_galery'];
	
	$hapus	="DELETE FROM tb_galery WHERE id_galery='$id_galery'";
	$hasil	=mysqli_query($konek,$hapus);
	if($hasil){
		echo "<script>alert('Data Berhasil DiHapus'); window.location = 'admin_galeri.php'</script>";
		//header("location:admin_kegiatan.php");
	}else{
		echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_galeri.php'</script>";
		//echo"data gagal dihapus";
	}
	
?>