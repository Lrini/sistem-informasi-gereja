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
					if(!empty($_FILES) && $_FILES['file']['size'] > 0 && $_FILES['file']['error']==0)
					{
					$fileName=$_FILES['file']['name'];
					
					$movie=move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$fileName);
					$im_src = imagecreatefromjpeg('images/'.$fileName);
					$src_width = imageSX($im_src);
					$src_height = imageSY($im_src);

					//Set ukuran gambar hasil perubahan
					$dst_width = 600;
					$dst_height = 600;

					//proses perubahan ukuran
					$im = imagecreatetruecolor($dst_width,$dst_height);
					imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

					//Simpan gambar
					imagejpeg($im,'images/'.$fileName,100);

					//Hapus gambar di memori komputer
					imagedestroy($im_src);
					imagedestroy($im);
					if($movie){
							$KK				=	$_POST['KK'];
					$mejelis		=	$_POST['mejelis'];
					$nama_jemaat	=	$_POST['nama_jemaat'];
					$id_KK			=	$_POST['id_KK'];									
					$id_rayon		=	$_POST['id_rayon'];
					$JK				=	$_POST['jk'];
					$tem_lahir		=	$_POST['tem_lahir'];
					$tgl_lahir		=	$_POST['tgl_lahir'];
					$pendidikan		=	$_POST['Pendidikan'];
					$pekerjaan		=	$_POST['Pekerjaan'];
					$id_rayon		=	$_POST['id_rayon'];
					$sts_nikah		=	$_POST['sts_nikah'];
					$sts_sidi		=	$_POST['sts_sidi'];
					$sts_baptis		=	$_POST['sts_baptis'];
					$alamat_jemaat	=	$_POST['alamat_jemaat'];
					$no_hp			=	$_POST['no_hp'];
					$Status			=	$_POST['Status'];
					$keterangan 	=$_POST['Keterangan'];
     	 $simpan = mysqli_query($konek,"Insert Into tb_jemaat (id_jemaat,gambar,KK,mejelis,id_KK,nama_jemaat,JK,Tem_Lahir,Tgl_Lahir,Pendidikan,Pekerjaan,id_rayon,Status,sts_nikah,sts_sidi,sts_baptis,alamat_jemaat,Keterangan)
								values('','$fileName','$KK','$mejelis','$id_KK','$nama_jemaat','$JK','$tem_lahir','$tgl_lahir','$pendidikan','$pekerjaan','$id_rayon','$Status','$sts_nikah','$sts_sidi','$sts_baptis','$alamat_jemaat','$keterangan')");
						if($simpan){
						  ?>
						 <script type="text/javascript">
							alert("sukses");window.location='tambahjemaat.php'
						</script>
						<?php
					} else {
						?>
						<script type="text/javascript">
							alert("gagal");
						</script>
						  <?php
						}
					  }
					  }
				?>
<?php
}
?>