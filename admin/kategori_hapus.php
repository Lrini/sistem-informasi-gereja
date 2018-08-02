<?php
include_once"../config/koneksi.php";
require_once"index.php";
$idhapus=$_GET['idhapus'];

if(empty ($idhapus)){
	echo "Data yang dihapus belum dipilih";
}
else{
$sql_hapus="DELETE FROM tb_kategori WHERE id_kategori='$idhapus'";
mysql_query($sql_hapus,$konek)
or die("Gagal perintah hapus".mysql_error());
echo"Penghapusan data berhasil";
	include "kategori_tampil.php";
	exit;
}
?>