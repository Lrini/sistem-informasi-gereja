<?php
session_start();
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
<title>Halaman Admin Rayon </title>
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
		  <ul>
            <li><a href="admin_rayon.php" class="current">Beranda</a></li>
            <li><a href="admin_jadwal_rayon.php" class="current">Jadwal Ibadat</a></li>
            <li class="last"><a href="logout.php">Logout</a></li>
        </ul> 
		  
    </div> <!-- end of tooplate_menu -->
    
	<div id="tooplate_middle2">
    	<div id="middle_left1">
            <div id="site_title">
			
				<?php
					
					include"library/menu_subbar1.php";
				
					
				?>
			</div>
        </div>
		
	</div>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
          <p>Selamat Datang Di Halaman Admin Rayon</p>
		  <p>Untuk melakukan pengolahsan data dapat di lakukan melalui menu Bar yang ada</p>
          
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
   
        
</div> <!-- end of wrapper -->
</body>
</html>
<?php
}
?>