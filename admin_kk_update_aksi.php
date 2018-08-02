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
					$id_KK	    =	$_POST['id_KK'];
					$Nama_KK	=	$_POST['Nama_KK'];
					
					
					if(($Nama_KK=='')) {
						echo "<script>alert('Ada form yang masih Kosong'); window.location = 'admin_tambah_kk.php'</script>";
					}else{
					
					$input	="update tb_kepalai set Nama_KK='$Nama_KK' where id_KK='$id_KK'";
							mysqli_query($konek,$input);
							header("location:admin/tambahKK.php");
					
					}
				?>
<?php
}
?>