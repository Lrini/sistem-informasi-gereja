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
<title>Halaman Admin </title>
<link href="images/gambar1.png" rel="shortcut icon" title="Favicon" />
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="js/tanggaljava/themes/ui-lightness/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="js/tanggaljava/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_lahir,#tgl_masuk,#tgl_vakum").datepicker({
		  dateFormat  : "yy/mm/dd",        
          changeMonth : true,
          changeYear  : true					
        });      
      });

    </script>
<script type="text/javascript" src="js/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
<body>
<div id="tooplate_wrapper">
	<div id="tooplate_header">
		<div id="tooplate_middle1">
			<div id="site_title" =><a href="#">Halaman Administrator</a></div>
		</div>
    </div>
    
    <div id="tooplate_menu">
          <?php
			include"library/menu_bar.php";
		  ?>
		  
    </div> <!-- end of tooplate_menu -->
    
	<div id="tooplate_middle2">
    	<div id="middle_left1">
            <div id="site_title">
				<?php
					include"library/menu_subbar.php";
					
				?>
			</div>
        </div>
		
	</div>
	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
        <div class="col_w900 col_w900_last">
           	  <div class="news_box">
			  <h2>Update Data Jemaat</h2>
			  <?php
					ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
						$konek = mysqli_connect("localhost","root","","betel");
						$id_jemaat =$_GET['id_jemaat'];
						$hasil = mysqli_query($konek,"SELECT * FROM tb_jemaat where id_jemaat='$id_jemaat'");
						$r = mysqli_fetch_array($hasil);
				?>
			  <form name="simpan" method="POST" action="Update_jemaat.php" enctype="multipart/form-data">
			  <table>
			  <tr>
			  <th></th>
			  <td></td>
			  <td><input type="text" name="id_jemaat" hidden="hidden" value="<?php echo "$r[id_jemaat]";?>"></td>
			  </tr>
			  <tr>
						<th>Id Jemaat</th>
						<td>:</td>
						<td><?php echo "$r[id_jemaat]";?></td>
					</tr>
					<tr>
						<th>Id KK</th>
						<td>:</td>
						<td><input name="id_KK" type="text"  size="30" value="<?php echo "$r[id_KK]";?>"></td>
					</tr>
					<tr>
						<th>KK</th>
						<td>:</td>
					<td>
						<input name="KK" type="text"  size="30" value="<?php echo "$r[KK]";?>">
					</td>
					</tr>
			 <tr>
					<th>Nama Jemaat</th>
					<td>:</td>
					<td><input name="nama_jemaat" type="text"  size="30" value="<?php echo "$r[nama_jemaat]";?>"></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td>:</td>
					<td> <input name='jk' type='radio' value='L'  checked="checked"/>Laki-Laki 
						<input name='jk' type='radio' value='P' />Perempuan</td>
				</tr>
				<tr>
					<th>Tempat Lahir</th>
					<td>:</td>
					<td><input name="tem_lahir" type="text"  size="30" value="<?php echo "$r[Tem_Lahir]";?>"></td>
				</tr>
				<tr>
					<th>Tanggal Lahir</th>
					<td>:</td>
					<td><input name="tgl_lahir" type="text" id="tgl_lahir"  size="30" value="<?php echo "$r[Tgl_Lahir]";?>"></td>
				</tr>
				<tr>
					<th>Pendidikan Terakhir</th>
					<td>:</td>
					<td>
				       <?php
					    echo "<input name='pendidikan' type='radio' value='Tidak Ada'"; if($r['Pendidikan']=='Tidak Ada'){ echo "checked";} echo "/>Tidak Ada";
					    echo "<input name='pendidikan' type='radio' value='S1'"; if($r['Pendidikan']=='S1'){ echo "checked";} echo "/>S1";
					    echo "<input name='pendidikan' type='radio' value='S2'"; if($r['Pendidikan']=='S2'){ echo "checked";} echo "/>S2";
						echo "<input name='pendidikan' type='radio' value='S3'"; if($r['Pendidikan']=='S3'){ echo "checked";} echo "/>S3";
					    echo "<input name='pendidikan' type='radio' value='SMA Sederajat'"; if($r['Pendidikan']=='SMA Sederajat'){ echo "checked";} echo "/>SMA Sederajat";
						echo "<input name='pendidikan' type='radio' value='SMP'"; if($r['Pendidikan']=='SMP'){ echo "checked";} echo "/>SMP";
					    echo "<input name='pendidikan' type='radio' value='SD'"; if($r['Pendidikan']=='SD'){ echo "checked";} echo "/>SD";
						echo "<input name='pendidikan' type='radio' value='TK'"; if($r['Pendidikan']=='TK'){ echo "checked";} echo "/>TK";
					    echo "<input name='pendidikan' type='radio' value='PAUD'"; if($r['Pendidikan']=='PAUD'){ echo "checked";} echo "/>PAUD";
				       ?>
				   </td>
				</tr>
				
				<tr>
					<th>Pekerjaan</th>
					<td>:</td>
					<td>
					<?php
					    echo "<input name='pekerjaan' type='radio' value='Tidak Ada'"; if($r['Pekerjaan']=='Tidak Ada'){ echo "checked";} echo "/>Tidak Ada";
					    echo "<input name='pekerjaan' type='radio' value='PNS'"; if($r['Pekerjaan']=='PNS'){ echo "checked";} echo "/>PNS";
					    echo "<input name='pekerjaan' type='radio' value='TNI/POLRI/AU/AD'"; if($r['Pekerjaan']=='TNI/POLRI/AU/AD'){ echo "checked";} echo "/>TNI/POLRI/AU/AD";
						echo "<input name='pekerjaan' type='radio' value='Tukang'"; if($r['Pekerjaan']=='Tukang'){ echo "checked";} echo "/>Tukang";
					    echo "<input name='pekerjaan' type='radio' value='Dosen/Guru Sederajat'"; if($r['Pekerjaan']=='Dosen/Guru Sederajat'){ echo "checked";} echo "/>Dosen/Guru Sederajat";
						echo "<input name='pekerjaan' type='radio' value='Dokter/Bidan/Perawat/Apoteker/Psikologi'"; if($r['Pekerjaan']=='Dokter/Bidan/Perawat/Apoteker/Psikologi'){ echo "checked";} echo "/>Dokter/Bidan/Perawat/Apoteker/Psikologi";
					    echo "<input name='pekerjaan' type='radio' value='Buruh'"; if($r['Pekerjaan']=='Buruh'){ echo "checked";} echo "/>Buruh";
						echo "<input name='pekerjaan' type='radio' value='Lainnya'"; if($r['Pekerjaan']=='Lainnya'){ echo "checked";} echo "/>Lainnya";
				    ?>	
					</td>
				</tr>
				
				<tr>
					<th>Rayon</th>
					<td>:</td>
					<td>
					<?php					
						$QS = "select * from tb_rayon";
						$result = mysqli_query($konek, $QS);
					?>
					<select name= "id_rayon" id="id_rayon" class="form-control " type="text">
                    <option>id | nama Rayon</option> 
					<?php while ($data = mysqli_fetch_array($result)) 
						{ ?>
							<option value='<?php echo $data['id_rayon'] ?>'><?php echo $data['id_rayon'] ?> | <?php echo $data['nama_rayon'] ?></option>
						<?php } ?>
					</select>	
					</td>
				</tr>
				<tr>
					<th>Status Nikah</th>
					<td>:</td>
					<td><input name='sts_nikah' type='radio' value='Menikah'  checked="checked"/>Menikah 
						<input name='sts_nikah' type='radio' value='Belum Menikah' />Belum Menikah</td>
				</tr>
				<tr>
					<th>Status Sidi</th>
					<td>:</td>
					<td><input name='sts_sidi' type='radio' value='sidi'  checked="checked"/>Sidi 
						<input name='sts_sidi' type='radio' value='Belum Sidi' />Belum Sidi</td>
				</tr>
				<tr>
					<th>Status Baptis</th>
					<td>:</td>
					<td><input name='sts_baptis' type='radio' value='Baptis'  checked="checked"/>Baptis
						<input name='sts_baptis' type='radio' value='Belum baptis' />Belum Baptis</td>
				<tr>
				<tr>
					<th>Status</th>
					<td>:</td>
					<td><input name='Status' type='radio' value='Hidup'  checked="checked"/>Hidup
						<input name='Status' type='radio' value='Meninggal' />Meninggal</td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><input name="alamat_jemaat" type="text"   size="30" value="<?php echo "$r[alamat_jemaat]";?>"</td>
				</tr>
				<tr>
					<th>Keterangan</th>
					<td>:</td>
					<td><input name="keterangan" type="text"   size="30" value="<?php echo "$r[Keterangan]";?>"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
					   <input type="submit" name='submit' class="button" value="simpan" />
					</td>
				</tr>
			</table>
			</form>
			<a href="admin_jemaat.php">-Lihat Data- </a>
                <div class="cleaner"></div>
            </div>    
		</div>
        
        <div class="cleaner"></div>
    </div> <!-- end of main -->
    
    
        
</div> <!-- end of wrapper -->
</body>
</html>
<?php
}
?>