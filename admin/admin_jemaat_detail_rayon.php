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
				<a href="admin_tambah_jemaat_rayon.php">-+Tambah Data Jemaat - </a>
			</div>
        </div>
		
	</div>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
		<center>
			<h2>Data Detail Jemaat</h2>
			<h6>
			<a href="admin_jemaat_rayon.php"> Lihat Data</a>
			<?php
			$id_jemaat =$_GET['id_jemaat'];
			$query  = "SELECT * FROM tb_jemaat,tb_pekerjaan,tb_pendidikan,tb_kk,tb_rayon where tb_jemaat.id_pekerjaan=tb_pekerjaan.id_pekerjaan 
							AND tb_jemaat.id_pendidikan=tb_pendidikan.id_pendidikan 
							AND tb_jemaat.id_kk=tb_kk.id_kk
							AND tb_jemaat.id_rayon=tb_rayon.id_rayon AND id_jemaat='$id_jemaat'";
			$tampil = mysqli_query($konek, $query);
			
				$no=1;
				while ($r = mysqli_fetch_array($tampil)){
				
			?>
				<table>
				<tr>
						<th></th>
						<td></td>
					</tr>
					<tr>
						<th>Id Jemaat</th>
						<td>:</td>
						<td><?php echo "$r[id_jemaat]";?></td>
					</tr>
					<tr>
						<th>KK</th>
						<td>:</td>
						<td><?php echo "$r[kk]";?></td>
					</tr>
					<tr>
						<th>Id KK</th>
						<td>:</td>
						<td><?php echo "$r[id_kk]";?></td>
					</tr>
					<tr>
						<th>Nama Jemaat</th>
						<td>:</td>
						<td><?php echo "$r[nama_jemaat]";?></td>
					</tr>
					<tr>
						<th>Nama KK</th>
						<td>:</td>
						<td><?php echo "$r[nama_kk]";?></td>
					</tr>
					<tr>
						<th>JK</th>
						<td>:</td>
						<td><?php echo "$r[jk]";?></td>
					</tr>
					<tr>
						<th>Tempat Lahir</th>
						<td>:</td>
						<td><?php echo "$r[tem_lahir]";?></td>
					</tr>
					<tr>
						<th>Tanggal Lahir</th>
						<td>:</td>
						<td><?php echo "";echo tgl_indo($r['tgl_lahir']);echo"";?></td>
					</tr>
					<tr>
						<th>Pendidikan</th>
						<td>:</td>
						<td><?php echo "$r[pendidikan]";?></td>
					</tr>
					<tr>
						<th>Pekerjaan</th>
						<td>:</td>
						<td><?php echo "$r[pekerjaan]";?></td>
					</tr>
					<tr>
						<th>Rayon</th>
						<td>:</td>
						<td><?php echo "$r[id_rayon]";?></td>
					</tr>
					<tr>
						<th>majelis</th>
						<td>:</td>
						<td><?php echo "$r[majelis]";?></td>
					</tr>
					<tr>
						<th>Status Nikah</th>
						<td>:</td>
						<td><?php echo "$r[sts_nikah]";?></td>
					</tr>
					<tr>
						<th>Status Sidi</th>
						<td>:</td>
						<td><?php echo "$r[sts_sidi]";?></td>
					</tr>
					<tr>
						<th>Status Baptis</th>
						<td>:</td>
						<td><?php echo "$r[sts_baptis]";?></td>
					</tr>
					
					<tr>
						<th>Alamat</th>
						<td>:</td>
						<td><?php echo "$r[alamat_jemaat]";?></td>
					</tr>
					<tr>
						<th>Keterangan</th>
						<td>:</td>
						<td><?php echo "$r[Keterangan]";?></td>
					</tr>
					
					
					<?php
                      $no++;
                    }            
                    ?>
				</table>
			</h6>
			</center>
			<a href="admin_jemaat_rayon.php"> Lihat Data
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
    
        
</div> <!-- end of wrapper -->
</body>
</html>

<?php
}
?>