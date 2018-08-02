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

<body bgcolor=#f7f6e9>
       <center>
			<h2>Jadwal Ibadat Rumah Tangga</h2>
			<form action="admin_cetak_jadwal.php" method="get">
				Rayon :
				<?php
					echo"<SELECT name=\"nama_rayon\">";
					echo "<option value=\"Rayon 1\">Rayon 1</option>";
						echo "<option value=\"Rayon 2\">Rayon 2</option>";
						echo "<option value=\"Rayon 3\">Rayon 3</option>";
						echo "<option value=\"Rayon 4\">Rayon 4</option>";
						echo "<option value=\"Rayon 5\">Rayon 5</option>";
						echo "<option value=\"Rayon 6\">Rayon 6</option>";
						echo "<option value=\"Rayon 7\">Rayon 7</option>";
						echo "<option value=\"Rayon 8\">Rayon 8</option>";
						echo "<option value=\"Rayon 9\">Rayon 9</option>";
				?>
				
				<input type="submit" name="Search" value="Tampilkan" id="" title="Search" />
				</form>
			
			<h5>
			<?php
			ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
			$nama_rayon	= $_GET['nama_rayon'];
			//langkah 2, sesuaikan query dengan posisi dan batas
			$query  = "SELECT * FROM tb_jadwal,tb_rayon where tb_jadwal.id_rayon=tb_rayon.id_rayon AND nama_rayon='$nama_rayon'  order by tb_jadwal.id_jadwal";
			$tampil = mysqli_query($konek, $query);
			echo"<table font weight=bold width=900px >
				<tr align=center bgcolor=#0eb7cb height=30px> 
					<td>no</td>
					<td>Tempat Ibadat </td>
					<td>Pemimpin Ibadat</td>
					<td>Rayon</td>
					<td>Tanggal Ibadat</td>
				</tr>";
				$posisi=1;
				$no=$posisi+1;
				while ($r = mysqli_fetch_array($tampil)){
				echo "<tr bgcolor=white>";
				echo "<td align=center>$r[id_jadwal]</td>
					<td align=center> $r[tem_ibadat]</td>
					<td align=center>$r[pim_ibadat]</td>
					<td align=center>$r[nama_rayon]</td>
					<td align=center>$r[tgl_ibadat]</td>
				</tr>";
				$no++;
			}
			echo "</table>";
			//langkah :  hitung total  data halaman serta link
			?>
			</h5>
			<input class="noPrint" type="button" value="Cetak Halaman" onclick="window.print()">
			</center>
		
</body>
</html>

<?php
}
?>