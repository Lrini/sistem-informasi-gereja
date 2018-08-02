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
				<a href="admin_tambah_galeri.php">-+Tambah Data Gallery Foto - </a>
			</div>
        </div>
		
	</div>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
           	  <div class="news_box">
			  <h2>Tambah Gallery Foto</h2>
				<form method="POST" action="admin_tambah_galeri_aksi.php" enctype="multipart/form-data">
					<table>
						<tr>
							<th>Gambar</th>
							<td>:</td>
							<td><input name="fupload" type="file"  size="30"><a> Ukuran Gambar 450px X 350px</a></td>
							
						</tr>
						<tr>
							<th>Nama Foto</th>
							<td>:</td>
							<td><input name="judul" type="text"  size="30"></td>
						</tr>
						<tr>
							<th>Tanggal Posting</th>
							<td>:</td>
							<td><input name="tgl_post" type="text" id="tgl_post"  size="30"></td>
						</tr>
						<tr>
							<th>Status Posting</th>
							<td>:</td>
							<td><input name='sts_post' type='radio' value='Y' checked="checked" value='Y'/>Ya 
								<input name='sts_post' type='radio' value='N'/>Tidak</td>
						</tr>
						<tr>
							<th>Keterangan</th>
							<td>:</td>
							<td><textarea name="ket_gambar" type="text" cols="23" rows="3"></textarea></td>
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
				
			
				<a href="admin_galeri.php">-Lihat Data- </a>
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