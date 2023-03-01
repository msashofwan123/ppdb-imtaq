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
        <div class="col-lg-6">

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Id - Name Group</th>
                        <td>{{ $groups->id .' - '. $groups->name }}</td>
                    </tr>
                    <tr>
                        <th>Id - Name User</th>
                        <td>{{ $users->id .' - '. $users->name }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Siswa</th>
                        <td>{{ $count }} Siswa</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <table class="table table-striped-columns">
            <a href="{{ route('members.create', $groups->id) }}" class="btn btn-md btn-success mb-3">ADD NEW ({{ Auth::user()->name }})</a>
            <thead>
                <tr class="table-success">
                    <th scope="col">
                        <center>ID
                    </th>
                    <th scope="col">
                        <center>group_id - Name
                    </th>
                    <th scope="col">
                        <center>student_id - Name
                    </th>
                    <th scope="col" colspan="2">
                        <center>Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->group_id .'-'. $groups->name }}</td>
                    <td>{{ $member->student_id . '-' . $member->student_name }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('members.destroy', $member->id) }}" method="POST">
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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

        </div>
    </div>
    <?php include('style/script.php'); ?>
</body>

</html>
@stop