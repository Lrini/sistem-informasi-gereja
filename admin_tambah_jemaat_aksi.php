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
					
					$nama_jemaat	=	$_POST['nama_jemaat'];
					$nama_kk		=	$_POST['nama_kk'];
					$jns_kelamin	=	$_POST['jns_kelamin'];
					$tem_lahir		=	$_POST['tem_lahir'];
					$tgl_lahir		=	$_POST['tgl_lahir'];
					$pendidikan		=	$_POST['pendidikan'];
					$pekerjaan		=	$_POST['pekerjaan'];
					$nama_rayon		=	$_POST['nama_rayon'];
					$status  		=	$_POST['status'];
					$sts_nikah		=	$_POST['sts_nikah'];
					$sts_sidi		=	$_POST['sts_sidi'];
					$alamat_jemaat	=	$_POST['alamat_jemaat'];
					$no_hp			=	$_POST['no_hp'];
					
					
					if (($nama_jemaat=='') || ($tgl_lahir=='')){
						echo "<script>alert('Ada data yang masih kosong !!!!!'); window.location = 'admin/tambahjemaat.php'</script>";
					}else{
					$input	="INSERT INTO tb_jemaat(id_jemaat,id_pekerjaan,id_pendidikan,id_kk,id_rayon,nama_jemaat,tem_lahir,tgl_lahir,jns_kelamin,alamat_jemaat,status,sts_nikah,sts_sidi,no_hp)
															VALUES('','$pekerjaan','$pendidikan','$nama_kk','$nama_rayon','$nama_jemaat','$tem_lahir','$tgl_lahir','$jns_kelamin','$alamat_jemaat','$status','$sts_nikah','$sts_sidi','$no_hp')";
							mysqli_query($konek,$input);
							header("location:admin/tambahjemaat.php");
							
							if($input){
								echo "<script>alert('Data Berhasil Disimpan'); window.location = 'admin/jemaat.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin/tambahjemaat.php'</script>";
		
							} 
					
					}
				?>
<?php
}
?>