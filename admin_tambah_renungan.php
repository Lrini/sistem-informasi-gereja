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
<script type="text/javascript" src="js/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
<link type="text/css" href="js/tanggaljava/themes/ui-lightness/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="js/tanggaljava/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_post").datepicker({
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
			  <h2>Tambah Renungan</h2>
				<form name="simpan" method="POST" action="../admin_tambah_renungan_aksi.php" enctype="multipart/form-data">
					<table width="900px">
						<tr>
						<th>Pengurus Rayon</th>
						<td>:</td>
							<td>
						  <select name="renungan" class="form-control" type="text">
							<option>Pilihan</option>					
								<option value='kebaktian'>kebaktian</option>
								<option value='anggota'>harian</option>
						  </select>
						  </td>
						</tr>
						<tr>
							<th>Judul Renungan</th>
							<td>:</td>
							<td><input name="jdl_renungan" type="text"  size="30"></td>
						</tr>
						<tr>
							<th>Tgl.Posting</th>
							<td>:</td>
							<td><input name="tgl_post" type="text" id="tgl_post"  size="30"></td>
						</tr>
						<tr>
							<th>Status Posting</th>
							<td>:</td>
							<td><input name='sts_renungan' type='radio' value='Y' checked="checked" value='Y'/>Ya 
								<input name='sts_renungan' type='radio' value='N'/>Tidak</td>
						</tr>
						<tr>
							<th>Isi Renungan</th>
							<td>:</td>
							<td><textarea name="isi_renungan" type="text" cols="50" rows="5"></textarea></td>
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
				
			
				<font size="4"><a href="renungan.php">-Lihat Data- </a></font>
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