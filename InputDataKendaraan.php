<!DOCTYPE html>
<html lang="en">
<head>
  <title>Input RecordKendaraan Baru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <center><h2>Input Record Kendaraan Baru</h2></center>
  <hr style="height: 1px; border: none; color: #333; background-color: #333;">
  <form method="post">
    <div class="form-group">
      <label for="namakendaraan">Nama Kendaraan:</label>
      <input type="text" class="form-control" id="namakendaraan" placeholder="Ketik Nama Kendaraan" name="namakendaraan">
    </div>
    <div class="form-group">
      <label for="nomorrangkakendaraan">Nomor Rangka Kendaraan:</label>
      <input type="text" class="form-control" id="nomorrangkakendaraan" placeholder="Ketik Nomor Rangka Kendaraan" name="nomorrangkakendaraan">
    </div>
    <div class="form-group">
      <label for="jeniskendaraan">Jenis Kendaraan:</label>
      <input type="text" class="form-control" id="jeniskendaraan" placeholder="Ketik Jenis Kendaraan" name="jeniskendaraan">
    </div>
	<div class="form-group">
      <label for="nomormesinkendaraan">Nomor Mesin Kendaraan:</label>
      <input type="text" class="form-control" id="nomormesinkendaraan" placeholder="Ketik Nomor Mesin Kendaraan" name="nomormesinkendaraan">
    </div>
	<div class="form-group">
      <label for="tanggalbuat">Tanggal Buat:</label>
      <input type="date" class="form-control" id="tanggalbuat" title="Tentukan Tanggal Buat" name="tanggalbuat">
    </div>
	<div class="form-group">
      <label for="catatankondisikendaraan">Catatan Kondisi Kendaraan:</label>
      <input type="text" class="form-control" id="catatankondisikendaraan" placeholder="Catatan Kondisi Kendaraan" name="catatankondisikendaraan">
    </div>
    <div class="form-group">
      <label for="nomorbpkb">Nomor BPKB:</label>
      <input type="text" class="form-control" id="nomorbpkb" placeholder="Masukan Nomor BPKB" name="nomorbpkb">
    </div>
    <div class="form-group">
      <label for="nomorstnk">Nomor Stnk:</label>
      <input type="text" class="form-control" id="nomorstnk" placeholder="Masukan Nomor STNK" name="nomorstnk">
    </div>
    <div class="form-group">
      <label for="statusstnk">Status Stnk:</label>
      <input type="text" class="form-control" id="statusstnk" placeholder="Status Stnk" name="statusstnk">
    </div>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
	<button class="btn btn-success" name="bcari">Cari Kendaraan</button>
  </form>
</div>
</body>
</html>
<?php
if (isset($_POST['bcari'])){
  echo "<script>window.location.href='carikendaraan.php';</script>";
  exit();
}
if (isset($_POST['bsimpan'])){
  $namakendaraan=$_POST['namakendaraan'];
  $nomorrangkakendaraan=$_POST['nomorrangkakendaraan'];
  $jeniskendaraan=$_POST['jeniskendaraan'];
  $nomormesinkendaraan=$_POST['nomormesinkendaraan'];
  $tanggalbuat=$_POST['tanggalbuat'];
  $catatankondisikendaraan=$_POST['catatankondisikendaraan'];
  $nomorbpkb=$_POST['nomorbpkb'];
  $nomorstnk=$_POST['nomorstnk'];
  $statusstnk=$_POST['statusstnk'];
  if (empty($namakendaraan)){
    echo "Nama Kendaraan Harus Diisi!";
    exit();
  }

  $koneksi=new mysqli ("localhost","root","","inputbarang");
  $sql="INSERT INTO `inputbarang`(`namakendaraan`, `nomorrangkakendaraan`, `jeniskendaraan`, `nomormesinkendaraan`, `tanggalbuat`, `catatankondisikendaraan`, `nomorbpkb`, `nomorstnk`, `statusstnk`) VALUES ('".$namakendaraan."','".$nomorrangkakendaraan."','".$jeniskendaraan."','".$nomormesinkendaraan."','".$tanggalbuat."','".$catatankondisikendaraan."','".$nomorbpkb."','".$nomorstnk."','".$statusstnk."');";
  $q=$koneksi->query($sql);
  if ($q){
    echo "Record Kendaraan sudah tersimpan!";
  } else {
    echo "Record Kendaraan gagal tersimpan!";
  }
}
include ("daftarkendaraan.php");
?>