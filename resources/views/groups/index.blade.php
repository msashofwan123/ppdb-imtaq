@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Groups</title>
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

        @if(count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif


        <h1>
            <center>ACTIVE CLASS DATA
        </h1>
        <div class="table-responsive">
            <table class="table table-striped-columns">
                @can('tuRole')
                <a href="{{ route('groups.create') }}" class="btn btn-md btn-success mb-3"><i class="fa fa-plus" aria-hidden="true"></i> ADD NEW ({{ Auth::user()->name }})</a>
                @endcan
                <thead>
                    <tr class="table-success text-center">
                        <th>Students</th>
                        <th>ID</th>
                        <th>ID Dosen</th>
                        <th>Nama Dosen</th>
                        <th>Nama Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($groups as $item)
                    <tr>
                        <td class="text-center">
                            <a href="{{ route('groups.show', $item->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-bars"></i> LIST</a>
                        </td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->user_id }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('groups.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('groups.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i> EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> DELETE</button>
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
        </div>
    </div>

    <?php include('style/script.php'); ?>
</body>

</html>
@stop