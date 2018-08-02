<?php
include "library/koneksi.php";
error_reporting(0);
$username = $_POST['username'];
$password = $_POST['password'];


if($username=="" || $password==""){
	echo"<script type=text/javascript>alert('username atau password atau Captcha masih kosong'); window.location = 'login.php'</script>)";	
}else{

// pastikan username dan password adalah berupa huruf atau angka.

$query=("SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
$login=mysqli_query($konek,$query);
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['id_admin']    = $r['id_admin'];
  $_SESSION['nama_admin']    = $r['nama_admin'];
  $_SESSION['username']     = $r['username'];
  $_SESSION['password']     = $r['password'];
  
	
	
	if($_SESSION[id_admin]==1){
	header('location:admin/index.php');
  } else if($_SESSION[id_admin]==2){
	header('location:admin/index.php');
  } 
}else{
	echo"<script type=text/javascript>alert('Gagal Login! Username atau password tidak benar'); window.location = 'login.php'</script>)";

}
}
?>