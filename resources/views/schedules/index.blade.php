@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Schedule</title>
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
            <center>ACTIVE SCHEDULE DATA
        </h1>
        <div class="table-responsive">
            <table class="table table-striped-columns">
                <a href="{{ route('schedules.create') }}" title="Add Schedule" class="btn btn-md btn-success mb-3"><i class="fa fa-plus"></i> ADD NEW ({{ Auth::user()->name }})</a>
                <thead>
                    <tr class="table-success text-center">
                        <th>ID</th>
                        <th>Group Id-Name</th>
                        <th>User</th>
                        <th>Note</th>
                        <th>time_start_at</th>
                        <th>time_end_at</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($schedules as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->group->id }} - {{ $item->group->name }}</td>
                        <td>{{ $item->user->id }} - {{ $item->user->name }}</td>
                        <td>{{ ($item->note == null)? 'Belum Input':$item->note }}</td>
                        <td>{{ $item->time_start_at }}</td>
                        <td>{{ $item->time_end_at }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('schedules.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('schedules.edit', $item->id) }}" title="Edit Schedule" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i> EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Edit Data"><i class="fa-solid fa-trash"></i> DELETE</button>
                                <a href="{{ route('presences.show', $item->id) }}" title="Attendance" class="btn btn-sm btn-success"><i class="fa fa-list-ul"></i> Attendance</a>
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