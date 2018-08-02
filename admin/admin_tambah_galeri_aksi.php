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
					
					$judul			=	$_POST['judul'];
					$ket_gambar		=	$_POST['ket_gambar'];
					$sts_post		=	$_POST['sts_post'];
					$tgl_post		=	$_POST['tgl_post'];
					
					$lokasi_file    = $_FILES['fupload']['tmp_name'];
					$tipe_file      = $_FILES['fupload']['type'];
					$nama_file      = $_FILES['fupload']['name'];
					$acak           = rand(000000,999999);
					$nama_file_unik = $acak.$nama_file;
					
					if(($judul=='') || ($ket_gambar=='')){
						echo "<script>alert('Ada form yang masih Kosong'); window.location = 'admin_tambah_galeri.php'</script>";
					}else{
					
					if (empty($lokasi_file)){
					$input	="INSERT INTO tb_galery(id_galery,judul,sts_post,tgl_post,ket_gambar)
								VALUES('','$judul','$sts_post','$tgl_post','$ket_gambar')";
							mysqli_query($konek,$input);
							header("location:admin_tambah_galeri.php");
					}else{
						Uploadfoto($nama_file_unik);
					$input	="INSERT INTO tb_galery(id_galery,gambar,judul,sts_post,tgl_post,ket_gambar) 
								VALUES('','$nama_file_unik','$judul','$sts_post','$tgl_post','$ket_gambar')";
							mysqli_query($konek,$input);
							header("location:admin_tambah_galeri.php");
					}
					if($input){
								echo "<script>alert('Data Berhasil Disimpan'); window.location = 'admin_galeri.php'</script>";
								
							}else{
								echo "<script>alert('Data Gagal Dihapus!!'); window.location = 'admin_tambah_galeri.php'</script>";
		
							} 
					
					}
				?>
<?php
}
?>