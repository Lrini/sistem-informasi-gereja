<?php
session_start();
include"library/koneksi.php";
include"library/fungsi_thumb.php";
error_reporting(0);
	//apabila user belumlogin
if ((empty($_SESSION['username'])) AND (empty($_SESSION['password']))){
	echo"<script type=text/javascript>alert('Anda harus Login Terlebih Dahulu'); window.location = 'login.php'</script>)";
}
//apabila user sudah login
else{
?>				
				
					
				<?php
					$id_jemaat		=	$_POST['id_jemaat'];
					$id_kk			=	$_POST['id_kk'];
					$kk				=	$_POST['kk'];
					$nama_jemaat	=	$_POST['nama_jemaat'];
					$jk				=	$_POST['jk'];
					$tem_lahir		=	$_POST['tem_lahir'];
					$tgl_lahir		=	$_POST['tgl_lahir'];
					$pendidikan		=	$_POST['pendidikan'];
					$pekerjaan		=	$_POST['pekerjaan'];
					$majelis		=	$_POST['majelis'];
					$id_rayon		=	$_POST['nama_rayon'];
					$sts_nikah		=	$_POST['sts_nikah'];
					$sts_sidi		=	$_POST['sts_sidi'];
					$sts_baptis		=	$_POST['sts_baptis'];
					$alamat_jemaat	=	$_POST['alamat_jemaat'];
					$keterangan			=	$_POST['keterangan'];
										
					if(($nama_jemaat=='') && ($tgl_lahir=='')){
						echo "<script>alert('Ada form yang masih Kosong'); window.location = 'admin_tambah_jemaat.php'</script>";
					}else{
					$edit	="UPDATE tb_jemaat SET 	nama_jemaat	     ='$nama_jemaat',
													id_kk		 	 ='$nama_kk',
													jns_kelamin  	 ='$jns_kelamin',
													tem_lahir	 	 ='$tem_lahir',
													tgl_lahir	 	 ='$tgl_lahir',
													id_pendidikan	 ='$pendidikan',
													id_pekerjaan	 ='$pekerjaan',
													id_rayon	 	 ='$nama_rayon',
													sts_nikah		 ='$sts_nikah',
													sts_sidi		 ='$sts_sidi',
													alamat_jemaat	 ='$alamat_jemaat',
													no_hp		  	 ='$no_hp'
												    WHERE id_jemaat  ='$id_jemaat'";
				
						mysqli_query($konek,$edit);
						if($edit){
								echo "<script>alert('Data Berhasil Diupdate'); window.location = 'admin_jemaat.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Diupdate!!'); window.location = 'admin_jemaat.php'</script>";
		
							} 
					}		
				?>
<?php
}
?>