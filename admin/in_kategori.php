<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Masukan Data Kategori</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/admin.png" />
</head>
<body>
<?php
require_once "index.php";
include "formIn.php";
?>
<div id="content">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr valign="top">
<td width="75%" style="padding-right:20px;">
<div id="body">
<div class="title">Form Masukan Kategori</div>
<div class="body">
<form action="katfminsim.php" method="post" name="form1" target="_self">
<table>
<tr>
<td><b>Kategori</b><div class="desc">Masukkan Kategori</div></td>
<td>:</td>
<td><input name="TxtKategori" type="text" id="TxtKategori" size="65" maxlength="100"></td></td>
</tr>
<td><input name="simpan" type="submit" id="simpan" value="Simpan">
<input type="reset" name="gagal" value="Batal"></td>
</form>
</table>
</body>
</html>