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
					$id_jemaat	=	$_POST['id_jemaat'];
					$keterangan	=	$_POST['keterangan'];
					
					
					if(($id_kk=='')){
						echo "<script>alert('Ada form yang masih Kosong'); window.location = 'admin_tambah_kk.php'</script>";
					}else{
					
					$edit	="UPDATE tb_kepalai SET  id_kk	    ='$id_kk'
												WHERE id_jemaat ='$id_jemaat'
												AND keterangan  ='$keterangan'";
							mysqli_query($konek,$edit);
								
							mysqli_query($konek,$edit);
							header("location:admin_kk_rayon.php");
					
					}
				?>
<?php
}
?>