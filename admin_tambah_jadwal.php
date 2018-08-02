<?php
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
<link href="css/style.css" rel="stylesheet" type="text/css" />

<link type="text/css" href="js/tanggaljava/themes/ui-lightness/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="js/tanggaljava/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_ibadat").datepicker({
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
			
		</div>
    </div>
    
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
           	  <div class="news_box">
           	  <center>
			  <h2>Tambah Data Jadwal Ibadat</h2>
				<form name='simpan' method="POST" action="../admin_tambah_jadwal_aksi.php" enctype="multipart/form-data">
					<table>
					<tr>
							<th>Tempat Ibadat</th>
							<td>:</td>
							<td><input name="tem_ibadat" type="text"  size="30"></td>
						</tr>
					<tr>
							<th>Pemimpin Ibadat</th>
							<td>:</td>
							<td><input name="pim_ibadat" type="text" size="30"></td>
						</tr>
						<tr>
							<th>Rayon</th>
							<td>:</td>
							<td>
								<?php					
									$QS = "select * from tb_rayon";
									$result = mysqli_query($konek, $QS);
									?>
									<select name= "id_rayon" id="id_rayon" class="form-control " type="text">
									<option>id | nama rayon</option> 
									<?php while ($data = mysqli_fetch_array($result)) 
										{ ?>
											<option value='<?php echo $data['id_rayon'] ?>'><?php echo $data['id_rayon'] ?> | <?php echo $data['nama_rayon'] ?></option>
										<?php } ?>
									</select>		
							</td>
						</tr>
						<tr>
					      <th>Tanggal Ibadat</th>
					      <td>:</td>
					      <td><input name="tgl_ibadat" type="text" id="tgl_ibadat"  size="30"></td>
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
				
			
				<font size="4"><a href="jadwal.php">-Lihat Data- </a></font>
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