<?php
include"../config/koneksi.php";
$TxtJudul =$_POST['TxtJudul'];
$hd_id =$_POST['hd_id'];
$TxtBerita =$_POST['TxtBerita'];
$TxtPengirim=$_POST['TxtPengirim'];
if (empty ($TxtJudul) ) {
echo "Data Judul masih kosong";
}
else if (empty ($TxtBerita) ) {
echo "Data Berita masih kosong";
}
else if (empty ($TxtPengirim) ) {
echo "Data Pengirim masih kosong";
}
else {
$sql_simpan="INSERT INTO tb_berita
(id_news,judul,berita,id_kategori,pengirim,dibaca,date)
VALUES ('','$TxtJudul','$TxtBerita','$hd_id','$TxtPengirim',
'0','".date('Y-m-d')."')";
mysql_query($sql_simpan, $konek)
or die ("Memasukan data berita gagal".mysql_error());
echo "Data berhasil disimpan";
include "menu_utama.php";
}
?>