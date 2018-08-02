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
				<a href="admin_tambah_kk.php">-+Tambah Data KK - </a>
			</div>
        </div>
		
	</div>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
           	  <div class="news_box">
			  <h2>Tambah Data KK</h2>
				<form method="POST" action="admin_tambah_kk_aksi.php" enctype="multipart/form-data">
					<table>
						<!-- <tr>
							<th>Nama KK</th>
							<td>:</td>
							<td><input name="nama_kk" type="text"  size="30"></td>
						</tr>
						-->
						<tr>
							<th>Id KK</th>
							<td>:</td>
							<td><input name="id_KK" type="text"  size="30"></td>
						</tr>
						<tr>
					<th>Nama KK</th>
					<td>:</td>
					<td>					
					<?php
							echo"<select name=\"nama_kk\">";
							$kepKel = mysql_query("SELECT id_jemaat from tb_kepalai");
							$idJmts = [];
							while ($l = mysql_fetch_array($kepKel)) {
							array_push($idJmts, $l['id_jemaat']);
							}
							$idJmts = '(' . implode(',', $idJmts) . ')';
							
							$QS = "SELECT id_jemaat, nama_jemaat
									FROM tb_jemaat
									WHERE (id_jemaat NOT IN $idJmts) AND (status_kk =  'SUAMI' OR status_kk =  'SUAMI-DUDA'
									OR status_kk =  'ISTRI-JANDA' OR status_kk =  'ANAK-SENDIRI' OR nama_jemaat ='KOSONG')";
							
							$hasil2 = mysqli_query($konek,$QS);
							//echo" <select name=\"status_kk\" class=\"form-control\" type=\"text\"> " ;
							while ($r2=mysqli_fetch_array($hasil2))
							{
								echo"<option value=\"$r2[id_jemaat]\" selected> $r2[nama_jemaat]</option>";
							}
							
							/*$query2 = "SELECT * FROM tb_jemaat =";														
							$hasil2 = mysqli_query($konek,$QS);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r['id_kk']==$r2['id_kk']){
								echo"<option value=\"$r2[id_kk]\" selected>
									$r2[nm_kategori]</option>";
									}else{
										echo"<option value=\"$r2[id_kk]\" selected>
										$r2[nama_jemaat]</option>";
									}
								}
								*/
							echo"</select>";
						?>
					</td>						 						
					
				</tr>
				<tr>
				<td>
				<a href="admin_tambah_kk.php">Tambah Nama KK</a>
				</td>
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
				
			
				<a href="admin_kk.php">-Lihat Data- </a>
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