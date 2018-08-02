<?php
session_start();
include"library/koneksi.php";
//apabila user belumlogin
if ((empty($_SESSION['username'])) AND (empty($_SESSION['password']))){
	echo"<script type=text/javascript>alert('Anda harus Login Terlebih Dahulu'); window.location = 'login.php'</script>)";
}
//apabila user sudah login
else{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Admin </title>
<link href="images/gambar1.png" rel="shortcut icon" title="Favicon" />
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="js/tanggaljava/themes/ui-lightness/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="js/tanggaljava/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_lahir,#tgl_masuk,#tgl_vakum").datepicker({
		  dateFormat  : "yy/mm/dd",        
          changeMonth : true,
          changeYear  : true					
        });      
      });

    </script>
<script type="text/javascript" src="js/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
<body>
<div id="tooplate_wrapper">
	<div id="tooplate_header">
		<div id="tooplate_middle1">
			<marquee>
			<div id="site_title" =><a href="#">Selamat Datang Di Halaman Admin Rayon </a></div>
			</marquee>
		</div>
    </div>
    
    <div id="tooplate_menu">
          <?php
			include"library/menu_bar1.php";
		  ?>
		  
    </div> <!-- end of tooplate_menu -->
    
	<div id="tooplate_middle2">
    	<div id="middle_left1">
            <div id="site_title">
				<?php
					include"library/menu_subbar1.php";
					
				?>
			</div>
        </div>
		
	</div>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
           	  <div class="news_box">
			  <h2>Update Data Jemaat</h2>
			  <?php
					ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
						$id_jemaat =$_GET['id_jemaat'];
						$edit = "SELECT * FROM tb_jemaat where id_jemaat='$id_jemaat'";
						$hasil = mysqli_query($konek, $edit);
						$r = mysqli_fetch_array($hasil);
				?>
			  <form method="POST" action="admin_jemaat_update_aksi_rayon.php" enctype="multipart/form-data">
			  <table>
			  <tr>
			  <th></th>
			  <td></td>
			  <td><input type="text" name="id_jemaat" hidden="hidden" value="<?php echo "$r[id_jemaat]";?>"></td>
			  </tr>
			  <tr>
					<th>Nama KK</th>
					<td>:</td>
					<td>
						<?php
							echo"<select name=\"nama_kk\">";
							$query2 = "SELECT * FROM tb_kk";
							$hasil2 = mysqli_query($konek,$query2);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r1['id_kk']==$r2['id_kk']){
								echo"<option value=\"$r2[id_kk]\" selected>
									$r2[nm_kategori]</option>";
									}else{
										echo"<option value=\"$r2[id_kk]\" selected>
										$r2[nama_kk]</option>";
									}
								}
							echo"</select>";
						?>
					</td>
				</tr>
			 <tr>
					<th>Nama Jemaat</th>
					<td>:</td>
					<td><input name="nama_jemaat" type="text"  size="30" value="<?php echo "$r[nama_jemaat]";?>"></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td>:</td>
					<td>
				       <?php
					    echo "<input name='jns_kelamin' type='radio' value='Laki-Laki'"; if($r['jns_kelamin']=='Laki-Laki'){ echo "checked";} echo "/>Laki-Laki";
					    echo "<input name='jns_kelamin' type='radio' value='Perempuan'"; if($r['jns_kelamin']=='Perempuan'){ echo "checked";} echo "/>Perempuan";
				       ?>
				   </td>
				</tr>
				<tr>
					<th>Tempat Lahir</th>
					<td>:</td>
					<td><input name="tem_lahir" type="text"  size="30" value="<?php echo "$r[tem_lahir]";?>"></td>
				</tr>
				<tr>
					<th>Tanggal Lahir</th>
					<td>:</td>
					<td><input name="tgl_lahir" type="text" id="tgl_lahir"  size="30" value="<?php echo "$r[tgl_lahir]";?>"></td>
				</tr>
				<tr>
					<th>Pendidikan Terakhir</th>
					<td>:</td>
					<td>
						<?php
							echo"<select name=\"pendidikan\">";
							$query2 = "SELECT * FROM tb_pendidikan";
							$hasil2 = mysqli_query($konek,$query2);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r1['id_pendidikan']==$r2['id_pendidikan']){
								echo"<option value=\"$r2[id_pendidikan]\" selected>
									$r2[nm_kategori]</option>";
									}else{
										echo"<option value=\"$r2[id_pendidikan]\" selected>
										$r2[pendidikan]</option>";
									}
								}
							echo"</select>";
						?>
					</td>
				</tr>
				
				<tr>
					<th>Pekerjaan</th>
					<td>:</td>
					<td>
						<?php
							echo"<select name=\"pekerjaan\">";
							$query2 = "SELECT * FROM tb_pekerjaan";
							$hasil2 = mysqli_query($konek,$query2);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r1['id_pekerjaan']==$r2['id_pekerjaan']){
								echo"<option value=\"$r2[id_pekerjaan]\" selected>
									$r2[nm_kategori]</option>";
									}else{
										echo"<option value=\"$r2[id_pekerjaan]\" selected>
										$r2[pekerjaan]</option>";
									}
								}
							echo"</select>";
						?>
					</td>
				</tr>
				
				<tr>
					<th>Rayon</th>
					<td>:</td>
					<td>
						<?php
							echo"<select name=\"nama_rayon\">";
							$query2 = "SELECT * FROM tb_rayon";
							$hasil2 = mysqli_query($konek,$query2);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r1['id_rayon']==$r2['id_rayon']){
								echo"<option value=\"$r2[id_rayon]\" selected>
									$r2[nm_kategori]</option>";
									}else{
										echo"<option value=\"$r2[id_rayon]\" selected>
										$r2[nama_rayon]</option>";
									}
								}
							echo"</select>";
						?>
					</td>
				</tr>
				<tr>
					<th>Status Nikah</th>
					<td>:</td>
					<td><input name='sts_nikah' type='radio' value='Menikah'  checked="checked"/>Menikah 
						<input name='sts_nikah' type='radio' value='Belum Menikah' />Belum Menikah</td>
				</tr>
				<tr>
					<th>Status Sidi</th>
					<td>:</td>
					<td><input name='sts_sidi' type='radio' value='sidi'  checked="checked"/>Sidi 
						<input name='sts_sidi' type='radio' value='Belum Sidi' />Belum Sidi</td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><input name="alamat_jemaat" type="text"   size="30" value="<?php echo "$r[alamat_jemaat]";?>"</td>
				</tr>
				<tr>
					<th>No Telp</th>
					<td>:</td>
					<td><input name="no_hp" type="text"   size="30" value="<?php echo "$r[no_hp]";?>"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
					    <input type=submit value=Simpan>
						<input type=button value=Batal onclick=self.history.back()>
					</td>
				</tr>
			</table>
			</form>
			<a href="admin_jemaat_rayon.php">-Lihat Data- </a>
                <div class="cleaner"></div>
            </div>    
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
    
        
</div> <!-- end of wrapper -->
</body>
</html>
<?php
}
?>