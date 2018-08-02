<?php
session_start();
include"library/koneksi.php";
error_reporting(0);
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
        $("#tgl_aktif,#tgl_vakum").datepicker({
		  dateFormat  : "yy/mm/dd",        
          changeMonth : true,
          changeYear  : true					
        });      
	 });
    </script>

<body>
<div id="tooplate_wrapper">
	<div id="tooplate_header">
		<div id="tooplate_middle1">
			<div id="site_title" =><a href="#">Halaman Administrator</a></div>
		</div>
    </div>
    
    <div id="tooplate_menu">
          <?php
			include"library/menu_bar.php";
		  ?>
		  
    </div> <!-- end of tooplate_menu -->
    
	<div id="tooplate_middle2">
    	<div id="middle_left1">
            <div id="site_title">
				<a href="admin_tambah_majelis.php">-+Tambah Data Majelis - </a>
			</div>
        </div>
		
	</div>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
           	  <div class="news_box">
			  <h2>Update Data Majelis </h2>
			  <?php
					ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
						$id_majelis =$_GET['id_majelis'];
						$edit = "SELECT * FROM tb_jab_detail,tb_jabatan,tb_rayon,tb_jemaat where tb_jab_detail.id_jabatan=tb_jabatan.id_jabatan
						AND tb_jab_detail.id_rayon=tb_rayon.id_rayon
						AND tb_jab_detail.id_jemaat=tb_jemaat.id_jemaat AND id_majelis='$id_majelis'";
						$hasil = mysqli_query($konek, $edit);
						$r = mysqli_fetch_array($hasil);
				?>
				<form method="POST" action="admin_majelis_update_aksi.php" enctype="multipart/form-data">
					<table>
					<tr>
							<th></th>
							<td></td>
							<td><input type="text" name="id_majelis" hidden="hidden" value="<?php echo "$r[id_majelis]";?>"></td>
						</tr>
					<tr>
							<th>Nama Jemaat</th>
							<td>:</td>
							<td>
								<?php
									echo"<select name=\"nama_jemaat\">";
									$query2 = "SELECT * FROM tb_jemaat ";
									$hasil2 = mysqli_query($konek,$query2);
									while ($r2=mysqli_fetch_array($hasil2)){
									if($r['id_jemaat']==$r2['id_jemaat']){
										echo"<option value=\"$r2[id_jemaat]\" selected>
											$r2[nama_jemaat]</option>";
											}else{
											echo"<option value=\"$r2[id_jemaat]\" selected>
											$r2[nama_jemaat]</option>";
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
									$query2 = "SELECT * FROM tb_rayon ";
									$hasil2 = mysqli_query($konek,$query2);
									while ($r2=mysqli_fetch_array($hasil2)){
									if($r['id_rayon']==$r2['id_rayon']){
										echo"<option value=\"$r2[id_rayon]\" selected>
											$r2[nama_rayon]</option>";
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
          <th>Periode</td>
          <td>:</td>
          <td><select name="periode" required>
            <option value="2015-2020">2015-2020</option>
            <option value="2021-2025">2021-2025</option>
            <option value="2026-2030">2026-2030</option>
            <option value="2031-2035">2031-2035</option>
            <option value="2036-2040">2036-2040</option>
            <option value="2041-2045">2041-2045</option>
			<option value="2046-2050">2046-2050</option>
            </select>
			</td>
         </tr>
				<tr>
					<th>Jabatan</th> 
					<td>:</td>
					<td>
						<?php
							/* <select id="jabatan" name="ket_jabatan" onchange="toggleFoobar()"> */
							echo"<select name=\"ket_jabatan\" >";
							$query2 = "SELECT * FROM tb_jabatan";
							$hasil2 = mysqli_query($konek,$query2);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r['id_jabatan']==$r2['id_jabatan']){
								echo"<option value=\"$r2[id_jabatan]\" selected>
									$r2[ket_jabatan]</option>";
									}else{
										echo"<option value=\"$r2[id_jabatan]\" selected>
										$r2[ket_jabatan]</option>";
									}
								}
							echo"</select>";
							
						?>
					</td>
				</tr>
				<tr class="foobar">
					<th>Status Aktif</th>
					<td>:</td>
					<td><input name='sts_aktif' type='radio' value='aktif' checked="checked"/>Aktif 
						<input name='sts_aktif' type='radio' value='tidak aktif'/>Tidak Akitf</td>
				</tr>
				<tr class="foobar">
					<th>Tanggal Aktif</th>
					<td>:</td>
					<td><input name="tgl_aktif" type="text" id="tgl_aktif"  size="30" value="<?php echo "$r[tgl_aktif]";?>"></td>
				</tr>
				<tr class="foobar">
					<th>Tanggal Vakum</th>
					<td>:</td>
					<td><input name="tgl_vakum" type="text" id="tgl_vakum"  size="30" value="<?php echo "$r[tgl_vakum]";?>"></td>
				</tr>
	
						<tr>
							<td>
							</td>
							<td>
							</td>
							<td>
								<input type=submit value=Simpan>
								<input type=button value=Batal onclick=self.history.back()>
							</td>
						</tr>
					</table>
				</form>
				
			
				<a href="admin_majelis.php">-Lihat Data- </a>
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