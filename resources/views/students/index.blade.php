@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
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
            <center>ACTIVE STUDENT DATA
        </h1>

        <table class="table table-striped-columns">
            <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3">ADD NEW</a>
            <thead>
                <tr class="table-success">
                    <th scope="col">
                        <center>ID
                    </th>
                    <th scope="col">
                        <center>NISN
                    </th>
                    <th scope="col">
                        <center>Name
                    </th>
                    <th scope="col">
                        <center>Email
                    </th>
                    <th scope="col">
                        <center>Phone
                    </th>
                    <th scope="col">
                        <center>Photo
                    </th>
                    <th scope="col" colspan="2">
                        <center>Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->number }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email}}</td>
                    <td>{{ $student->phone}}</td>
                    <td class="text-center">
                        <img src="{{ Storage::url('public/students/').$student->photo }}" class="rounded" style="width: 150px">
                    </td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('students.destroy', $student->id) }}" method="POST">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>

                @empty
                <div class="alert alert-danger">
                    <center>DATA NOT FOUND</center>
                </div>

                @endforelse
            </tbody>
            <!-- Akhir Data Table -->
        </table>
        <div>
            <!-- {{ $students->Links() }} -->
        </div>
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