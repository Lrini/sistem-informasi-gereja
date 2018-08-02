<?php
include"library/koneksi.php";
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
			<h2>Data Majelis Gereja</h2>
			<h2>
			<?php
			$batas 		= 10;
			$halaman	= @$_GET['halaman'];
			if(empty($halaman)){
				$posisi		=	0;
				$halaman	=	1;
			}else{
				$posisi	= ($halaman-1) * $batas;
			}
			//langkah 2, sesuaikan query dengan posisi dan batas
			$query  = "SELECT * FROM tb_jab_detail,tb_jabatan,tb_rayon,tb_jemaat where tb_jab_detail.id_jabatan=tb_jabatan.id_jabatan
						AND tb_jab_detail.id_rayon=tb_rayon.id_rayon
						AND tb_jab_detail.id_jemaat=tb_jemaat.id_jemaat LIMIT $posisi,$batas";
			$tampil = mysqli_query($konek, $query);
			echo"<table font weight=bold width=900px>
				<tr align=center bgcolor=#fac907> 
					<td>Id Majelis</td>
					<td>Nama Jemaat</td>
					<td>Jenis Kelamin</td>
					<td>Tempat Lahir</td>
					<td>Tanggal Lahir</td>
					<td>Rayon</td>
					<td>Jabatan</td>
					<td>Status Aktif</td>
					<td>Tanggal Aktif</td>
					<td>Tanggal Vakum</td>
					<td>Periode</td>
					<td>Nomor Tlp/HP</td>
					<td>Alamat</td>
					<td>Action</td>
				</tr>";
				$no=$posisi+1;
				while ($r = mysqli_fetch_array($tampil)){
				echo "<tr bgcolor=white>";
				echo "<td align=center>$r[id_majelis]</td>
					<td align=center> $r[nama_jemaat]</td>
					<td align=center>$r[jns_kelamin]</td>
					<td align=center>$r[tem_lahir]</td>
					<td align=center>$r[tgl_lahir]</td>
					<td align=center>$r[nama_rayon]</td>
					<td align=center>$r[ket_jabatan]</td>
					<td align=center>$r[sts_aktif]</td>
					<td align=center>$r[tgl_aktif]</td>
					<td align=center>$r[tgl_vakum]</td>
					<td align=center>$r[periode]</td>
					<td align=center>$r[no_hp]</td>
					<td align=center>$r[alamat_jemaat]</td>
					<td align=center> <a href =majelisupdate.php?id_majelis=$r[id_majelis]>Update</a>
						<br><a href =../admin_majelis_delete.php?id_majelis=$r[id_majelis]>Delete</a></td>
				</tr>";
				$no++;
			}
			echo "</table>";
			//langkah :  hitung total  data halaman serta link
			$query2		= mysqli_query($konek, "SELECT * FROM tb_jab_detail,tb_jabatan,tb_rayon,tb_jemaat where tb_jab_detail.id_jabatan=tb_jabatan.id_jabatan
						AND tb_jab_detail.id_rayon=tb_rayon.id_rayon
						AND tb_jab_detail.id_jemaat=tb_jemaat.id_jemaat");
			$jmldata	= mysqli_num_rows($query2);
			$jmlhalaman	= ceil($jmldata/$batas);
			
			echo"<br> Halaman : ";
				for($i=1; $i<=$jmlhalaman;$i++)
					if($i != $halaman){
						echo" <a href=\"majelis.php?halaman=$i\">$i</a> | ";
					}
					else{ echo"<b>$i</b>|";}
					echo"<p> Total Data : <b>$jmldata</b> Data </p>";
			?>
			</h2>
			</center>
		</div>
        
</body>
</html>
<?php
}
?>