<?php
include("../style/header.php");
include("../database/koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: index.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM pendaftaran WHERE id=$id";
$query = mysqli_query($conn, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die(" <div class=container> Maaf, Data Tidak Ditemukan<br>
    <p style=font-size:24px><strong>0 Result</strong></p></div>");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Kegiatan</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

    <form action="/proses/proses-edit.php" method="POST">
    <div class="col-lg-6 col-lg-offset-3">
			<h2><center>Edit Data Siswa</h2>
			<div class="panel panel-success">
				<div class="panel-heading">
					Pastikan Anda Mengisi Dengan Benar
                </div>
            <div class="panel panel-body">

            <div class="form-group">
                <label for="id">Id Siswa (Diisi Oleh Sistem)</label>
                <input type="number" name="id" value="<?php echo $siswa['id'] ?>" class="form-control" readonly/>
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $siswa['nama'] ?>" class="form-control"/>
            </div>
        
            <div class="form-group">
                <label for="tempatlahir">Tempat Lahir</label>
                <input type="text" name="tempatlahir" placeholder="Tempat Lahir" value="<?php echo $siswa['tempatlahir'] ?>" class="form-control"/>
            </div>
            
            <div class="form-group">
                <label for="asal">Asal Wilayah</label>
                <input type="text" name="asal" placeholder="Bandung" value="<?php echo $siswa['asal'] ?>" class="form-control"/>
            </div>       

            <div class="form-group">
                <label for="hobi">Hobi</label>
                <input type="text" name="hobi" placeholder="Bermain Bola" value="<?php echo $siswa['hobi'] ?>" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="citacita">Cita - Cita</label>
                <input type="text" name="citacita" placeholder="Pilot" value="<?php echo $siswa['citacita'] ?>" class="form-control"/>
            </div>           

            <div class="form-group">
                <label for="asalsekolah">Asal Sekolah</label>
                <input type="text" name="asalsekolah" placeholder="SMP 18 Turki" value="<?php echo $siswa['asalsekolah'] ?>" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="number" name="telepon" placeholder="6281234567890" value="<?php echo $siswa['telepon'] ?>" class="form-control"/>
            </div>

  <!--          <label for="jenis_kelamin">Jenis Kelamin: </label>
            <?php $jk = $siswa['jenis_kelamin']; ?>
            <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>> Perempuan</label>
        </p>
        <p>
            <label for="agama">Agama: </label>
            <?php $agama = $siswa['agama']; ?>
            <select name="agama">
                <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
            </select>
        </p>
        <p>
            <label for="sekolah_asal">Sekolah Asal: </label>
            <input type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" />
        </p>
-->
<!--        <div class="form-group">
                <input type="submit" value="Simpan" name="simpan" class="btn btn-success-send" />
            </div>
-->

            <div class="form-group">
				<button value="simpan" class="btn btn-success send" name="simpan">Simpan</button>
			</div>
    </div>
</div>
    </form>
</div>
    </body>
</html>