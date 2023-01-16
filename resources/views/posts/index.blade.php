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
            <center>POST DATA
        </h1>

        <table class="table table-primary table-striped-columns">
            <thead>
                <tr class="table-success">
                    <th scope="col">
                        <center>ID
                    </th>
                    <th scope="col">
                        <center>Image
                    </th>
                    <th scope="col">
                        <center>Title
                    </th>
                    <th scope="col">
                        <center>Content
                    </th>
                    <th scope="col">
                        <center>Created At
                    </th>
                    <th scope="col">
                        <center>Updated At
                    </th>
                    <th scope="col" colspan="2">
                        <center>Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($posts as $pdata)
                <tr>
                    <td>{{ $pdata->id }}</td>
                    <td>{{ $pdata->image }}</td>
                    <td>{{ $pdata->title }}</td>
                    <td>{{ $pdata->content }}</td>
                    <td>{{ $pdata->created_at}}</td>
                    <td>{{ $pdata->updated_at}}</td>
                    <td>
                        <a href="proses/edit.php?id={{ $pdata->id }}">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="proses/delete.php?id={{ $pdata->id }}">
                            Hapus
                        </a>
                    </td>
                </tr>

                @empty
                <div class="alert alert-danger">
                    <center>Data Belum Tersedia</center>
                </div>

                @endforelse
            </tbody>
            <!-- Akhir Data Table -->
        </table>
        {{ $posts->Links() }}
    </div>

    <!-- Start Footer Code -->
    <?php
    include("style/footer.php")
    ?>
    <!-- End Footer Code -->

</body>
<?php include('style/script.php'); ?>

</html>