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
					
					//$id_renungan		=	$_POST['id_renungan'];
					$jns_renungan		= 	$_POST['renungan'];
					$jdl_renungan		=	$_POST['jdl_renungan'];
					$tgl_post			=	$_POST['tgl_post'];
					$sts_renungan		=	$_POST['sts_renungan'];
					$isi_renungan		=	$_POST['isi_renungan'];
				
					
					if(($jdl_renungan=='') || ($isi_renungan=='')){
						echo "<script>alert('Ada data yang masih kosong !!!!!'); window.location = 'admin/tambahrenungan.php'</script>";
					}else{
					$edit	="Insert into tb_renungan (id_renungan,
														jns_renungan,
														jdl_renungan,
														tgl_post,
														sts_renungan,
														isi_renungan) values 
													  ('',
													  '$jns_renungan',
													  '$jdl_renungan',
													  '$tgl_post',
													  '$sts_renungan',
													  '$isi_renungan')";								
							mysqli_query($konek,$edit);
							//header("location:admin/pengumuman.php");
					if($edit){
								echo "<script>alert('Data Berhasil Disimpan'); window.location = 'admin/renungan.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Dihapus!!'); window.location = '../admin_tambah_renungan.php'</script>";
		
							} 
					}
				?>
<?php
}
?>