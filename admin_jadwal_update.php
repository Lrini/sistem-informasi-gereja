<?php
include"library/koneksi.php";
include"library/fungsi_indotgl.php";

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
		
   	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
		<center>
			  <h2>Update Data Jadwal Ibadat</h2>
			  <?php
					//ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
						$id_jadwal =$_GET['id_jadwal'];
						$edit = "SELECT * FROM tb_jadwal where id_jadwal='$id_jadwal'";
						$hasil = mysqli_query($konek, $edit);
						$r = mysqli_fetch_array($hasil);
				?>
				<form name="simpan" method="POST" action="../admin_jadwal_update_aksi.php" enctype="multipart/form-data">
					<table>
					<tr>
							<th></th>
							<td></td>
							<td><input type="text" name="id_jadwal" hidden="hidden" value="<?php echo "$r[id_jadwal]";?>"></td>
						</tr>
					<tr>
					<th>Tempat Rumah Ibadah</th>
					<td>:</td>
					<td><input name="tem_ibadah" type="text"  size="30" value="<?php echo "$r[tem_ibadah]";?>"></td>
				</tr>
					<tr>
					<th>Pemimpin Ibadah</th>
					<td>:</td>
					<td><input name="pim_ibadah" type="text"  size="30" value="<?php echo "$r[pim_ibadah]";?>"></td>
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
										<option>id | nama Rayon</option> 
										<?php while ($data = mysqli_fetch_array($result)) 
											{ ?>
												<option value='<?php echo $data['id_rayon'] ?>'><?php echo $data['id_rayon'] ?> | <?php echo $data['nama_rayon'] ?></option>
								<?php } ?>
										</select>						
							</td>
						</tr>
						<tr>
					      <th>Tanggal Ibadah</th>
					      <td>:</td>
					      <td><input name="tgl_ibadah" type="text" id="tgl_ibadah"  size="30" value="<?php echo "$r[tgl_ibadah]";?>"></td>
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
				
			
				<a href="admin_jadwal.php">-Lihat Data- </a>
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