<?php
include"library/koneksi.php";
include"library/fungsi_indotgl.php";
error_reporting(0);
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

<link type="text/css" href="js/tanggaljava/themes/ui-lightness/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="js/tanggaljava/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.core.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/tanggaljava/ui/i18n/ui.datepicker-id.js"></script>

    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_lahir").datepicker({
		  dateFormat  : "yy/mm/dd",        
          changeMonth : true,
          changeYear  : true		

		  
        });      
      });

	  function angka(e){
		  if (!/^[0-9]+$/.test(e.value)){
		  e.value = e.value.substring(0,e.value.length-1);
		  
	  }
		 
	  }

    </script>
<body>
<div id="tooplate_wrapper">
	<div id="tooplate_header">
		
   	
    <div id="tooplate_main_top"></div>        
    <div id="tooplate_main">
        
       <div class="col_w900 col_w900_last">
           	  <div class="news_box">
			  <center>
			  <h2>Tambah Data Jemaat</h2>
				<form name="simpan" method="POST" action="i_jemaat.php" enctype="multipart/form-data">
					<table>
					<tr>
							<th>Gambar</th>
							<td>:</td>
							<td><input name="file" type="file"  size="30">(*Jika Gambar tidak di ganti biarkan kosong</td>
					</tr>
				<tr>
					<th>Nama KK</th>
					<td>:</td>
					<td>
					<?php					
						$QS = "select * from tb_kepalai";
						$result = mysqli_query($konek, $QS);
					?>
					<select name= "id_KK" id="id_KK" class="form-control " type="text">
                    <option>id | nama KK</option> 
					<?php while ($data = mysqli_fetch_array($result)) 
						{ ?>
							<option value='<?php echo $data['id_KK'] ?>'><?php echo $data['id_KK'] ?> | <?php echo $data['Nama_KK'] ?></option>
						<?php } ?>
					</select>					
					</td>
				</tr>
				
				<tr>
				<th>Status dalam Keluarga</th>
				<td>:</td>
					<td>
                  <select name="KK" class="form-control" type="text">
                    <option>Pilihan</option>					
						<option value='SUAMI'>Suami</option>
						<option value='ISTRI'>Istri</option>
						<option value='ANAK'>Anak</option>
						<option value='SUAMI-DUDA'>Suami-Duda</option>
						<option value='ISTRI-JANDA'>Istri-Janda</option>
						<option value='ANAK-SENDIRI'>Anak-Sendiri</option>
                  </select>
				  </td>
				</tr>
				
				<tr>
					<th>Status Majelis</th>
					<td>:</td>
					<td><input name='mejelis' type='radio' value='ya'  checked="checked"/>Ya 
						<input name='mejelis' type='radio' value='tidak' />Tidak</td>
				</tr>
				
				<tr>
					<th>Nama Jemaat</th>
					<td>:</td>
					<td><input name="nama_jemaat" type="text"  size="30"></td>
				</tr>
					
				<tr>
					<th>Jenis Kelamin</th>
					<td>:</td>
					<td><input name='jk' type='radio' value='L'  checked="checked"/>Laki-Laki 
						<input name='jk' type='radio' value='P' />Perempuan</td>
				</tr>
				<tr>
					<th>Tempat Lahir</th>
					<td>:</td>
					<td><input name="tem_lahir" type="text"  size="30"></td>
				</tr>
				<tr>
					<th>Tanggal Lahir</th>
					<td>:</td>
					<td><input name="tgl_lahir" type="text" id="tgl_lahir"  size="30"></td>
				</tr>
					
				<tr>
					
				<tR>
				<th>Pendidikan Terakhir</th>
				<td>:</td>
					<td>
                  <select name="Pendidikan" class="form-control" type="text">
                        <option>Pilihan</option>					
						<option value='SD'>SD</option>
						<option value='SMP-SEDERAJAT'>SMP/SLTP-sederajat</option>
						<option value='SMA-SEDERAJAT'>SMA/SLTA-sederajat</option>
						<option value='S1'>S1</option>
						<option value='S2'>S2</option>
						<option value='S3'>S3</option>
                  </select>
				  </td>
				</tr>
				
								
				<tr>
					
				<tR>
				<th>Pekerjaan</th>
				<td>:</td>
					<td>
                  <select name="Pekerjaan" class="form-control" type="text">
                    <option>Pilihan</option>					
						<option value='PETANI'>PETANI</option>
						<option value='POLRI'>POLRI</option>
						<option value='DOKTER'>DOKTER</option>
						<option value='PERAWAT'>PERAWAT</option>
						<option value='SATPAM'>SATPAM</option>
						<option value='HONOR'>HONOR</option>
						<option value='ANGKATAN DARAT'>ANGKATAN DARAT</option>
						<option value='ANGKATAN LAUT'>ANGKATAN LAUT</option>
						<option value='ANGKATAN UDARA'>ANGKATAN UDARA</option>
						<option value='WIRASWASTA'>WIRASWASTA</option>
						<option value='TUKANG'>TUKANG</option>
						<option value='OJEK'>OJEK</option>
						<option value='SOPIR'>SOPIR</option>
						<option value='PENDETA'>PENDETA</option>
						<option value='IBU RUMAH TANGGA'>IBU RUMAH TANGGA</option>
						<option value='PNS'>PNS</option>
						<option value='PELAJAR'>PELAJAR</option>
						<option value='MAHASISWA'>MAHASISWA</option>
						<option value='LAINNYA'>LAINNYA</option>
					 </select>
				  </td>
				</tr>
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
					<th>Status</th>
					<td>:</td>
					<td><input name='Status' type='radio' value='Hidup'  checked="checked"/>Hidup
						<input name='Status' type='radio' value='Meninggal' />Meninggal</td>
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
				
				</tr>
				<tr>
					<th>Status Baptis</th>
					<td>:</td>
					<td><input name='sts_baptis' type='radio' value='Baptis'  checked="checked"/>Baptis 
						<input name='sts_baptis' type='radio' value='Belum Baptis' />Belum Baptis</td>
				</tr>
				
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><input name="alamat_jemaat" type="text"   size="30"></td>
				</tr>
					
				<tr>											
					<th>Keterangan</th>
					<td>:</td>
					<td><input name="Keterangan" type="text" size="30"></td>	
 				
				</tr>						
						<tr>
						
						<tr>
							<td>
							</td>
							<td>
							</td>
							<td>
									<input type="submit" name='submit' class="button" value="simpan" />
							</td>
						</tr>
					</table>
				</form>
				
			
				<font size="4"><a href="jemaat.php">-Lihat Data- </a></font>
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