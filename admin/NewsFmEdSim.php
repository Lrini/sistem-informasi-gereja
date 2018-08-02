<?php
include"../config/koneksi.php";
$TxtIdH =$_POST['TxtIdH'];
$TxtJudul =$_POST['TxtJudul'];
$TxtId =$_POST['TxtId'];
$TxtBerita =$_POST['TxtBerita'];
$TxtPengirim =$_POST['TxtPengirim'];
if (empty ($TxtIdH)) {
echo "Kode ID yang diubah kosong";
}
else if (empty ($TxtJudul) ) {
echo "Data Judul masih kosong";
}
else if (empty ($TxtPengirim) ) {
echo "Data Pengirim masih kosong";
}
else {
// Perintah Update data
$sql_ubah="UPDATE tb_berita SET
judul ='$TxtJudul',
berita ='$TxtBerita',
id_kategori='$TxtId',
pengirim='$TxtPengirim',
date='".date('Y-m-d')."'
WHERE id_news='$TxtIdH'";
mysql_query($sql_ubah, $konek)
or die ("Perubahan data gagal".mysql_error());
echo "Data berhasil diubah";
include "menu.php";
include "NewsTampil.php";
exit;
}
?>