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
					$id_jadwal			=	$_POST['id_ibadah'];
					$nama_rayon			=	$_POST['nama_rayon'];
					$tem_ibadat			=	$_POST['tem_ibadah'];
					$pim_ibadat		    =	$_POST['pim_ibadah'];
					$tgl_ibadat			=	$_POST['tgl_ibadah'];	
					
					
					if (($tem_ibadat=='') && ($nama_rayon=='')){
						echo "<script>alert('form pelajaran atau nilai masih kosong'); window.location = 'admin_tambah_jadwal.php'</script>";
					}else{
					$edit	="UPDATE tb_jadwal SET  id_ibadah='$id_ibadah',
													nama_rayon='$nama_rayon',
													tem_ibadah='$tem_ibadah',
													pim_ibadah='$pim_ibadah',
													tgl_ibadat='$tgl_ibadah'
													WHERE id_jadwal='$id_jadwal'";	
													
							mysqli_query($konek,$edit);
						if($edit){
								echo "<script>alert('Data Berhasil Diupdate'); window.location = 'admin_jadwal.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Diupdate!!'); window.location = 'admin_jadwal.php'</script>";
		
							} 
					}		
				?>
<?php
}
?>