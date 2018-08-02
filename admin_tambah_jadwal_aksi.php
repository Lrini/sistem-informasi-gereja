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
					$id_rayon			=	$_POST['id_rayon'];
					$tem_ibadat			=	$_POST['tem_ibadat'];
					$tgl_ibadat			=	$_POST['tgl_ibadat'];					
					
					if (($tem_ibadat=='') && ($id_rayon=='')){
						echo "<script>alert('Ada data yang masih kosong !!!!!'); window.location = 'admin_tambah_nilai.php'</script>";
					}else{
					$input	="INSERT INTO tb_jadwal (id_jadwal,pim_ibadah,id_rayon,tem_ibadah,tgl_ibadah)
															VALUES('','$pim_ibadat','$id_rayon','$tem_ibadat','$tgl_ibadat')";
							mysqli_query($konek,$input);
							header("location:admin/tambahjadwal.php");
							if($input){
								echo "<script>alert('Data Berhasil Disimpan'); window.location = 'admin/jadwal.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin/tambahjadwal.php'</script>";
		
							} 
					
					}
				?>
<?php
}
?>