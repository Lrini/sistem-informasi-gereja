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
				<a href="admin_tambah_jadwal.php">-+Tambah Data Jadwal - </a>
			</div>
        </div>
		
	</div>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
           	  <div class="news_box">
			  <h2>Update Data Jadwal Ibadat</h2>
			  <?php
					//ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
						$id_jadwal =$_GET['id_jadwal'];
						$edit = "SELECT * FROM tb_jadwal where id_jadwal='$id_jadwal'";
						$hasil = mysqli_query($konek, $edit);
						$r = mysqli_fetch_array($hasil);
				?>
				<form method="POST" action="admin_jadwal_update_aksi.php" enctype="multipart/form-data">
					<table>
					<tr>
							<th></th>
							<td></td>
							<td><input type="text" name="id_jadwal" hidden="hidden" value="<?php echo "$r[id_jadwal]";?>"></td>
						</tr>
					<tr>
					<th>Tempat Rumah Ibadat</th>
					<td>:</td>
					<td><input name="tem_ibadat" type="text"  size="30" value="<?php echo "$r[tem_ibadat]";?>"></td>
				</tr>
					<tr>
					<th>Pemimpin Ibadat</th>
					<td>:</td>
					<td><input name="pim_ibadat" type="text"  size="30" value="<?php echo "$r[pim_ibadat]";?>"></td>
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
					      <th>Tanggal Ibadat</th>
					      <td>:</td>
					      <td><input name="tgl_ibadat" type="text" id="tgl_ibadat"  size="30" value="<?php echo "$r[tgl_ibadat]";?>"></td>
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