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
					$id_jemaat		=	$_POST['id_jemaat'];
					$KK				=	$_POST['KK'];
					$mejelis		=	$_POST['mejelis'];
					$nama_jemaat	=	$_POST['nama_jemaat'];
					$id_KK			=	$_POST['id_KK'];									
					$id_rayon		=	$_POST['id_rayon'];
					$JK				=	$_POST['JK'];
					$tem_lahir		=	$_POST['tem_lahir'];
					$tgl_lahir		=	$_POST['tgl_lahir'];
					$pendidikan		=	$_POST['pendidikan'];
					$pekerjaan		=	$_POST['pekerjaan'];
					$nama_rayon		=	$_POST['nama_rayon'];
					$sts_nikah		=	$_POST['sts_nikah'];
					$sts_sidi		=	$_POST['sts_sidi'];
					$sts_baptis		=	$_POST['sts_baptis'];
					$alamat_jemaat	=	$_POST['alamat_jemaat'];
					$no_hp			=	$_POST['no_hp'];
					$Status			=	$_POST['Status'];
					
					
					if (($nama_jemaat=='') || ($tgl_lahir=='')){
						echo "<script>alert('Ada data yang masih kosong !!!!!'); window.location = 'admin_tambah_jemaat.php'</script>";
					}else{
					$input	="INSERT INTO tb_jemaat(id_jemaat,
													KK,
													mejelis,
													pekerjaan,
													pendidikan,
													id_KK,
													id_rayon,
													nama_jemaat,
													tem_lahir,
													tgl_lahir,
													JK,
													Status,
													alamat_jemaat,
													sts_nikah,
													sts_sidi,
													sts_baptis,
													no_hp,
													Keterangan)
															VALUES('',															
																	'$KK',
																	'$mejelis',
																	'$pekerjaan',																	
																	'$pendidikan',
																	'$id_KK',																	
																	'$id_rayon',
																	'$nama_jemaat',
																	'$tem_lahir',
																	'$tgl_lahir',
																	'$JK',
																	'$Status',
																	'$alamat_jemaat',
																	'$sts_nikah',
																	'$sts_sidi',
																	'$sts_baptis',
																	'$no_hp'
																	'$Keterangan')";
							//var_dump($input);
							//die($input);
							mysqli_query($konek,$input);
							header("location:admin_tambah_jemaat.php");
							
							if($input){
								echo "<script>alert('Data Berhasil Disimpan'); window.location = 'admin_jemaat.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_tambah_jemaat.php'</script>";
		
							} 
					
					}
				?>
<?php
}
?>