<?php
	include"library/koneksi.php";
	/*$id_renungan	=	$_GET['id_renungan'];
	
	$hapus	="DELETE FROM tb_renungan WHERE id_renungan='$id_renungan'";
	$hasil	=mysqli_query($konek,$hapus);
	if($hasil){
		echo "<script>alert('Data Berhasil DiHapus'); window.location = 'admin_renungan.php'</script>";
		//header("location:admin_kegiatan.php");
	}else{
		echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_renungan.php'</script>";
		//echo"data gagal dihapus";
	} */
	
	$query	=	"SELECT * FROM tb_renungan WHERE id_renungan='$_GET[id_renungan]'";
	$hasil	=	mysqli_query($konek,$query);
	$r		=	mysqli_fetch_array($hasil);
	
	//apabila berita tidak ada gambarnya
	if($r['gbr_ilustrasi']==""){
		$hapus	=	"DELETE FROM tb_renungan WHERE id_renungan='$_GET[id_renungan]'";
		mysqli_query($konek,$hapus);
		
		header("location:admin/renungan.php");
	}
		//Apabila fasilitas tidak ada gambarnya
	else{
		//hapus gambarnya
			unlink("images/fasilitas/$r[gbr_ilustrasi]");
			unlink("images/fasilitas/small_$r[gbr_ilustrasi]");
			unlink("images/fasilitas/medium_$r[gbr_ilustrasi]");
		//hapus data beritanya
		$hapus	="DELETE FROM tb_renungan WHERE id_renungan='$_GET[id_renungan]'";
		mysqli_query($konek,$hapus);
		
		header("location:admin/renungan.php");
		
	}
	
?>