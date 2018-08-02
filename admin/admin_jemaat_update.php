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
							<th>Gambar</th>
							<td>:</td>
							<td><input name="file" type="file"  size="30">(*Jika Gambar tidak di ganti biarkan kosong</td>
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
                  <select name="pendidikan" class="form-control" type="text">
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
					<th>Pekerjaan</th>
					<td>:</td>
					<td>
                  <select name="pekerjaan" class="form-control" type="text">
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