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
<body>
<div id="tooplate_wrapper">
	<div id="tooplate_header">
		
   	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
		<center>

			<h2>Data Detail Jemaat</h2>
			<h2>
			<a href="admin_jemaat.php"> Lihat Data</a>
			<?php
			$konek = mysqli_connect("localhost","root","","betel");
			$id_jemaat =$_GET['id_jemaat'];
			$tampil = mysqli_query($konek,"SELECT tb_jemaat.id_jemaat,tb_jemaat.KK,tb_jemaat.mejelis,tb_jemaat.nama_jemaat,tb_jemaat.JK,tb_jemaat.Tem_Lahir,tb_jemaat.Tgl_Lahir,tb_jemaat.Pendidikan,tb_jemaat.Pekerjaan,tb_jemaat.Status,tb_jemaat.sts_nikah,tb_jemaat.sts_sidi,tb_jemaat.sts_baptis,tb_jemaat.alamat_jemaat,tb_jemaat.Keterangan, tb_kepalai.id_KK, tb_rayon.nama_rayon from tb_jemaat,tb_kepalai,tb_rayon where tb_jemaat.id_rayon=tb_rayon.id_rayon and tb_jemaat.id_jemaat='$id_jemaat'" );
			
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
						<td><?php echo "$r[KK]";?></td>
					</tr>
					<tr>
						<th>Id KK</th>
						<td>:</td>
						<td><?php echo "$r[id_KK]";?></td>
					</tr>
					<tr>
						<th>Nama Jemaat</th>
						<td>:</td>
						<td><?php echo "$r[nama_jemaat]";?></td>
					</tr>
					<tr>
						<th>JK</th>
						<td>:</td>
						<td><?php echo "$r[JK]";?></td>
					</tr>
					<tr>
						<th>Tempat Lahir</th>
						<td>:</td>
						<td><?php echo "$r[Tem_Lahir]";?></td>
					</tr>
					<tr>
						<th>Tanggal Lahir</th>
						<td>:</td>
						<td><?php echo "";echo tgl_indo($r['Tgl_Lahir']);echo"";?></td>
					</tr>
					<tr>
						<th>Pendidikan</th>
						<td>:</td>
						<td><?php echo "$r[Pendidikan]";?></td>
					</tr>
					<tr>
						<th>Pekerjaan</th>
						<td>:</td>
						<td><?php echo "$r[Pekerjaan]";?></td>
					</tr>
					<tr>
						<th>Rayon</th>
						<td>:</td>
						<td><?php echo "$r[nama_rayon]";?></td>
					</tr>
					<tr>
						<th>majelis</th>
						<td>:</td>
						<td><?php echo "$r[mejelis]";?></td>
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
			</h2>
			</center>
			<!--<a href="admin_jemaat.php"> Lihat Data-->
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
    
        
</div> <!-- end of wrapper -->
</body>
</html>
<?php
}
?>