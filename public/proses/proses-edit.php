<?php

include("../database/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){
	
	// ambil data dari formulir
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$tlahir = $_POST['tempatlahir'];
	$asal = $_POST['asal'];
	$hobi = $_POST['hobi'];
	$citacita = $_POST['citacita'];
    $asalsekolah = $_POST['asalsekolah'];
    $telepon = $_POST['telepon'];
	
	// buat query update
	$sql = "UPDATE pendaftaran SET nama='$nama', tempatlahir='$tlahir', asal='$asal', hobi='$hobi', citacita='$citacita', asalsekolah='$asalsekolah', telepon='$telepon' WHERE id=$id";
	$query = mysqli_query($conn, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php
		header('Location: index.php#table');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
