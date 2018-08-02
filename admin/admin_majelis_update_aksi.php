<?php
session_start();
include"library/koneksi.php";
include"library/fungsi_thumb.php";
//error_reporting(0);
	//apabila user belumlogin
if ((empty($_SESSION['username'])) AND (empty($_SESSION['password']))){
	echo"<script type=text/javascript>alert('Anda harus Login Terlebih Dahulu'); window.location = 'login.php'</script>)";
}
//apabila user sudah login
else{
?>				
				
				<?php
					$id_majelis		=	$_POST['id_majelis'];
					$nama_jemaat	=	$_POST['nama_jemaat'];
					$nama_rayon		=	$_POST['nama_rayon'];
					$ket_jabatan	=	$_POST['ket_jabatan'];
					$tgl_aktif		=	$_POST['tgl_aktif'];
					$sts_aktif		=	$_POST['sts_aktif'];
					$tgl_vakum		=	$_POST['tgl_vakum'];
					$periode		=	$_POST['periode'];
					
					if (($nama_jemaat=='') && ($ket_jabatan=='')){
						echo "<script>alert('form pelajaran atau nilai masih kosong'); window.location = 'admin_tambah_majelis.php'</script>";
					}else{
					$edit	="UPDATE tb_jab_detail SET  id_jemaat='$nama_jemaat',
													id_rayon='$nama_rayon',
													id_jabatan='$ket_jabatan',
													sts_aktif='$sts_aktif',
													tgl_aktif='$tgl_aktif',
													tgl_vakum='$tgl_vakum',
													periode='$periode'
													WHERE id_majelis='$id_majelis'";	
													
							mysqli_query($konek,$edit);
						if($edit){
								echo "<script>alert('Data Berhasil Diupdate'); window.location = 'admin_majelis.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Diupdate!!'); window.location = 'admin_majelis.php'</script>";
		
							} 
					}		
				?>
<?php
}
?>