<?php
include"library/koneksi.php";
include"library/fungsi_indotgl.php";
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
<link href="css/style.css" rel="stylesheet" type="text/css" />

<link type="text/css" href="js/tanggaljava/themes/ui-lightness/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="js/tanggaljava/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript"> 
     $(document).ready(function(){
        $("#tgl_lahir,#tgl_aktif,#tgl_vakum").datepicker({
		  dateFormat  : "yy/mm/dd",        
          changeMonth : true,
          changeYear  : true					
        });      
		
		$("#jabatan").attr("value", 5);
		$(".foobar").css("visibility", "hidden");
		$("#jabatan").on("change", function(foo) {
			var jab = $("#jabatan").attr("value");
			console.log("jabatan = ", jab);
		
			if (jab == 5)
				$(".foobar").css("visibility", "hidden");
			else
				$(".foobar").css("visibility", "visible");
			});
		});
	  
    </script>
<body>
<div id="tooplate_wrapper">
	<div id="tooplate_header">
		
   	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
		<center>
			  <h2>Tambah Data Majelis Gereja</h2>
				<form method="POST" action="../admin_tambah_majelis_aksi.php" enctype="multipart/form-data">
					<table>
					<tr>
							<th>Nama Jemaat</th>
							<td>:</td>
							<td>
								<?php
									echo"<select name=\"nama_jemaat\">";
									$query2 = "SELECT * FROM tb_jemaat";
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
							echo"<select id=\"jabatan\" name=\"ket_jabatan\" >>";
							$query2 = "SELECT * FROM tb_jabatan";
							$hasil2 = mysqli_query($konek,$query2);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r['id_jabatan']==$r2['id_jabatan']){
								echo"<option value=\"$r2[id_jabatan]\" selected>
									$r2[nm_kategori]</option>";
									}else{
										echo"<option value=\"$r2[id_jabatan]\" selected>
										$r2[ket_jabatan]</option>";
									}
								}
							echo "<option value=\"5\" selected>";
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
					<td><input name="tgl_aktif" type="text" id="tgl_aktif"  size="30"></td>
				</tr>
				<tr class="foobar">
					<th>Tanggal Vakum</th>
					<td>:</td>
					<td><input name="tgl_vakum" type="text" id="tgl_vakum"  size="30"></td>
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
				
			
				<font size="4"><a href="majelis.php">-Lihat Data- </a></font>
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