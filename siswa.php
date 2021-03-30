<?php 
	$go = new oop();

	$table = "siswa";
	$field = array(
				'nis'=> @$_POST['nis'],
				'nama'=> @$_POST['nama'],
				'tanggal_lahir'=> @$_POST['tanggal_lahir'],
				'jenis_kelamin'=> @$_POST['jenis_kelamin'],
				'kelas'=> @$_POST['kelas'],
				'alamat'=> @$_POST['alamat'],
				'nomor'=> @$_POST['nomor'],
				'asal_sekolah'=> @$_POST['asal_sekolah'],
				'tempat_lahir'=> @$_POST['tempat_lahir']
				);
	$redirect = "?menu=siswa";
	@$where = "nama = '$_GET[id]'";
	if (isset($_POST['simpan'])) {
		$go->simpan($koneksi, $table, $field, $redirect);
	}

	if (isset($_GET['hapus'])) {
		$go->hapus($koneksi, $table, $where, $redirect);
	}

	if (isset($_GET['edit'])) {
		$edit = $go->edit($koneksi, $table, $where);
	}

	if (isset($_POST['update'])) {
		$go->ubah($koneksi, $table, $field, $where, $redirect);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>crud Html</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<h1 class="text-center">Crud DATA MAHASISWA</h1>


<!-- awal card From -->
<div class="card mt-3">
	<div class="card-header bg-primary text-white">
	Form input Mahasiswa
	</div>
	<div class="card-body">
	<form method="post" action="">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>NIS</label>
					<input type="text" name="nis"  value="<?=@$edit['nis']?>" class="form-control" placeholder="Masukan NIS" required>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama"  value="<?=@$edit['nama']?>" class="form-control" placeholder="Masukan Nama" required>
				</div>		  				
			</div> 			
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="Date" name="tanggal_lahir"  value="<?=@$edit['tanggal_lahir']?>" class="form-control" placeholder="Masukan Tanggal Lahir" required>
				</div>	
			</div>
		<div class="col-md-6">
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name= "jenis_kelamin">
						<option  value="<?=@$edit['jenis_kelamin']?>"> <?=@$edit['jenis_kelamin']?></option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Kelas</label>
					<select class="form-control" name="kelas">
						<option disabled selected="off">Pilih Kelas</option>
					<?php   
						$result = mysqli_query($koneksi,"SELECT * FROM kelas");   

						while ($row = mysqli_fetch_array($result)) {  
							
						?>
							<option value="<?= $row['1']?>"><?= $row['1']?></option>
					<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Nomor Telepon</label>
					<input type="textarea" name="nomor"  value="<?=@$edit['nomor']?>" 
					class="form-control" placeholder="Masukan Nomor Telepon" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Alamat</label>
					<textarea type="text" name="alamat"
					 class="form-control" placeholder="Masukan Alamat" required><?=@$edit['alamat']?></textarea>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="col-md-6">
				<div class="form-group">
					<label>Asal Sekolah</label>
					<input type="text" name="asal_sekolah"  value="<?=@$edit['asal_sekolah']?>"
					 class="form-control" placeholder="Masukan Asal Sekolah" required>
				</div>		  				
			</div> 			
		
		<div class="col-md-6">
				<div class="form-group">
					<label>Tempat_Lahir</label>
					<input type="text" name="tempat_lahir"  value="<?=@$edit['tempat_lahir']?>"
					 class="form-control" placeholder="Masukan Tempat Lahir" required>
				</div>	
			</div>

		<div class="col-md-6">
		<?php if(@$_GET['id'] == "") { ?>
			<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
		<?php } else { ?>
			<button type="submit" class="btn btn-warning" name="update">Update</button>
		<?php }?>

		<button type="reset" class="btn btn-danger" name="reset">Clear</button>

	</form>
	</div>
</div>
</div>

<!-- Akhir Card  From -->


<!-- awal card Tabel -->
<div class="card mt-3">
	<div class="card-header bg-success text-white">
	Data Mawasiswa
	</div>
	<div class="card-body">

	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>NIS</th>
			<th>Nama</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Kelas</th>
			<th>Nomor Telepon</th>
			<th>Alamat</th>
			<th>Asal Sekolah</th>
			<th>Tempat_lahir</th>
			<th class="text-center">Aksi</th>
			
		</tr>
		<tbody>
			<?php 
				$no=1;
				$a = $go->tampil($koneksi, $table);
				if($a < 1) {
					echo "<td align='center' colspan='9'><b>Data Kosong</b></td>";
				} else {
				foreach ($a as $r) {
				?>

				<tr>
					<th><?= $no++ ?></th>
					<td><?= $r['nis'] ?></td>
					<td><?= $r['nama'] ?></td>
					<td><?= $r['tanggal_lahir'] ?></td>
					<td><?= $r['jenis_kelamin'] ?></td>
					<td><?= $r['kelas'] ?></td>
					<td><?= $r['nomor'] ?></td>
					<td><?= $r['alamat'] ?></td>
					<td><?= $r['asal_sekolah'] ?></td>
					<td><?= $r['tempat_lahir'] ?></td>
					<td>
						<a href="?menu=siswa&hapus&id=<?php echo $r['nama'] ?>" onClick="return confirm('Anda Yakin')" class="btn btn-outline-danger">Hapus</a>
						<a href="?menu=siswa&edit&id=<?php echo $r['nama'] ?>" class="btn btn-outline-warning">Edit</a>
					</td>
				</tr>
			<?php } } ?>
		</tbody>
	</table>
	
	</div>
</div>
<!-- Akhir Card table -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>