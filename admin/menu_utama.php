<?php
require("../config/koneksi.php");
require_once "menu.php";
// Dikerjakan apabila menemukan tombol masukan
if ($tb_masukan)
{
// memeriksa Form (droplist ) menu
if(!isset($fm_menu))$fm_menu='';
switch ($fm_menu)
{
case 'kategori' : include "in_kategori.php"; break;
case 'berita' : include "NewsFmIn.php"; break;
case 'info' : include "in_info.htm"; break;
case 'galery' : include "in_galery.php"; break;
case 'profil' : include "in_profil.htm"; break;
}
}
// di kerjakan apabila menemukan tombol penglolaan
else if ($tb_penglolaan)
{
// memeriksa Form (droplist ) menu
if(!isset($fm_menu))$fm_menu='';
switch ($fm_menu)
{
case 'kategori' : include "Edit_kategori"; break;
case 'berita' : include "NewsTampil.php"; break;
case 'info' : include "info_edit.htm"; break;
case 'galery' : include "galery_edit.php"; break;
case 'profil' : include "in_profil.htm"; break;
}
}
//dikerjakan apabila menemukan tombol laporan
else if ($tb_laporan)
{
// memeriksa Form (droplist ) menu
if(!isset($fm_menu))$fm_menu='';
switch ($fm_menu)
{
case 'kategori' : include "KategoriTampil.php"; break;
case 'berita' : include "NewsTampil.php"; break;
case 'info' : include "infoTampil.htm"; break;
case 'galery' : include "galeryTampil.php"; break;
case 'profil' : include "profilTampil.htm"; break;
}
}
// dikerjakan bila menemukan tombol logout
else if ($tb_logout)
{
require_once "logout.php";
}
?>