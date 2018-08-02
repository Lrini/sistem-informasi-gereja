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
				<form name='simpan' method="POST" action="../admin_tambah_majelis_aksi.php" enctype="multipart/form-data">
					<table>
					<tr>
							<th>Nama Majelis</th>
							<td>:</td>
							<td>
								<?php					
									$QS = "select * from tb_jemaat";
									$result = mysqli_query($konek, $QS);
									?>
									<select name= "id_jemaat" id="id_jemaat" class="form-control " type="text">
									<option>id | nama jemaat</option> 
									<?php while ($data = mysqli_fetch_array($result)) 
										{ ?>
											<option value='<?php echo $data['id_jemaat'] ?>'><?php echo $data['id_jemaat'] ?> | <?php echo $data['nama_jemaat'] ?></option>
										<?php } ?>
									</select>		
							</td>
						</tr>
		<tr>
					<th>Status</th> 
					<td>:</td>
					<td>
					<select name="status" class="form-control" type="text">
                    <option>Pilihan</option>					
						<option value='Aktif'>Aktif</option>
						<option value='nonaktif'>Tidak Aktif</option>
					</select>
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
						<th>Pengurus Gereja</th>
						<td>:</td>
						<td><input type="text" name="pengurus_gereja"></td>
					</tr>
				<tr>
				<th>Pengurus Rayon</th>
				<td>:</td>
					<td>
                  <select name="pengurus_rayon" class="form-control" type="text">
                    <option>Pilihan</option>					
						<option value='ketua'>KETUA KOORDINATOR RAYON</option>
						<option value='anggota'>ANGGOTA KOORDINATOR</option>
                  </select>
				  </td>
				</tr>
				<tr>
					<th>Jabatan</th> 
					<td>:</td>
					<td>
					<select name="jabatan" class="form-control" type="text">
                    <option>Pilihan</option>					
						<option value='PENDETA'>Pendeta</option>
						<option value='PENATUA'>Penatua</option>
						<option value='DIAKEN'>Diaken</option>
						<option value='PENGAJAR'>Pengajar</option>
						
					</select>
					</td>
				</tr>
				
				
						
						<tr>
							<td>
							</td>
							<td>
							</td>
							<td>
									<input type="submit" name='submit' class="button" value="simpan" />
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