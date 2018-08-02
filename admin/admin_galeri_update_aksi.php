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
					$id_galery		=	$_POST['id_galery'];
					$keterangan		=	$_POST['keterangan'];
					$tgl_post		=	$_POST['tgl_post'];
					$sts_post		=	$_POST['sts_post'];
					
					$lokasi_file    = $_FILES['fupload']['tmp_name'];
					$tipe_file      = $_FILES['fupload']['type'];
					$nama_file      = $_FILES['fupload']['name'];
					$acak           = rand(000000,999999);
					$nama_file_unik = $acak.$nama_file;
					
					if($judul=='') {
						echo "<script>alert('Ada form yang masih Kosong'); window.location = 'admin_galeri.php'</script>";
					}else{
					
					if (empty($lokasi_file)){
					$edit	="UPDATE tb_galery SET keterangan 	='$keterangan',
												  tgl_post	='$tgl_post',
												  sts_post	='$sts_post',
											WHERE id_galery='$id_galery'";
							mysqli_query($konek,$edit);
							header("location:admin_galeri.php");
					}else{
						Uploadfoto($nama_file_unik);
					$edit	="UPDATE tb_galery SET gambar	='$nama_file_unik',
												  keterangan 	='keterangan',
												  tgl_post	='$tgl_post',
												  sts_post	='$sts_post',
											WHERE id_galery='$id_galery'";
							mysqli_query($konek,$edit);
							header("location:admin_galeri.php");
					}
					}
				?>
<?php
}
?>