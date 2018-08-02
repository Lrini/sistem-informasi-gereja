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
}
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
			  <h2>Update Renungan</h2>
			  <?php
					ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
						$id_renungan =$_GET['id_renungan'];
						$edit = "SELECT * FROM tb_renungan where id_renungan='$id_renungan'";
						$hasil = mysqli_query($konek, $edit);
						$r = mysqli_fetch_array($hasil);
				?>
				<form method="POST" action="admin_renungan_update_aksi.php" enctype="multipart/form-data">
					<table width="900px">
					<tr>
							<th></th>
							<td></td>
							<td><input type="text" name="id_renungan" hidden="hidden" value="<?php echo "$r[id_renungan]";?>"></td>
						</tr>
						<tr>
							<th>Judul Renungan</th>
							<td>:</td>
							<td><input name="jdl_renungan" type="text" value="<?php echo "$r[jdl_renungan]";?>" size="30"></td>
						</tr>
						
						<tr>
							<th>Tgl.Posting</th>
							<td>:</td>
							<td><input name="tgl_post" type="text" id="tgl_post" value="<?php echo "$r[tgl_post]";?>"  size="30"></td>
						</tr>
						<tr>
							<th>Status Posting</th>
							<td>:</td>
							<td>
								<?php
									echo "<input name='sts_renungan' type='radio' value='Y'"; if($r['sts_renungan']=='Y'){ echo "checked";} echo "/>Ya ";
									echo "<input name='sts_renungan' type='radio' value='N'"; if($r['sts_renungan']=='N'){ echo "checked";} echo "/>Tidak";
									?>
								</td>
							<tr>
							<th>Isi Renungan</th>
							<td>:</td>
							<td><textarea name="isi_renungan" type="text" cols="50" rows="5"><?php echo "$r[isi_renungan]";?></textarea></td>
						</tr>
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
				
			
				<a href="admin_renungan.php">-Lihat Data- </a>
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