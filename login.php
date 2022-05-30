<title>KLASIFIKASI PRODUK MENGGUNAKAN METODE CLUSTERING
K-MEANS DALAM PENENTUAN STOK PRODUK PADA UKM MUTIARA KOTA PALU DIMASA PANDEMI COVID-19
 </title>
<link rel="stylesheet" type="text/css" href="styleadmin.css">
<link rel="icon" href="images/white-letter-k-hi.png">

<div id="login">
<fieldset>
<form name="form1" method="post" action="" enctype="multipart/form-data">
	<center>
		<img width="50%" src="images/white-letter-k-hi.png">
 	<h3>Hj.Mbok Sri Kota Palu</h3>
 	</center>
 <input name="username" type="text" id="username" placeholder="Username">
 <input name="password" type="password" id="password" placeholder="Password">
 <input name="login" type="submit" value="LOGIN ADMINISTRATOR">
</form>

<?php
error_reporting(0);
session_start();
include_once("koneksi.php");

if($_POST["login"]!=""){ //jika tombol Login diklik

	$user=$_POST["username"];
	$pass=$_POST["password"];
	
	if($user!="" && $pass!=""){
		include_once("koneksi.php");
		$em = mysql_query("select * from admin where password = '$pass' AND username = '$user'");
		$data = mysql_fetch_assoc($em);
		
		if($data["username"] == $user && $data["password"] == $pass){
			echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data Telah Ditemukan!!.
                  </div>";
			$_SESSION["useradmin"]=$data["username"];
			$_SESSION["passadmin"]=$data["password"];
			$_SESSION["nmadmin"]=$data["nm_lengkap"];
			
			
			echo"<script>window.location.href='index.php'</script>";
		}else{
			echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data Tidak Ditemukan!!</b>
                  </div><center>";
		}
	}
}
?>

</fieldset>
</div>
