<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Rekord Kendaraan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php $koneksi=new mysqli("localhost","root","","inputbarang");
if (isset($_GET['namakendaraan'])) {
 $namakendaraandicari=$_GET['namakendaraan'];	
 $sql="SELECT * FROM `inputbarang` WHERE `namakendaraan` = '".$namakendaraandicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Rekord yang dicari tidak ditemukan !</h2>";
	 exit();
 }
} 
?>
<div class="container">
  <h2>Koreksi Rekord Kendaraan</h2>
  <form method="post">
    <div class="form-group">
      <label for="namakendaraan">Nama Kendaraan:</label>
      <input type="text" class="form-control" id="namakendaraan" placeholder="Ketik Nama Kendaraan" name="namakendaraan" value="<?php echo $r['namakendaraan'];?>" readonly>
    </div>
    <div class="form-group">
      <label for="nomorrangkakendaraan">Nomor Rangka Kendaraan:</label>
      <input type="text" class="form-control" id="nomorrangkakendaraan" placeholder="Ketik nomorrangkakendaraan" name="nomorrangkakendaraan" value="<?php echo $r['nomorrangkakendaraan'];?>">
    </div>
    <div class="form-group">
      <label for="jeniskendaraan">Jenis Kendaraan:</label>
      <input type="text" class="form-control" id="jeniskendaraan" placeholder="Ketik Jenis Kendaraan" name="jeniskendaraan">
    </div>
    <div class="form-group">
      <label for="nomormesinkendaraan">Nomor Mesin Kendaraan:</label>
      <input type="text" class="form-control" id="jumlah" placeholder="Ketik Nomor Kendaraan" name="nomormesinkendaraan" value="<?php echo $r['nomormesinkendaraan'];?>" >
    </div>
	<div class="form-group">
      <label for="tanggalbuat">Tanggal Buat:</label>
      <input type="date" class="form-control" id="tanggalbuat" title="Tentukan Tanggal Buat" name="tanggalbuat" value="<?php echo date('Y-m-d',strtotime($r['tanggalbuat']));?>">
    </div>
	<div class="form-group">
      <label for="catatankondisikendaraan">Catatan Kondisi Kendaraan:</label>
      <input type="text" class="form-control" id="catatankondisikendaraan" placeholder="Ketik catatankondisikendaraan" name="catatankondisikendaraan" value="<?php echo $r['catatankondisikendaraan'];?>">
    </div>
	<div class="form-group">
      <label for="nomorbpkb">Nomor BPKB:</label>
      <input type="text" class="form-control" id="nomorbpkb" placeholder="Ketik Nomor BPKB" name="nomorbpkb" value="<?php echo $r['nomorbpkb'];?>">
    </div>
  <div class="form-group">
      <label for="nomorstnk">Nomor STNK:</label>
      <input type="text" class="form-control" id="nomorstnk" placeholder="Ketik Nomor STNK" name="nomorstnk" value="<?php echo $r['nomorstnk'];?>">
    </div>
  <div class="form-group">
      <label for="statusstnk">Status STNK:</label>
      <input type="text" class="form-control" id="statusstnk" placeholder="Ketik Status STNK" name="statusstnk" value="<?php echo $r['statusstnk'];?>">
    </div>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
  </form>
</div>
</body>
</html>
<?php 
 if (isset($_POST['bsimpan'])) {
	$namakendaraan=$_POST['namakendaraan'];
	$nomorrangkakendaaraan=$_POST['nomorrangkakendaraan'];
  $jeniskendaraan=$_POST['jeniskendaraan'];
	$nomormesinkendaraan=$_POST['nomormesinkendaraan'];
	$tanggalbuat=$_POST['tanggalbuat'];
	$catatankondisikendaraan=$_POST['catatankondisikendaraan'];
	$nomorbpkb=$_POST['nomorbpkb'];
  $nomorstnk=$_POST['nomorstnk'];
  $statusstnk=$_POST['statusstnk'];
	
	
    $sql="UPDATE `inputbarang` SET `namakendaraan`='".$namakendaraan."',`nomorrangkakendaraan`='".$nomorrangkakendaraan."',`jeniskendaraan`='".$jeniskendaraan."',`nomormesinkendaraan`='".$nomormesinkendaraan."',`tanggalbuat`='".$tanggalbuat."',`catatankondisikendaraan`='".$catatankondisikendaraan."',`nomorbpkb`='".$nomorbpkb."',`nomorstnk`='".$nomorstnk."',`statusstnk`='".$statusstnk."' WHERE namakendaraan='".$namakendaraan."';";
	$q=$koneksi->query($sql);
    if ($q) {
      echo "Rekord barang sudah tersimpan !";
    } else {
      echo "Rekord barang gagal tersimpan !";
    }	  
	echo "
	<script>window.location.href='carikendaraan.php';</script>";
 }
 
?>