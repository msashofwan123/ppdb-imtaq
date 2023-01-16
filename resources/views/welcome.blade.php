<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="style/idbc-favicon.ico">
</head>

<body>

    <main>
        <!-- Awal Header -->
        <?php
        include("style/header.php");
        ?>
        <!-- Akhir Header -->

        <!-- Awal Heroes -->
        <div class="bg-dark text-secondary px-4 py-5 text-center">
            <div class="py-5">
                <h1 class="display-5 fw-bold text-white">Data Pendaftar 2022 IDBC</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="fs-5 mb-4">Mari Bergabung Bersama Kami, dalam Pendidikan Islam A-IDBC sebagai lembaga yang berfokus pada pendidikan Kader pemimpin-pemimpin Islam untuk Masa yang akan datang</p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold"><a href="/myidbc/proses/daftar.php">Daftar Sekarang</a></button>
                        <button type="button" class="btn btn-outline-light btn-lg px-4"><a href="https://myidbc.net/wp-content/uploads/2022/01/Info-PMB-21-22.pdf">Download Brosur</a></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Heroes -->
    </main>

    <?php if (isset($_GET['status'])) : ?>
        <p>
            <?php
            if ($_GET['status'] == 'sukses') {
                echo "Pendaftaran siswa baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
            ?>
        </p>
    <?php endif; ?>

    <!-- Awal Data Table -->
    <div id="table" class="container">
        <h1>
            <center>Data Pendaftar
        </h1>

        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th scope="col">
                        <center>ID
                    </th>
                    <th scope="col">
                        <center>Nama Lengkap
                    </th>
                    <th scope="col">
                        <center>Tempat Lahir
                    </th>
                    <th scope="col">
                        <center>Asal
                    </th>
                    <th scope="col">
                        <center>Hobi
                    </th>
                    <th scope="col">
                        <center>Cita-Cita
                    </th>
                    <th scope="col">
                        <center>Asal Sekolah
                    </th>
                    <th scope="col">
                        <center>Telepon
                    </th>
                    <th scope="col" colspan="2">
                        <center>Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($dataPendaftar as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->tempatlahir }}</td>
                    <td>{{ $p->asal }}</td>
                    <td>{{ $p->hobi }}</td>
                    <td>{{ $p->citacita }}</td>
                    <td>{{ $p->asalsekolah }}</td>
                    <td>{{ $p->telepon }}</td>
                    <td>
                        <a href="proses/edit.php?id={{ $p->id }}">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="proses/delete.php?id={{ $p->id }}">
                            Hapus
                        </a>
                    </td>
                </tr>

                @endforeach
            </tbody>

            <!-- Akhir Data Table -->
        </table>
    </div>

    <!-- Start Footer Code -->
    <?php
    include("style/footer.php")
    ?>
    <!-- End Footer Code -->
</body>

</html>