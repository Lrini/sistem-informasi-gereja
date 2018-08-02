<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Masukan data news</title>
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
<div class="title">Form Masukan Berita</div>
<div class="body">
<script language="javascript" type="text/javascript" src="tinymcpuk/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,paste,directionality,fullscreen,noneditable,contextmenu",
		theme_advanced_buttons1_add_before : "save,newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator",
		theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		plugin_insertdate_dateFormat : "%Y-%m-%d",
		plugin_insertdate_timeFormat : "%H:%M:%S",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		
		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
	}
</script>
<form action="NewsFmInSim2.php" method="post" enctype="multipart/form-data" name="form1" target="_self">
<table>
<tr>
<td><b>Judul Berita</b><div class="desc">Masukkan Judul Berita</div></td>
<td>:</td>
<td><input name="TxtJudul" type="text" id="TxtJudul" size="50" maxlength="100"></td>
</tr>
<tr>
<td><b>Kategori</b><div class="desc">Kode kategori</div></td>
<td>:</td>
<td><input name="hd_id" type="text" id="hd_id" size="50" max length="50"> </td>
<?php
include "../config/koneksi.php";
echo "<option value=not_kategori>----Pilih Kategory-----</option>";
$minta="SELECT*FROM tb_kategori ";
$eksekusi=mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi)){
	$kategoritampil=$hasil['kategori'];
	$idskategoritampil=$hasil['id_kategori'];
	echo "<option value=$hasil[id_kategori]>$hasil[kategori]</option>";
	
?>

<tr><td><u><i><li>Untuk Kode Kategori ="<?php echo $kategoritampil;?>" Adalah = "<?php echo $idskategoritampil;?>"</u></td>
</tr>
<?php
}
?>

<tr>
<td><b>Isi Berita</b><div class="desc">Masukkan Isi Berita</div></td>
<td>:</td>
<td><textarea name="TxtBerita" rows="7" cols="51"> </textarea></td>
</tr>
<tr>
<td><b>Gambar</b><div class="desc">Masukkan Gambar</div></td>
<td>:</td>
<td><input name="picture" type="file" /></td></td>
</tr>
<tr>
<td></td>
<tr>
<td><b>Pengirim</b><div class="desc">Masukkan Pengirim</div></td>
<td>:</td>
<td><input name="TxtPengirim" type="text" id="TxtPengirim" size="50" maxlength="100"></td></td>
</tr>
<td><input name="simpan" type="submit" id="simpan" value="Simpan">
<input type="reset" name="gagal" value="Batal"></td>
</tr>
<?php

?>
</table>
</form>
</body>
</html>