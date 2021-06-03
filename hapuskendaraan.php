<?php $koneksi=new mysqli("localhost","root","","inputbarang");
if (isset($_GET['namakendaraan'])) {
 $namakendaraandicari=$_GET['namakendaraan'];	
 $sql="SELECT * FROM `inputbarang` WHERE `namakendaraan` = '".$namakendaraandicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<center><h2>Record yang dicari tidak ditemukan !</h2></center>";
	 exit();
 }
 $sql2="delete from `inputbarang` WHERE `namakendaraan` = '".$namakendaraandicari."'";
 $q2=$koneksi->query($sql2);
 echo "
	<script>window.location.href='carikendaraan.php';</script>";
} 
?>