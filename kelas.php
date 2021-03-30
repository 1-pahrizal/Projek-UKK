<?php 

	$go = new oop();

	$table = "kelas";
	$field = array('nama'=> @$_POST['kelas']);
	$redirect = "?menu=kelas";
	@$where = "nama = '$_GET[id]'";

	if (isset($_POST['simpan'])) {
		$go->simpan($koneksi, $table, $field, $redirect);
	}

	if (isset($_GET['hapus'])) {
		$go->hapus($koneksi, $table, $where, $redirect);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kelas</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<h1 class="text-center">Crud DATA KELAS</h1>

	<div class="row">
		<div class="col-md-6 mt-2">
			<div class="card">
				<div class="card-header bg-primary text-center text-white">
					Input Kelas
				</div>
				<div class="card-body">
					<form method="post" action="">
							<input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas" required>
							<br>
						<button type="submit" name="simpan" class="btn btn-primary btn-block">Simpan!!!</button>
					</form>
				</div>
				<div class="card-footer">
					Ini Footer
				</div>
			</div>
		</div>
		<div class="col-md-6 mt-2">
			<table class="table">
				<thead class="table-dark">
					<tr>
						<th>No.</th>
						<th>Kelas</th>
						<th>Aksi</th>
					</tr>
				</thead>		
				
				<tbody>
					<?php 
						$no=1;
						$a = $go->tampil($koneksi, $table);
						if($a < 1) {
							echo "<td align='center' colspan='3'>Data Kosong</td>";
						} else {
						foreach ($a as $r) {
						?>

						<tr>
							<th><?= $no++ ?></th>
							<td><?= $r['nama'] ?></td>
							<td>
								<a href="?menu=kelas&hapus&id=<?php echo $r['nama'] ?>" onClick="return confirm('Anda Yakin')" class="btn btn-outline-danger">Hapus</a>
							</td>
						</tr>
					<?php } } ?>
				</tbody>
			</table>	
		</div>
	</div>
</body>
</html>


