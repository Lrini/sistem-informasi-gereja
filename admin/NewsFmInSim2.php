<?php
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
include"../config/koneksi.php";
$TxtJudul =$_POST['TxtJudul'];
$hd_id =$_POST['hd_id'];
$TxtBerita =$_POST['TxtBerita'];
$TxtPengirim=$_POST['TxtPengirim'];
$fileName = $_FILES['picture']['name']; //get the file name
$fileSize = $_FILES['picture']['size']; //get the size
$fileError = $_FILES['picture']['error']; //get the error when upload\
$direktori= "../foto/berita/";
if($fileSize > 0 || $fileError == 0){ //check if the file is corrupt or error
$Images=$direktori.basename($_FILES['picture']['name']);
$move = move_uploaded_file($_FILES['picture']['tmp_name'],$Images); //save image to the folder
if($move){
$sql_simpan="INSERT INTO tb_berita
(id_news,judul,berita,gambar,id_kategori,pengirim,dibaca,date)
VALUES ('','$TxtJudul','$TxtBerita','$fileName','$hd_id','$TxtPengirim','0','".date('Y-m-d')."')";
mysql_query($sql_simpan, $konek)
or die ("Memasukan data berita gagal".mysql_error());
?>
<?
$q1 = "SELECT gambar from tb_berita where gambar = '$fileName' limit 1 "; //get the image that have been uploaded
$result = mysql_query($q1);
while ($data = mysql_fetch_array($result)) {
$loc = $data['gambar']; ?>
<br/>
<h2> This is the Image : </h2>
<img src="<?php echo $data['gambar']; ?>" /> <!-- show the image using img src -->
<script language="JavaScript">alert('Data Berhasil Di Simpan :D !');
document.location=('../admin/in_berita.php')</script>
<?php
}
} else{
echo "<h3>Failed! </h3>";
}

?>