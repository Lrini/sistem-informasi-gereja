<?php
include "../config/koneksi.php";
?>
<html>
<head>
<title>Administrator</title>
<LINK REL="stylesheet" TYPE="text/css" HREF="style_admin.css">
</head>
<body >
<form name="form1" method="post" action="menu_utama.php">
<table width="476" border="0" align="center" cellpadding="0" cellspacing="1" class="tb_admin">
<tr>
<td height="20" colspan="4" align="center" bgcolor="#BFD0EA">
<font size="4"><b>Pengelolaan
Halaman Administrator</b></font></td>
</tr>
<tr >
<td colspan="4" align="center" valign="top" ></td>
</tr>
<tr >
<td width="11%" colspan="4" align="center">
<select name="fm_menu" id="fm_menu" >
<option value="not_halaman"> ----- Pilih Bagian yang ingin di kelola
--- </option>
<option value="not_halaman"> ----------------------------------- </option>
<option value="kategori">Kategori</option>
<option value="berita">Berita</option>
<option value="info">Info</option>
<option value="galery">Galery</option>
<option value="profil">Profil</option>
<option value="desk">Deksripsi Buku</option>
</select></td>
</tr>
<tr >
<td align="center"></td>
<td align="center"></td>
<td align="center"></td>
<td align="center"></td>
</tr>
<tr >
<td align="center">
<input name="tb_masukan" type="submit" id="tb_masukan" value="Input Data"> </td>
<td align="center" >
<input name="tb_penglolaan" type="submit" id="tb_penglolaan" value=" Penglolaan data"> </td>
<td align="center" ><input name="tb_laporan" type="submit" id="tb_laporan" value="Lihat "></td>
<td align="center" >
<input name="tb_logout" type="submit" id="tb_logout" value=" Logout "> </td>
</tr>
</table>
</form>
<hr color="#66CC33">
</body>
</html>