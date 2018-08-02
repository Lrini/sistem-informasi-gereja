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
			<h2>Data Majelis</h2>
			<form action="admin_majelis_detail_cetak.php" method="get">
				Periode :
				<?php
					echo "<SELECT name=\"periode\">";
					echo "<option value=\"2015-2020\">2015-2020</option>";
					echo "<option value=\"2021-2025\">2021-2025</option>";
					echo "<option value=\"2026-2030\">2026-2030</option>";
					echo "<option value=\"2031-2035\">2031-2035</option>";
					echo "<option value=\"2036-2040\">2036-2040</option>";
					echo "<option value=\"2041-2045\">2041-2045</option>";
					echo "<option value=\"2046-2050\">2046-2050</option>";
				?>
				<input type="submit" name="Search" value="Tampilkan" id="" title="Search" />
				</form>
			
			<h5>
			<?php
			ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
			$periode =$_GET['periode'];
			$query  = "SELECT * FROM tb_jab_detail,tb_jabatan,tb_rayon,tb_jemaat where tb_jab_detail.id_jabatan=tb_jabatan.id_jabatan
						AND tb_jab_detail.id_rayon=tb_rayon.id_rayon
						AND tb_jab_detail.id_jemaat=tb_jemaat.id_jemaat AND periode='$periode'  order by tb_jab_detail.id_majelis";
			$tampil = mysqli_query($konek, $query);
			echo"<table font weight=bold width=900px >
				<tr align=center bgcolor=#0eb7cb height=30px> 
					<td>id_majelis</td>
					<td>Nama Majelis</td>
					<td>Jenis Kelamin</td>
					<td>Tempat Lahir</td>
					<td>Tanggal Lahir</td>
					<td>Rayon</td>
					<td>Jabatan  </td>
					<td>Status Aktif</td>
					<td>Tanggal Aktif</td>
					<td>Tanggal Vakum</td>
					<td>Periode</td>
					<td>Nomor Tlp/HP</td>
					<td>Alamat</td>
				</tr>";
				$posisi=1;
				$no=$posisi+1;
				while ($r = mysqli_fetch_array($tampil)){
				echo "<tr bgcolor=white>";
				echo "<td align=center>$r[id_majelis]</td>
					<td align=center> $r[nama_jemaat]</td>
					<td align=center>$r[jns_kelamin]</td>
					<td align=center>$r[tem_lahir]</td>
					<td align=center>$r[tgl_lahir]</td>
					<td align=center>$r[nama_rayon]</td>
					<td align=center bgcolor=#0eb7cb>$r[ket_jabatan] </td>
					<td align=center>$r[sts_aktif]</td>
					<td align=center>$r[tgl_aktif]</td>
					<td align=center>$r[tgl_vakum]</td>
					<td align=center>$r[periode]</td>
					<td align=center>$r[no_hp]</td>
					<td align=center>$r[alamat_jemaat]</td>
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
		