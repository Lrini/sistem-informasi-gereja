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
					$id_peng	=	$_POST['id_peng'];
					$judul_peng	=	$_POST['judul_peng'];
					$isi_peng	=	$_POST['isi_peng'];
					$tgl_peng	=	$_POST['tgl_peng'];	
					
					if(($judul_peng=='') || ($isi_peng=='')){
						echo "<script>alert('Ada form yang masih Kosong'); window.location = 'admin/pengumuman.php'</script>";
					}else{
					
					$edit	="UPDATE tb_pengumuman SET judul_peng	='$judul_peng',
														isi_peng 	='$isi_peng',
														tgl_peng	='$tgl_peng'
														WHERE id_peng='$id_peng'";
								
							mysqli_query($konek,$edit);
							header("location:admin/pengumuman.php");
					
					}
				?>
<?php
}
?>