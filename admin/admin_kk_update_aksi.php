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
					$id_kk	    =	$_POST['id_kk'];
					$nama_kk	=	$_POST['nama_kk'];
					
					
					if(($nama_kk=='')){
						echo "<script>alert('Ada form yang masih Kosong'); window.location = 'admin_tambah_kk.php'</script>";
					}else{
					
					$edit	="UPDATE tb_kk SET nama_kk	    ='$nama_kk'
												WHERE id_kk ='$id_kk'";
								
							mysqli_query($konek,$edit);
							header("location:admin_kk.php");
					
					}
				?>
<?php
}
?>