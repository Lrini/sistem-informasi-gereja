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
						$id_jemaat =$_GET['id_jemaat'];
						$edit = "SELECT * FROM tb_jemaat where id_jemaat='$id_jemaat'";
						$hasil = mysqli_query($konek, $edit);
						$r = mysqli_fetch_array($hasil);
				?>
			  <form method="POST" action="../admin_jemaat_update_aksi.php" enctype="multipart/form-data">
			  <table>
			  <tr>
			  <th>ID Jemaat</th>
			  <td></td>
			  <td><input type="text" name="id_jemaat" hidden="hidden" value="<?php echo "$r[id_jemaat]";?>"></td>
			  </tr>
			  <tr>
			  <th>Nama KK</th>
			  <td>:</td>
					<td>
						<?php
							echo"<select name=\"nama_kk\">";
							$query2 = "SELECT * FROM tb_kepalai =";							
							//$query = "select tb_kepalai.id_KK, tb_jemaat.Nm_Jmt from tb_kepalai join tb_jemaat on tb_jemaat.id_jmt = tb_kepalai.id_jmt";
							$hasil2 = mysqli_query($konek,$query2);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r['id_kk']==$r2['id_kk']){
								echo"<option value=\"$r2[id_kk]\" selected>
									$r2[nm_kategori]</option>";
									}else{
										echo"<option value=\"$r2[id_kk]\" selected>
										$r2[nama_kk]</option>";
									}
								}
							echo"</select>";
						?>
						 <a href="admin_tambah_kk.php">Tambah Nama KK</a></td>
					</td>
				</tr>
			  <tr>
			  <th>Id KK</th>
			  <td>:</td>
					<td>
						<?php
							echo"<select id=\"id_kk\">";
							$query2 = "SELECT * FROM tb_kepalai =";							
							//$query = "select tb_kepalai.id_KK, tb_jemaat.Nm_Jmt from tb_kepalai join tb_jemaat on tb_jemaat.id_jmt = tb_kepalai.id_jmt";
							$hasil2 = mysqli_query($konek,$query2);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r['id_kk']==$r2['id_kk']){
								echo"<option value=\"$r2[id_kk]\" selected>
									$r2[nm_kategori]</option>";
									}else{
										echo"<option value=\"$r2[id_kk]\" selected>
										$r2[id_kk]</option>";
									}
								}
							echo"</select>";
						?>
				<tr>
				<th>Status dalam Keluarga</th>
				<td>:</td>
					<td>
                  <select name="status_kk" class="form-control" type="text">
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
					<td><input name='status_mj' type='radio' value='ya'  checked="checked"/>Ya 
						<input name='status_mj' type='radio' value='tidak' />Tidak</td>
				</tr>
				
				<tr>
					<th>Nama Jemaat</th>
					<td>:</td>
					<td><input name="nama_jemaat" type="text"  size="30"></td>
				</tr>
					
				<tr>
					<th>Jenis Kelamin</th>
					<td>:</td>
					<td><input name='jns_kelamin' type='radio' value='Laki-Laki'  checked="checked"/>Laki-Laki 
						<input name='jns_kelamin' type='radio' value='Perempuan' />Perempuan</td>
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
                  <select name="Pendidikan_terakhir" class="form-control" type="text">
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
							echo"<select name=\"nama_rayon\">";
							$query2 = "SELECT * FROM tb_rayon";
							$hasil2 = mysqli_query($konek,$query2);
							while ($r2=mysqli_fetch_array($hasil2)){
								if($r['id_rayon']==$r2['id_rayon']){
								echo"<option value=\"$r2[id_rayon]\" selected>
									$r2[nm_kategori]</option>";
									}else{
										echo"<option value=\"$r2[id_rayon]\" selected>
										$r2[nama_rayon]</option>";
									}
								}
							echo"</select>";
						?>
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
				
				</tr>
				<tr>
					<th>Status Baptis</th>
					<td>:</td>
					<td><input name='status_baptis' type='radio' value='Baptis'  checked="checked"/>Baptis 
						<input name='status_baptis' type='radio' value='Belum Baptis' />Belum Baptis</td>
				</tr>
				
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><input name="alamat_jemaat" type="text"   size="30"></td>
				</tr>
				<tr>
					<th>No Telp</th>
					<td>:</td>
					<td><input name="no_hp" type="text" size="30"  onkeyup="angka(this);"></td>
				</tr>
					
<tr>											
					<th>Keterangan</th>
					<td>:</td>
					<td><input name="Keterangan" type="text" size="30"  onkeyup="angka(this);"></td>	
 				
</tr>						
				<tr>
					<td></td>
					<td></td>
					<td>
					    <input type=submit value=Simpan>
						<input type=button value=Batal onclick=self.history.back()>
					</td>
				</tr>
			</table>
			</form>
			<a href="jemaat.php">-Lihat Data- </a>
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