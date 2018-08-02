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
			<h2>Data Jemaat</h2>
			<h2>
			<?php
			//langkah 2, sesuaikan query dengan posisi dan batas

			/*$query  = "SELECT * FROM tb_jemaat,tb_kepalai,tb_rayon where tb_jemaat.id_kk=tb_kepalai.id_kk
							AND tb_jemaat.id_rayon=tb_rayon.id_rayon order by id_jemaat  LIMIT $posisi,$batas";*/
		
			$query = "select id_jemaat,nama_jemaat,Tgl_Lahir,year (curdate()) - year (Tgl_Lahir) as usia from tb_jemaat where date_format(Tgl_Lahir,'%m-%d') = date_format(now(),'%m-%d') order by  id_jemaat";
			$tampil = mysqli_query($konek, $query);
			echo"<table font weight=bold width=900px>
				<tr align=center bgcolor=#fac907 height=30px> 
					<td>ID Jemaat</td>
					<td>Nama Jemaat </td>
					<td>Tanggal Lahir</td>
					<td>Usia</td>
				</tr>";
			//	$no=$posisi+1;
				while ($r = mysqli_fetch_array($tampil)){
				echo "<tr bgcolor=white>";
				echo "<td align=center>$r[id_jemaat]</td>
					<td align=center> $r[nama_jemaat]</td>
					<td align=center>$r[Tgl_Lahir]</td>
					<td align=center>$r[usia]</td>
				</tr>";
				//$no++;
			}
			?>
			</h2>
			</center>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
</body>
</html>
<?php
}
?>