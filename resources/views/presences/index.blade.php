@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Presence</title>
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

        <table class="table table-striped-columns">
            <a href="{{ route('presences.create') }}" class="btn btn-md btn-success mb-3"><i class="fa fa-plus-circle"></i> ADD NEW ({{ Auth::user()->name }})</a>
            <thead>
                <tr class="table-success">
                    <th scope="col">
                        <center>ID
                    </th>
                    <th scope="col">
                        <center>Schedule Id
                    </th>
                    <th scope="col">
                        <center>Student Id
                    </th>
                    <th scope="col">
                        <center>Presence
                    </th>
                    <th scope="col">
                        <center>Note
                    </th>
                    <th scope="col" colspan="2">
                        <center>Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($presences as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->schedule_id }}</td>
                    <td>{{ $item->student_id }}</td>
                    <td>{{ $item->presence }}</td>
                    <td>{{ $item->note }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('presences.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('presences.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> DELETE</button>
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

        </div>
    </div>
    <?php include('style/script.php'); ?>
</body>


</html>
@stop