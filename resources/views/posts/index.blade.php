@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="style/idbc-favicon.ico">
</head>

<body>

    <main>
        <!-- Awal Header -->
        <?php
        // include("style/header.php");
        ?>
        <!-- Akhir Header -->

    </main>

    <!-- Awal Data Table -->
    <div id="table" class="container">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        <h1>
            <center>POST DATA
        </h1>

        <table class="table table-striped-columns">
            <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
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
                        <center>Last Update
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
                    <td class="text-center">
                        <img src="{{ Storage::url('public/posts/').$pdata->image }}" class="rounded" style="width: 150px">
                    </td>
                    <td>{{ $pdata->title }}</td>
                    <td>{!! $pdata->content !!}</td>
                    <td>{{ $pdata->created_at}}</td>
                    <td>{{ $pdata->updated_at}}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $pdata->id) }}" method="POST">
                            <a href="{{ route('posts.edit', $pdata->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                        </form>
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
    </div>

    <!-- Start Footer Code -->
    <?php
    // include("style/footer.php")
    ?>
    <!-- End Footer Code -->
    <?php include('style/script.php'); ?>
    <!-- <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script> -->
</body>


</html>
@stop