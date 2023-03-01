@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="style/idbc-favicon.ico">
    <link rel="stylesheet" href="style/user.css">
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
            <center>User Control
        </h1>

        <table class="table table-striped-columns">
            <a href="" class="btn btn-md btn-success mb-3"><i class="fa fa-plus-circle"></i> ADD NEW ({{ Auth::user()->name }})</a>
            <thead>
                <tr class="table-success">
                    <th scope="col">
                        <center>ID
                    </th>
                    <th scope="col">
                        <center>Name
                    </th>
                    <th scope="col">
                        <center>Email
                    </th>
                    <th scope="col">
                        <center>Email Verified At
                    </th>
                    <th scope="col">
                        <center>Role
                    </th>
                    <th scope="col" colspan="2">
                        <center>Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->email_verified_at }}</td>
                    <td class="text-center">
                        @if ($item->role === 'admin')
                        <span class="highlight highlight-admin">ADMIN</span>
                        @elseif ($item->role === 'guru')
                        <span class="highlight highlight-guru">GURU</span>
                        @elseif ($item->role === 'member')
                        <span class="highlight highlight-member">MEMBER</span>
                        @elseif ($item->role === 'tu')
                        <span class="highlight highlight-tu">TATA USAHA</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm">Test Doang</button>
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
    <?php include('style/script.php'); ?>
</body>

</html>
@stop