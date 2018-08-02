<?php
session_start();
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

<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<body>
<div id="tooplate_wrapper">
	<div id="tooplate_header">
		<div id="tooplate_middle1">
			<marquee>
			<div id="site_title" =><a href="#">Selamat Datang Di Halaman Admin Rayon </a></div>
			</marquee>
		</div>
    </div>
    
    <div id="tooplate_menu">
          <?php
			include"library/menu_bar1.php";
		  ?>
		  
    </div> <!-- end of tooplate_menu -->
    
	<div id="tooplate_middle2">
    	<div id="middle_left1">
            <div id="site_title">
				<a href="admin_tambah_kk_rayon.php">-+Tambah Data KK - </a>
			</div>
        </div>
		
	</div>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
		<center>
			<h2>Data Kepala Keluarga</h2>
			<h6>
			<?php
			$batas 		= 5;
			$halaman	= @$_GET['halaman'];
			if(empty($halaman)){
				$posisi		=	0;
				$halaman	=	1;
			}else{
				$posisi	= ($halaman-1) * $batas;
			}
			//langkah 2, sesuaikan query dengan posisi dan batas
			$query  = "SELECT * FROM tb_kk LIMIT $posisi,$batas";
			$tampil = mysqli_query($konek, $query);
			echo"<table font weight=bold width=900px>
				<tr align=center bgcolor=#fac907> 
					<td>ID KK</td>
					<td>ID Jemaat</td>
					<td>Keterangan</td>
					<td width=70px>Action</td>
				</tr>";
				$no=$posisi+1;
				while ($r = mysqli_fetch_array($tampil)){
				echo "<tr bgcolor=white>";
				echo "<td><center>$r[id_kk]</center></font></td>
					<td><center>$r[id_jemaat]</center></td>
					<td><center>$r[keterangan]</center></td>
					<td align=center> <a href =kkupdate.php?id_kk=$r[id_kk]>Update</a>
						<br><a href =../admin_kk_delete.php?id_kk=$r[id_kk]>Delete</a></td>
				</tr>";
				$no++;
			}
			echo "</table>";
			//langkah :  hitung total  data halaman serta link
			$query2		= mysqli_query($konek,"select * from tb_keplai");
			$jmldata	= mysqli_num_rows($query2);
			$jmlhalaman	= ceil($jmldata/$batas);
			
			echo"<br> Halaman : ";
				for($i=1; $i<=$jmlhalaman;$i++)
					if($i != $halaman){
						echo" <a href=\"admin_kk_rayon.php?halaman=$i\">$i</a> | ";
					}
					else{ echo"<b>$i</b>|";}
					echo"<p> Total Data : <b>$jmldata</b> Data </p>";
			?>
			</h6>
			</center>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
    
</div> <!-- end of wrapper -->
</body>
</html>

<?php
}
?>