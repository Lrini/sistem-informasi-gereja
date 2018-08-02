
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Komentar</title>
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
<th width="95">Tanggal</th>
<th width="82">Nama</th>
<th width="157">Email</th>
<th width="149">Komentar</th>
<th width="133">status</th>
<th width="129">Aksi</th>
<th width="139">setting</th>
</tr>
<?php
error_reporting(E_ALL^(E_NOTICE|E_WARNING));
$id=$_GET['id_news'];
include_once"../config/koneksi.php";
$sql_news="SELECT id_komentar,nama,email,komentar,status_komentar,tanggal,id_news FROM tb_komentar ORDER BY id_komentar";
$qry_news=mysql_query($sql_news,$konek)
or die("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)){
?>
<tr class="td" bgcolor="#FFF">
<td align="center"><?php echo "$hsl_news[tanggal]";?></td>
<td align="center"><?php echo "$hsl_news[nama]";?></td>
<td align="center"><?php echo "$hsl_news[email]";?></td>
<td align="center"><?php echo "$hsl_news[komentar]";?></td>
<td align="center">
<?php if($hsl_news['status_komentar']=='F'){ ?>
      <span class="admin">Belum di publish</span>
<?php }else if($hsl_news['status_komentar']=='T'){ ?>
      Publish
      <?php } ?></td>
<td align="center">
<?php if($hsl_news['status_komentar']=='F'){ ?>
      <a href="tb_komentar.php?id_komentar=<?php echo $hsl_news['id_komentar'];
       $sql_ubah="UPDATE tb_komentar SET
				status_komentar='T'
				WHERE id_komentar='$id'";
        mysql_query($sql_ubah,$conn)
						or die ("Perubahan data gagal".mysql_error());
		?>">Publish</a>
      <?php }else{ ?>
	  
      <?php } ?></td>
<td align="center"><a href="komentar_hapus.php?idhapus=<?php echo"$hsl_news[id_komentar]";?>" 
target="_self"><img src="images/delete.png"></a>
</tr>
<?php
}
?>
</table>
</body>
</html>