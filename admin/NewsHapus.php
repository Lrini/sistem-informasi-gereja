<?php
include_once "../config/koneksi.php";
$idset=$_GET['idset'];
if (empty ($idset)) {
echo "Data yang dihapus belum dipilih";
}
else {
$sqlset="UPDATE tb_komentar SET status_komentar='T'  where id_komentar='$idset'";
mysql_query($sqlset, $konek)
or die ("Gagal perintah hapus".mysql_error());
echo "Penghapusan data berhasil";
include "NewsTampil.php";
exit;
}
?>