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
				include"library/koneksi.php";	
				$konek = mysqli_connect("localhost","root","","betel");
				if (isset($_POST['submit'])){
					$id_jemaat		=	$_POST['id_jemaat'];
					$periode = $_POST ['periode'];
					$pengurus_gereja = $_POST['pengurus_gereja'];
					$pengurus_rayon = $_POST['pengurus_rayon'];
					$jabatam = strtoupper($_POST['jabatan']);
					$status = $_POST['status'];
					// $cek = mysqli_query($konek,"SELECT * FROM `tb_pelayanan` WHERE Pengurus_rayon=1");					
					$countMajelisGereja = mysqli_fetch_array(mysqli_query($konek,"SELECT count(*) AS jumlah FROM `tb_pelayanan` WHERE Pengurus_rayon=1"))['jumlah'];
					$countJabatan = mysqli_fetch_array(mysqli_query($konek,"SELECT count(*) AS jumlah FROM `tb_pelayanan` WHERE Jabatan=1"))['jumlah'];
					// echo ($countMajelisGereja);
					// DIE;
					if(($countMajelisGereja > 6) AND ($pengurus_rayon == "ketua")) {
								echo "<script>alert('Ketua pengurus Rayon sudah ada ');window.location.href='admin/tambahmajelis.php'</script>";
					}
					else if(($countJabatan == 1) AND ($jabatam == "PENDETA")) {
								echo "<script>alert('Pendeta  sudah ada ');window.location.href='admin/tambahmajelis.php'</script>";
					}else {
				$simpan = mysqli_query($konek,"insert into tb_pelayanan (id_majelis,id_jemaat,Periode,Pengurus_gereja,Pengurus_rayon,Jabatan,status) 
												values ('','$id_jemaat','$periode','$pengurus_gereja','$pengurus_rayon','$jabatam','$status')");
				if($simpan){
			 header('location:admin/majelis.php');
			 } else {
			 echo "<script>alert('Gagal Di simpan');</script>";
			}
			 }	
				}			 
		?>
<?php
}
?>