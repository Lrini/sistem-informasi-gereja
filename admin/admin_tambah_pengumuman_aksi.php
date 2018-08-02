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
					
					$judul_peng	=	$_POST['judul_peng'];
					$isi_peng	=	$_POST['isi_peng'];
					$tgl_peng	=	$_POST['tgl_peng'];
					//$sts_peng	=	$_POST['sts_peng'];	
					
					if(($judul_peng=='') || ($isi_peng=='')){
						echo "<script>alert('Ada data yang masih kosong !!!!!'); window.location = 'admin_tambah_pengumuman.php'</script>";
					}else{
					
					$input	="INSERT INTO tb_pengumuman(id_peng,judul_peng,isi_peng,tgl_peng)
								VALUES('','$judul_peng','$isi_peng','$tgl_peng')";
							mysqli_query($konek,$input);
							header("location:admin_tambah_pengumuman.php");
							if($input){
								echo "<script>alert('Data Berhasil Disimpan'); window.location = 'admin_pengumuman.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_tambah_pengumuman.php'</script>";
		
							} 
					
					
					}
				?>
<?php
}
?>