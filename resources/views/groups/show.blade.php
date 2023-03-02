@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Members</title>
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
            <center>ACTIVE MEMBERS DATA
        </h1>
        <div class="table-responsive">
            <div class="col-lg-6">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Id - Name Group</th>
                            <td>{{ $groups->id .' - '. $groups->name }}</td>
                        </tr>
                        <tr>
                            <th>Id - Name User</th>
                            <td>{{ $groups->user->id .' - '. $groups->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Siswa</th>
                            <td>{{ $groups->member->count(); }} Siswa</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped-columns">
                @can('tuRole')
                <a href="{{ route('members.create', $groups->id) }}" class="btn btn-md btn-success mb-3"><i class="fa fa-plus" aria-hidden="true"></i> ADD NEW ({{ Auth::user()->name }})</a>
                @endcan
                <thead>
                    <tr class="table-success">
                        <th>ID</th>
                        <th>Group_id - Name</th>
                        <th>Student_id - Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($groups->member as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->group->id .' - '. $item->group->name }}</td>
                        <td>{{ $item->student->id . ' - ' . $item->student->user->name }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('members.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('members.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i> EDIT</a>
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