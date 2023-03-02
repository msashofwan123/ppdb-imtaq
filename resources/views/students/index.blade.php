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
        <div class="table-responsive">
            <table class="table table-striped-columns">
                @can('tuRole')
                <a href="{{ route('students.create') }}" class="btn btn-md btn-success mb-3"><i class="fa fa-plus" aria-hidden="true"></i> ADD NEW</a>
                @endcan
                <thead>
                    <tr class="table-success text-center">
                        <th>ID</th>
                        <th>NISN</th>
                        <th>User_id</th>
                        <th>Users.Name</th>
                        <th>Users.Email</th>
                        <th>Phone</th>
                        <th>Photo</th>
                        @can('tuRole')
                        <th>Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->number }}</td>
                        <td>{{ $student->user_id }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->user->email}}</td>
                        <td>{{ $student->phone}}</td>
                        <td class="text-center">
                            <img src="{{ Storage::url('public/students/').$student->photo }}" class="rounded" style="width: 150px">
                        </td>
                        @can('tuRole')
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $student->user_id) }}" method="POST">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i> EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> DELETE</button>
                            </form>
                        </td>
                        @endcan
                    </tr>

                    @empty
                    <div class="alert alert-danger">
                        <center>DATA NOT FOUND</center>
                    </div>
                    
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Akhir Data Table -->
    </div>

    <?php include('style/script.php'); ?>
</body>

</html>
@stop