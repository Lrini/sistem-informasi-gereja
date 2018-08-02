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
					$id_renungan		=	$_POST['id_renungan'];
					$jdl_renungan		=	$_POST['jdl_renungan'];
					$tgl_post			=	$_POST['tgl_post'];
					$sts_renungan		=	$_POST['sts_renungan'];
					$isi_renungan		=	$_POST['isi_renungan'];
					
					$lokasi_file    = $_FILES['fupload']['tmp_name'];
					$tipe_file      = $_FILES['fupload']['type'];
					$nama_file      = $_FILES['fupload']['name'];
					$acak           = rand(000000,999999);
					$nama_file_unik = $acak.$nama_file;
					
					if(($jdl_renungan=='') || ($isi_renungan=='')){
						echo "<script>alert('Ada form yang masih Kosong'); window.location = 'admin/renungan.php'</script>";
					}else{
					
					if (empty($lokasi_file)){
					$edit	="UPDATE tb_renungan SET jdl_renungan='$jdl_renungan',
													  tgl_post ='$tgl_post',
													  sts_renungan='$sts_renungan',
													  isi_renungan='$isi_renungan'
													  WHERE id_renungan='$id_renungan'";
								
							mysqli_query($konek,$edit);
							header("location:admin/renungan.php");
					}else{
						Uploadfoto($nama_file_unik);
					$edit	="UPDATE tb_renungan SET jdl_renungan='$jdl_renungan',
													  tgl_post ='$tgl_post',
													  sts_renungan='$sts_renungan',
													  isi_renungan='$isi_renungan'
													  WHERE id_renungan='$id_renungan'";
								
							mysqli_query($konek,$edit);
							header("location:admin/renungan.php");
					}
					}
				?>
<?php
}
?>