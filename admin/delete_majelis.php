<?php
include"library/koneksi.php";	
$konek = mysqli_connect("localhost","root","","betel");
 $id_majelis= $_GET['id_majelis']; 
 $hasil = mysqli_query($konek,"delete from tb_pelayanan where id_majelis='$id_majelis'");
 
 if ($hasil)
 {
      header('location:majelis.php');
 }

?>