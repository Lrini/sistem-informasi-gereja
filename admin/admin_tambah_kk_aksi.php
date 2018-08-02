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
					$konek = mysqli_connect("localhost","root","","betel");
					//$id_renungan		=	$_POST['id_renungan'];
					$Nama_KK		= 	$_POST['Nama_KK'];
				
					
					if(($Nama_KK=='')){
						echo "<script>alert('Ada data yang masih kosong !!!!!'); window.location = 'admin/tambahkk.php'</script>";
					}else{								
							 $simpan = mysqli_query($konek,"insert into tb_kepalai (id_KK,Nama_KK) values ('','$Nama_KK')");
							//header("location:admin/pengumuman.php");
					if($simpan){
								echo "<script>alert('Data Berhasil Disimpan'); window.location = 'kk.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin/admin_tambah_kk.php'</script>";
		
							} 
					}
				?>
<?php
}
?>