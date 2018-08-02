<html>
<head>
<title>Masukan data news</title>
</head>
<body>
<form action="NewsFmInSim.php" method="post" name="form1" target="_self">
<table width="500" border="1" align="center">
<tr>
<td colspan="2" bgcolor="#00CCFF"><div align="center"><b>FORM MASUKAN BERITA </b></div></td>
</tr>
<tr>
<td width="86">Judul Berita </td>
<td width="398">:
<input name="TxtJudul" type="text" id="TxtJudul" size="50" maxlength="100"></td>
</tr>
<tr>
<td>Kategori</td>
<td>:
<select name="cmdkategori" id="cmdkategori">
<?php
include "../config/koneksi.php";
echo "<option value=not_kategori>---- Pilih Kategori ----</option>";
$minta = "SELECT * FROM tb_kategori order by kategori";
$eksekusi = mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi))
{
$id=$hasil['id_kategori'];
echo " <option value=$hasil[id_kategori]>$hasil[kategori] </option>";
}
?>
</select>
<input name="hd_id" type="hidden" id="hd_id" value="<?php echo "$id"; ?>" ></td>
</tr>
<tr>
<td>Isi Berita </td>
<td>:
<textarea name="TxtBerita" cols="45" rows="5"></textarea></td>
</tr>
<tr>
<td>Pengirim</td>
<td>:
<input name="TxtPengirim" type="text" size="40" maxlength="60"></td>
</tr>
<tr>
<td></td>
<td><input name="simpan" type="submit" id="simpan" value="Simpan">
<input type="reset" name="gagal" value="Batal"></td>
</tr>
</table>
</form>
</body>
</html>