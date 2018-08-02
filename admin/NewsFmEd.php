<?php
include"../config/koneksi.php";
$idubah = $_GET['idubah'];
$sql_news="SELECT tb_berita.*,tb_kategori.* FROM tb_berita,tb_kategori WHERE tb_kategori.id_kategori=tb_berita.id_kategori AND tb_berita.id_news='$idubah'";
$qry_news=mysql_query($sql_news, $konek)
or die ("gagal menampilkan".mysql_error());
$hsl_news=mysql_fetch_array($qry_news);
$data_idnews =$hsl_news['id_news'];
$data_judul =$hsl_news['judul'];
$data_kategori =$hsl_news['kategori'];
$data_berita =$hsl_news['berita'];
$data_pengirim =$hsl_news['pengirim'];
$data_dibaca =$hsl_news['dibaca'];
$data_date =$hsl_news['date'];
$tgl =substr("$data_date",8,2);
$bln =substr("$data_date",5,2);
$thn =substr("$data_date",0,4);
?>
<html>
<head>
<title>Ubah data news</title></head>
<body>
<form action="NewsFmEdSim.php" method="post" name="form1" target="_self">
<table width="550" border="1" align="center">
<tr>
<td colspan="2" bgcolor="#00CCFF"><strong>FORM UBAH BERITA </strong></td>
</tr>
<tr>
<td>Judul Berita </td>
<td>:
<input name="TxtJudul" type="text" value="<?php echo "$data_judul"; ?>" size="50" maxlength="100">
<input name="TxtIdH" type="hidden" value="<?php echo "$data_idnews"; ?>"></td>
</tr>
<tr>
<td width="117">Kategori</td>
<td width="321">:
<input name="Txtkategori" type="text" id="Txtkategori" value="<?php echo "$data_kategori"; ?>" size="50" maxlength="100">
<input name="TxtId" type="hidden" id="TxtId" value="<?php echo "$hsl_news[id_kategori]"; ?>"></td>
</tr>
<tr>
<td>Isi Berita </td>
<td>:
<textarea name="txtberita" cols="45" rows="5">
<?php echo "$data_berita"; ?>
</textarea></td>
</tr>
<tr>
<td>Pengirim</td>
<td>:
<input name="TxtPengirim" type="text" value="<?php echo "$data_pengirim"; ?>" size="40" maxlength="60"></td>
</tr>
<tr>
<td>Rating Baca </td>
<td>: <?php echo "$data_dibaca"; ?> kali</td>
</tr>
<tr>
<td>Tanggal Posting </td>
<td>: <?php echo "$tgl-$bln-$thn"; ?></td>
</tr>
<tr>
<td></td>
<td><input name="ubah" type="submit" value="Ubah">
<input type="reset" name="gagal" value="Gagal"></td>
</tr>
</table>
</form>
</body>
</html>