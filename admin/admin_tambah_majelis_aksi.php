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
					$id_majelis		=	$_POST['id_majelis'];
					$id_jemaat		=	$_POST['id_jemaat'];
					$Jabatan		=	$_POST['Jabatan'];
					$Jabatan		=	$_POST['Periode'];
					$tgl_aktif		=	$_POST['tgl_aktif'];
					$sts_aktif		=	$_POST['sts_aktif'];
					$tgl_vakum		=	$_POST['tgl_vakum'];
					$Keterangan		=	$_POST['Keterangan'];
					
					/*
					SELECT tb_pelayanan.id_majelis, 
							tb_jemaat.nama_jemaat,
							tb_jemaat.JK,
							tb_jemaat.Tem_Lahir, 
							tb_jemaat.Tgl_Lahir, 
							tb_jemaat.id_rayon,
							tb_pelayanan.tgl_aktif,
							tb_pelayanan.tgl_vakum,
							tb_pelayanan.Jabatan,
							tb_pelayanan.Periode,
							tb_pelayanan.Keterangan,
							tb_jemaat.alamat_jemaat,
							tb_jemaat.Keterangan,
							tb_pelayanan.sts_aktif
								  FROM tb_pelayanan 
								  JOIN tb_jemaat ON tb_pelayanan.id_jemaat = tb_jemaat.id_jemaat
								  LIMIT $posisi,$batas
					*/
					
					
					if (($nama_jemaat=='') && ($ket_jabatan=='')){
						echo "<script>alert('form pelajaran atau nilai masih kosong'); window.location = 'admin_tambah_majelis.php'</script>";
					}else{
					$input	="INSERT INTO pelayanan (id_majelis,
											id_jemaat,
											Jabatan,
											id_jemaat,
											sts_aktif,
											tgl_aktif,
											tgl_vakum,
											periode,
											Keterangan)
										VALUES('',
										'$id_jemaat',
										'$Jabatan',
										'$nama_jemaat',
										'$sts_aktif',
										'$tgl_aktif',
										'$tgl_vakum',
										'$periode',
										'$Keterangan')";
							mysqli_query($konek,$input);
							header("location:admin_tambah_majelis.php");
							if($input){
								echo "<script>alert('Data Berhasil Disimpan'); window.location = 'admin_majelis.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_tambah_majelis.php'</script>";
		
							} 
					
					}
				?>
<?php
}
?>