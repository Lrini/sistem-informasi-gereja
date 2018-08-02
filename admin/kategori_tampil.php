<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tampil data Kategori</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" type="image/x-icon" href="../images/admin.png" />
</head>
<body>
<?php
require_once "index.php";
include "form_lihat.php";
?>
<div id="content">
<table border="0" width="125%" cellpadding="0" cellspacing="0">
<tr valign="top">
<td width="50%" style="padding-right:20px;">
<table class="table" width="81%">
<tr class="th">
<th width="55">ID</th>
<th width="150">Nama Kategori</th>
<th width="224">Setting</th>
</tr>
<?php
include_once"../config/koneksi.php";
$sql_news="SELECT id_kategori,kategori FROM tb_kategori ORDER BY id_kategori";
$qry_news=mysql_query($sql_news,$konek)
or die("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)){
?>
<tr class="td" bgcolor="#FFF">
<td align="center"><?php echo"$hsl_news[id_kategori]";?></td>
<td align="center"><?php echo"$hsl_news[kategori]";?></td>
<td align="center"><a href="kategori_hapus.php?idhapus=<?php echo"$hsl_news[id_kategori]";?>" 
target="_self"><img src="images/delete.png"></a>
<a href="NewsFmEd.php?idubah=<?php echo"$hsl_news[id_berita]";?>"
target="_self"><img src="images/edit.png"></a></td>
</tr>
<?php
}
?>
</table>
</body>
</html>