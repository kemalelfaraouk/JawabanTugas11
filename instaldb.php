<?php 
 $koneksi=new mysqli("localhost","root","");
 $sql="create database inputbarang";
 $q=$koneksi->query($sql);
 if ($q) {
	 echo "Database sudah dibuat !";
 } else {
	 echo "Database gagal dibuat !";
 }
 $sql2="CREATE TABLE `inputbarang` (
  `nomormesinkendaraan` int(50) NOT NULL,
  `nomorrangkakendaraan` varchar(50) NOT NULL,
  `jeniskendaraan` text NOT NULL,
  `namakendaraan` text NOT NULL,
  `tanggalbuat` date NOT NULL,
  `cacatankondisikendaraan` text NOT NULL,
  `nomorbpkb` varchar(50) NOT NULL,
  `nomorstnk` varchar(50) NOT NULL,
  `statusstnk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$q2=$koneksi->query($sql2);
 if ($q2) {
	 echo "Tabel Barang sudah dibuat !";
 } else {
	 echo "Tabel Barang  gagal dibuat !";
 }