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
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
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
        $("#tgl_peng").datepicker({
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
			  <h2>Update Data Pengumuman</h2>
			  <?php
					ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
						$id_peng =$_GET['id_peng'];
						$edit = "SELECT * FROM tb_pengumuman where id_peng='$id_peng'";
						$hasil = mysqli_query($konek, $edit);
						$r = mysqli_fetch_array($hasil);
				?>
				<form name='simpan' method="POST" action="../admin_pengumuman_update_aksi.php" enctype="multipart/form-data">
					<table>
						<tr>
							<th></th>
							<td></td>
							<td><input type="text" name="id_peng" hidden="hidden" value="<?php echo "$r[id_peng]";?>"></td>
						</tr>
						<tr>
							<th>Judul Pengumuman</th>
							<td>:</td>
							<td><input name="judul_peng" type="text" value="<?php echo "$r[judul_peng]";?>"  size="30"></td>
						</tr>
						<tr>
							<th>Isi Pengumuman</th>
							<td>:</td>
							<td><textarea name="isi_peng" type="text" cols="23" rows="3"><?php echo "$r[isi_peng]";?></textarea></td>
						</tr>
						<tr>
							<th>Tgl.Posting</th>
							<td>:</td>
							<td><input name="tgl_peng" type="text" id="tgl_peng" value="<?php echo "$r[tgl_peng]";?>"  size="30"></td>
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
				
			
				<a href="admin_pengumuman.php">-Lihat Data- </a>
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