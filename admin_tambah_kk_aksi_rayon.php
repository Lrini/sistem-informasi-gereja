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
					$nama_kk	=	$_POST['nama_kk'];
					
					if(($nama_kk=='')){
						echo "<script>alert('Ada form yang masih Kosong'); window.location = 'admin_tambah_kk_rayon.php'</script>";
					}else{
					
					$input	="INSERT INTO tb_kk(id_kk,nama_kk)
								VALUES('','$nama_kk')";
							mysqli_query($konek,$input);
							header("location:admin_tambah_jemaat_rayon.php");
					
					}
				?>
<?php
}
?>