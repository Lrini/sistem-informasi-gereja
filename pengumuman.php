<?php
include"library/koneksi.php";
include"library/fungsi_indotgl.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bet'El Maulafa</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="images/gambar1.png" rel="shortcut icon" title="Favicon" />
<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:15,
		animSpeed:500,
		pauseTime:3000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>

</head>
<body>

<div id="tooplate_wrapper">

	<div id="tooplate_header">
    <!--    <div id="tooplate_middle1">
		<marquee>
			<div id="site_title" =><a href="#">GMIT Bet'El Maulafa Kupang</a></div>
		</marquee>
		</div>
		
        
        <div class="cleaner"></div>
    </div>-->
    
    
	
<div id="tooplate_middle">
    	<div id="middle_left">
		<center>
	<h2>Gereja Masehi Injili di Timor</h2>
        	<h2>Bet'El Maulafa</h2>
             <p>Jl.Gereja Bet'El Maulafa Kupang-NTT</p>
			 </center>
	</div>
        </div>
	</div>
	
	
	<br>
	<br>
	<br>
	<br>
	
	<div id="style">
	<center>
	
        </a><ul class="menu">
         <li><a href="index.php" class="current"><font color="black">Beranda</a></li>
		  
       
		 <li><a href="galery.php"><font color="black">Gallery</a></li>
		 <li><a href="#" ><font color="black">Data</a></font>
			<ul>
				<li><a href="jemaat.php" class="jemaat" ><font color="black">Data Jemaat</a></li>
				<Br>
				<br>
				<li><a href="majelis.php"class="majelis"><font color="black">Data Pelayanan</a></li>
				<br>
				
			</ul>
			</li>
     
		  <li><a href="#" ><font color="blue">Pengumuman</a></font>
			<ul>
				<li><a href="pengumuman.php" class="pengumuman" ><font color="black">Pengumuman</a></li>
				<Br>
				<br>
				<li><a href="jadwal.php"class="jadwal"><font color="black">Jadwal Ibadah</a></li>
				<br>
				<br>
				<li><a href="ulang_thn.php" class="Ulang Tahun"><font color="black">Ulang Tahun Kelahiran</a></li>
			</ul>
			</li>
		  
		  
		    <li><a href="#"><font color="black">Info</a></font>
		 <ul>
				<li><a href="Profil.php" class="jemaat" ><font color="black">Profil Gereja</a></li>
				<Br>
				<br>
				<li><a href="kontak.php"class="majelis"><font color="black">Kontak</a></li>
				<br>
			</ul>
			</li>
          <li class="last"><a href="login.php"><font color="black">Login</a></li></font>
		 </br>
		 </br>
		 </br>
		 </br>
		</br>		 
        </ul>      	    	
           	    	</center>
      
		
        <div class="cleaner"></div>
    </div> <!-- end of tooplate_menu -->
	</center>
    <div>	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
		<center>
		<br><br><br><br><br><br>
			<h2>Pengumuman</h2>
			<hr>
			<?php
			$query  = "SELECT * FROM tb_pengumuman order by id_peng asc";
			$tampil = mysqli_query($konek, $query);
			echo"<table font weight=bold width=900px>
				<tr align=center bgcolor=#ffffff height=30px> 
					<td>No</td>
					<td>Judul</td>
					<td>Isi</td>
					<td>Tanggal</td>
		
				</tr>";
				$no=1;
				while ($r = mysqli_fetch_array($tampil)){
				echo "<tr bgcolor=white>";
				echo "<td><center>$r[id_peng]</center></font></td>
					<td>$r[judul_peng]</td>
					<td><center>$r[isi_peng]</center></font></td>
					<td align=center>";echo tgl_indo($r['tgl_peng']);echo"</td>
				</tr>";
				$no++;
			}
			echo "</table>";
          ?>
			</center>
			</hr>
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
    <div id="tooplate_footer">
    	Copyright © Kerja Praktek 2018 <a href="#">Ilmu Komputer</a> <a href="">Universitas Nusa Cendana Kupang</a>
    </div>
        
</div> <!-- end of wrapper -->
</body>
</html>