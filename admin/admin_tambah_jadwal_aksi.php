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
					$pim_ibadat		    =	$_POST['pim_ibadat'];
					$nama_rayon			=	$_POST['nama_rayon'];
					$tem_ibadat			=	$_POST['tem_ibadat'];
					$tgl_ibadat			=	$_POST['tgl_ibadat'];					
					
					if (($tem_ibadat=='') && ($nama_rayon=='')){
						echo "<script>alert('Ada data yang masih kosong !!!!!'); window.location = 'admin_tambah_nilai.php'</script>";
					}else{
					$input	="INSERT INTO tb_jadwal (id_jadwal,pim_ibadat,id_rayon,tem_ibadat,tgl_ibadat)
															VALUES('','$pim_ibadat','$nama_rayon','$tem_ibadat','$tgl_ibadat')";
							mysqli_query($konek,$input);
							header("location:admin_tambah_jadwal.php");
							if($input){
								echo "<script>alert('Data Berhasil Disimpan'); window.location = 'admin_jadwal.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_tambah_jadwal.php'</script>";
		
							} 
					
					}
				?>
<?php
}
?>