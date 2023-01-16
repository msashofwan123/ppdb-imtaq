<?php

include("../database/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
	
	// ambil data dari formulir
    $id = $_POST['id'];
	$nama = $_POST['nama'];
    $tempatlahir = $_POST['tempatlahir'];
	$asal = $_POST['asal'];
	$hobi = $_POST['hobi'];
	$citacita = $_POST['citacita'];
    $asalsekolah = $_POST['asalsekolah'];
	$telepon = $_POST['telepon'];
	
	// buat query
	$sql = "INSERT INTO pendaftaran (id, nama, tempatlahir, asal, hobi, citacita, asalsekolah, telepon) VALUE ('$id','$nama', '$tempatlahir', '$asal', '$hobi', '$citacita', '$asalsekolah', '$telepon')";
	$query = mysqli_query($conn, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: ../index.php');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: ../index.php');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
