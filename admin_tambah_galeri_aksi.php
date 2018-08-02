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
							$id_galery		=	$_POST['id_galery'];
								$keterangan		= $_POST['keterangan'];
								$tgl_post = $_POST ['tgl_post'];
								 $simpan = mysqli_query($konek,"insert into tb_galery (id_galery,gambar,keterangan,tgl_post) values ('','$fileName','keterangan','$tgl_post')");
					
						if($simpan){
						  ?>
						 <script type="text/javascript">
							alert("sukses");window.location='admin/tambahgaleri.php'
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