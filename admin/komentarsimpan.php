<?php
include "../config/koneksi.php";
$TxtNama=$_POST['TxtNama'];
$TxtEmail=$_POST['TxtEmail'];
$TxtKomentar=$_POST['TxtKomentar'];
$sql_simpan="INSERT INTO tb_komentar
(id_komentar,nama,email,komentar,status_komentar,date)
VALUES ('','$TxtNama','$TxtEmail','$TxtKomentar','F','".date('Y-m-d')."')";
mysql_query($sql_simpan, $konek)
or die ("Memasukan data berita gagal".mysql_error());
?>
<script language="JavaScript">alert('Komentar Berhasil !');
document.location=('../index.php')</script>