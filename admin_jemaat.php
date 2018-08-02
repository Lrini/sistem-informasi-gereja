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
			$batas 		= 5;
			$halaman	= @$_GET['halaman'];
			if(empty($halaman)){
				$posisi		=	0;
				$halaman	=	1;
			}else{
				$posisi	= ($halaman-1) * $batas;
			}
			//langkah 2, sesuaikan query dengan posisi dan batas

			$query  = "SELECT * FROM tb_jemaat,tb_kepalai,tb_rayon where tb_jemaat.id_kk=tb_kepalai.id_kk
							AND tb_jemaat.id_rayon=tb_rayon.id_rayon order by id_jemaat  LIMIT $posisi,$batas";
		
			$query = "select * from tb_jemaat";
			$tampil = mysqli_query($konek, $query);
			echo"<table font weight=bold width=900px>
				<tr align=center bgcolor=#fac907 height=30px> 
					<td>ID Jemaat</td>
					<td>KK</td>
					<td>ID kk </td>
					<td>Nama Jemaat </td>
					<td>JK</td>
					<td>Tempat Lahir</td>
					<td>Tanggal Lahir</td>
					<td>Action</td>
				</tr>";
				$no=$posisi+1;
				while ($r = mysqli_fetch_array($tampil)){
				echo "<tr bgcolor=white>";
				echo "<td align=center>$r[id_jemaat]</td>
					  <td align=center>$r[kk]</td>
					<td align=center>$r[id_kk]</td>
					<td align=center> $r[nama_jemaat]</td>
					<td align=center>$r[jk]</td>
					<td align=center>$r[tem_lahir]</td>
					<td align=center>$r[tgl_lahir]</td>
					<td align=center>$r[pendidikan]</td>
					<td align=center>$r[pekerjaan]</td>
					<td align=center> $r[majelis]</td>
					<td align=center>$r[id_rayon]</td>
					<td align=center>$r[status]</td>
					<td align=center>$r[sts_nikah]</td>
					<td align=center>$r[sts_sidi]</td>
					<td align=center>$r[sts_baptis]</td>
					<td align=center>$r[alamat_jemaat]</td>
					<td align=center>$r[keterangan]</td>
					<td align=center><a href =jemaatdetail.php?id_jemaat=$r[id_jemaat]>Detail<br></a>
					   <a href =jemaatupdate.php?id_jemaat=$r[id_jemaat]>Update</a>   
				</tr>";
				$no++;
			}
			echo "</table>";
			//langkah :  hitung total  data halaman serta link
			//$query2		= mysqli_query($konek, "SELECT * FROM tb_jemaat,tb_kepalai,tb_rayon where tb_jemaat.id_kk=tb_kepalai.id_kk
			//				AND tb_jemaat.id_rayon=tb_rayon.id_rayon order by id_jemaat ");
			$query2 = mysqli_query ($konek, "select * from tb_jemaat");
			$jmldata	= mysqli_num_rows($query2);
			$jmlhalaman	= ceil($jmldata/$batas);
			
			echo"<br> Halaman : ";
				for($i=1; $i<=$jmlhalaman;$i++)
					if($i != $halaman){
						echo" <a href=\"jemaat.php?halaman=$i\">$i</a> | ";
					}
					else{ echo"<b>$i</b>|";}
					echo"<p> Total Data : <b>$jmldata</b> Data </p>";
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