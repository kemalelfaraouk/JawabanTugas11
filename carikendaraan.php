<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cari Kendaraan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Cari Kendaraan</h2>
  <p>Ketik kata kunci nama kendaraan yang dicari:</p>
  <form method="post">
    <div class="form-group">
      <label for="namadicari">Nama kendaraan atau Kata kunci namanya:</label>
      <input type="text" class="form-control" id="namadicari" name="namadicari">
    </div>
    <button type="submit" class="btn btn-primary" name="bcari">Cari Kendaraan</button>
	<button class="btn btn-primary" name="binput">Input Kendaraan Baru</button>
  </form>
</div>
<?php 
if (isset($_POST['binput'])) {
	echo "<script>window.location.href='InputDataKendaraan.php';</script>";
	exit();
}
$koneksi=new mysqli("localhost","root","","inputbarang");
if (isset($_POST['bcari'])) {
 $namadicari=$_POST['namadicari'];	
 $sql="SELECT * FROM `inputbarang` WHERE `namakendaraan` LIKE '%".$namadicari."%'";
} else {
 $sql="SELECT * FROM `inputbarang`";
} 
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Rekord yang dicari tidak ditemukan !</h2>";
	 exit();
 }
?>
<div class="container">
  <h2>Tabel Kendaraan</h2>
  <p>Daftar barang yang tersimpan di database adalah :</p>            
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nama Kendaraan</th>
        <th>Nomor Rangka Kendaraan</th>
        <th>Jenis Kendaraan</th>
        <th>Nomor Mesin Kendaraan</th>
		    <th>Tanggal buat</th>
		    <th>Catatan Kondisi Kendaraan</th>
		    <th>Nomor BPKB</th>
        <th>Nomor STNK</th>
        <th>Status STNK</th>
		    <th>Koreksi</th>
		    <th>Hapus</th>
      </tr>
    </thead>
    <tbody>
	<?php do { 
	?>
      <tr>
        <td><?php echo $r['namakendaraan'];?></td>
		    <td><?php echo $r['nomorrangkakendaraan'];?></td>
        <td><?php echo $r['jeniskendaraan'];?></td>
		    <td><?php echo $r['nomormesinkendaraan'];?></td>
		    <td><?php echo $r['tanggalbuat'];?></td>
		    <td><?php echo $r['catatankondisikendaraan'];?></td>
		    <td><?php echo $r['nomorbpkb'];?></td>
        <td><?php echo $r['nomorstnk'];?></td>
        <td><?php echo $r['statusstnk'];?></td>
		<td><a href="koreksikendaraan.php?namakendaraan=<?php echo $r['namakendaraan'];?>" class="btn btn-primary">Update</a></td>
		<td><a href="hapuskendaraan.php?namakendaraan=<?php echo $r['namakendaraan'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin akan menghapus barang <?php echo $r['namakendaraan'];?> ?')">Delete</a></td>
      </tr>
	<?php } while ($r=$q->fetch_array());
	?>
    </tbody>
  </table>
</div>
</body>
</html>