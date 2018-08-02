<?php session_start();
include"../config/koneksi.php";
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
$TxtKategori  =$_POST['TxtKategori'];

if(empty($TxtKategori)){
?><script language="JavaScript">alert('Data Kategori masih kosong !');
document.location=('../admin/in_kategori.php')</script>
<?php
}else{
	$sql_simpan="INSERT INTO tb_kategori(id_kategori,kategori)
VALUES('','$TxtKategori')";
mysql_query($sql_simpan,$konek)
	or die("Memasukan data kategori gagal".mysql_error());
	?><script language="JavaScript">alert('Data Berhasil Disimpan !');
document.location=('../halaman_admin/in_kategori.php')</script>
<?php
	include"menu_utama.php";

}
?>