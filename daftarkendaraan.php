<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Kendaraan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
$koneksi=new mysqli("localhost","root","","inputbarang");
$sql="SELECT * FROM `inputbarang`";
$q=$koneksi->query($sql);
$r=$q->fetch_array();
if (empty($r)) {
	 echo "<h2>Rekord yang dicari tidak ditemukan !</h2>";
	 exit();
 }
?>
<div class="container">
  <h2>Tabel Kendaraan</h2>
  <p>Daftar Kendaraan yang tersimpan di database adalah :</p>            
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nama Kendaraan</th>
        <th>Nama Rangka Kendaraan</th>
        <th>Jenis Kendaraan</th>
        <th>Nomor Mesin Kendaraan</th>
		    <th>Tanggal Buat</th>
		    <th>Catatan Kondisi Kendaraan</th>
		    <th>Nomor BPKB</th>
        <th>Nomor STNK</th>
        <th>Status STNK</th>
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
      </tr>
	<?php } while ($r=$q->fetch_array());
	?>
    </tbody>
  </table>
</div>

</body>
</html>