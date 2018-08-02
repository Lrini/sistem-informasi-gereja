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
			
			<?php
			//ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
			$nama_rayon =$_POST['id_rayon'];
		//	$query  =;
			$tampil = mysqli_query($konek, "SELECT tb_jemaat.id_jemaat, tb_jemaat.KK,tb_jemaat.mejelis,tb_jemaat.nama_jemaat,tb_jemaat.JK,tb_jemaat.Tem_Lahir,tb_jemaat.Tgl_Lahir,tb_rayon.nama_rayon,tb_jemaat.Pendidikan,tb_jemaat.Pekerjaan,tb_jemaat.alamat_jemaat,tb_jemaat.Keterangan from tb_jemaat,tb_rayon where tb_jemaat.id_rayon=tb_rayon.id_rayon and tb_jemaat.id_rayon='$nama_rayon'");
				echo"<table font weight=bold width=900px>
				<tr align=center bgcolor=#fac907 height=30px> 
				</tr>";
				$posisi=1;
				$no=$posisi+1;
				while ($r = mysqli_fetch_array($tampil)){
				echo "<tr bgcolor=white>";
				echo "<td align=center>$r[id_jemaat]</td>
					<td align=center>$r[KK]</td>
					<td align=center> $r[nama_jemaat]</td>
					<td align=center>$r[JK]</td>
					<td align=center>$r[Tem_Lahir]</td>
					<td align=center>$r[Tgl_Lahir]</td>
					<td align=center>$r[Pendidikan]</td>
					<td align=center>$r[Pekerjaan]</td>
					<td align=center>$r[mejelis]</td>
					<td align=center>$r[nama_rayon]</td>
					<td align=center>$r[alamat_jemaat]</td>
					<td align=center>$r[Keterangan]</td>
				</tr>";
				$no++;
				}
				echo "  <a href =laporan_jemaat.php?id_rayon=$nama_rayon type=button value=Cetak Halaman>cetak halaman</a>   ";
			echo "</table>";
			
			//langkah :  hitung total  data halaman serta link
			?>
			</h5>
			
			</center>
		
</body>
</html>

<?php
}
?>
		