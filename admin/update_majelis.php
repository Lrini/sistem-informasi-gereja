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
			  <h2>Update Data Majelis </h2>
			  <?php
					ERROR_REPORTING(E_ALL ^ (E_NOTICE | E_WARNING));
						$konek = mysqli_connect("localhost","root","","betel");
						$id_jemaat =$_GET['id_jemaat'];
						$hasil = mysqli_query($konek, "SELECT tb_jemaat.id_jemaat,tb_jemaat.nama_jemaat,tb_pelayanan.Pengurus_gereja from tb_pelayanan,tb_jemaat where tb_jemaat.id_jemaat=tb_pelayanan.id_jemaat and tb_pelayanan.id_jemaat='$id_jemaat'");
						$r = mysqli_fetch_array($hasil);
				?>
				<form  name ="simpan" method="POST" action="update_majelis_aksi.php" enctype="multipart/form-data">
					<table>
					<tr>
							<th></th>
							<td></td>
							<td><input type="text" name="id_jemaat"  value="<?php echo "$r[id_jemaat]";?>"></td>
						</tr>
					<tr>
						<th>Nama Jemaat</th>
						<td>:</td>
						<td><?php echo "$r[nama_jemaat]";?></td>
					</tr>
					
				<tr>
						<th>Pengurus Gereja</th>
						<td>:</td>
						<td><input type="text" name="pengurus_gereja" value="<?php echo "$r[Pengurus_gereja]";?>"></td>
					</tr>
				<tr>
				<th>Pengurus Rayon</th>
				<td>:</td>
					<td>
                  <select name="pengurus_rayon" class="form-control" type="text">
                    <option>Pilihan</option>					
						<option value='ketua'>KETUA KOORDINATOR RAYON</option>
						<option value='anggota'>ANGGOTA KOORDINATOR</option>
                  </select>
				  </td>
				</tr>
				<tr>
				<th>Status</th>
				<td>:</td>
					<td>
                  <select name="status" class="form-control" type="text">
                    <option>Pilihan</option>					
						<option value='Aktif'>Aktif</option>
						<option value='nonaktif'>Tidak Aktif</option>
                  </select>
				  </td>
				</tr>
				<tr>
          <th>Periode</td>
          <td>:</td>
          <td><select name="periode" required>
            <option value="2015-2020">2015-2020</option>
            <option value="2021-2025">2021-2025</option>
            <option value="2026-2030">2026-2030</option>
            <option value="2031-2035">2031-2035</option>
            <option value="2036-2040">2036-2040</option>
            <option value="2041-2045">2041-2045</option>
			<option value="2046-2050">2046-2050</option>
            </select>
			</td>
         </tr>
				<tr>
				<th>Jabatan</th>
				<td>:</td>
					<td>
                  <select name="jabatan" class="form-control" type="text">
                    <option>Pilihan</option>					
						<option value='PENDETA'>PENDETA</option>
						<option value='PENTUA'>PENATUA</option>
						<option value='DIAKEN'>DIAKEN</option>
						<option value='PENGAJAR'>PENGAJAR</option>
                  </select>
				  </td>
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
				
			
				<a href="admin_majelis.php">-Lihat Data- </a>
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