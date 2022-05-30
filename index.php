<?php 
	session_start();
	include"koneksi.php";
	error_reporting(0);
	
?>
 
<?php
if(!empty($_SESSION["useradmin"]) && !empty($_SESSION["passadmin"])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>KLASIFIKASI PRODUK MENGGUNAKAN METODE CLUSTERING
K-MEANS DALAM PENENTUAN STOK PRODUK PADA UKM MUTIARA KOTA PALU DIMASA PANDEMI COVID-19
 </title>
<link rel="icon" href="images/white-letter-k-hi.png">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="container1">
  <div class="grid">
    <div class="dh2"><b>
    	<span style="color:#9D0000; font-size:18px;"> K-MEANS 
    		<strong>CLUSTERING</strong>
    	</span>
    </b></div>
	
	<div class="dh10">
		<marquee scrolldelay="100"><b><font color="red">KLASIFIKASI PRODUK MENGGUNAKAN METODE CLUSTERING
K-MEANS DALAM PENENTUAN STOK PRODUK PADA UKM MUTIARA KOTA PALU DIMASA PANDEMI COVID-19
</font></b> &nbsp;&nbsp;|&nbsp;&nbsp;<b><?php date_default_timezone_set('Asia/Jakarta'); echo date(" h:i:s a , d-M-Y"); ?>
		&nbsp;&nbsp;|&nbsp;&nbsp;</b></marquee>
	</div>
	
  </div>
</div>
<div class="container2">
  <ul id="menu" >
	<li><a href="?module=home">Home</a></li>
	<li><a href="?module=data">Data</a></li>
	<li><a href="?module=data_proses">Proses Clustering</a></li>
	<li><a href="?module=hasil">Hasil Clustering</a></li>
	<li><a href="?module=laporan">Laporan</a></li>
	<li><a href="?module=alur">Alur Sistem</a></li>
	<li><a href="?module=logout">Logout</a></li>
  </ul>
</div>
<div class="container5" style="padding:0px 20px;">
  <div class="grid">
  <?php
	include"content.php";
  ?>
  </div>
</div>
<br><br><br><br><br>

	<?php include"footer.php"; ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
<?php
}else{
	include "login.php";
}
?>