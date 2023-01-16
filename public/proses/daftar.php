<?php
include("../style/header.php")
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran IDBC 2022</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
	
	<form action="/myidbc/proses/proses-pendaftaran.php" method="POST">
	<div class="col-lg-6 col-lg-offset-3">
		<h2><center>Formulir Pendaftaran Mahasiswa IDBC 2022</h2>

		<div class="panel panel-primary">
			<div class="panel-heading">
				Wajib Mengisi Data Dengan Sesuai dan Akurat
			</div>
		
		<div class="panel panel-body">

			<div class="form-group">
				<label for="id">Id Siswa (Diisi Oleh Sistem)</label>
				<input type="number" name="id" placeholder="Id Mahasantri" class="form-control" readonly />
			</div>

			<div class="form-group">
				<label for="nama">Nama Lengkap</label>
				<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
			</div>

			<div class="form-group">
				<label for="tempatlahir">Tempat Lahir</label>
				<input type="text" name="tempatlahir" placeholder="Tempat Lahir" class="form-control" />
			</div>

			<div class="form-group">
				<label for="asal">Asal Wilayah</label>
				<input type="text" name="asal" placeholder="Jawa Barat" class="form-control" />
			</div>
		
			<div class="form-group">
                <label for="hobi">Hobi</label>
                <input type="text" name="hobi" placeholder="Bermain Bola" class="form-control"/>
            </div>

			<div class="form-group">
                <label for="citacita">Cita - Cita</label>
                <input type="text" name="citacita" placeholder="Pilot" class="form-control"/>
            </div>

			<div class="form-group">
                <label for="asalsekolah">Asal Sekolah</label>
                <input type="text" name="asalsekolah" placeholder="SMP 18 Turki" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="number" name="telepon" placeholder="6281234567890"  class="form-control"/>
            </div>

			<div class="form-group">
				<button value="daftar" class="btn btn-success send" name="daftar">Daftar</button>
			</div>
		
		</div>
		</div>
	</div>
	</form>
</div>
</body>
</html>