<?php
include_once"../config/koneksi.php";
require_once"index.php";
$idhapus=$_GET['idhapus'];

if(empty ($idhapus)){
	echo "Data yang dihapus belum dipilih";
}
else{
$sql_hapus="DELETE FROM tb_komentar WHERE id_komentar='$idhapus'";
mysql_query($sql_hapus,$conn)
or die("Gagal perintah hapus".mysql_error());
echo"Penghapusan data berhasil";
	include "tb_komentar.php";
	exit;
}
?>