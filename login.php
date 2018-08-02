<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Login</title>
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
    	
        <div id="site_title"><h2><a href="#">Halaman Login</a></h2></div>
        
        <div class="cleaner"></div>
    </div>
	<div id="tooplate_middle">
    	<div id="middle_left">
			<form method="POST" name="login" action="cek_login.php">
						<table>
							<tr>
								<td><h2>Username</h2></td>
								<td><input type="text" name="username" placeholder="username" id="username" /></td>
							</tr>
							<tr>
								<td><h2>Password</h2></td>
								<td><input type="password" name="password" placeholder="password" id="password" /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="LOGIN" id="submit" name="submit" />
								<input type=button value=BATAL onclick=self.history.back()> </td>
							</tr>
						</table>
						 
					</form>
        </div>
        </div>
	</div>
        
</div> <!-- end of wrapper -->
</body>
</html>

