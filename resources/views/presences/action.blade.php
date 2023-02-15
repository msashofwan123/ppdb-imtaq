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

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Id Schedule</th>
                            <td>{{ $schedule->id }}</td>
                        </tr>
                        <tr>
                            <th>Id - Name Group</th>
                            <td>{{ $schedule->group_id }} - {{ $result->group_name }}</td>
                        </tr>
                        <tr>
                            <th>Id - Name User</th>
                            <td>{{ $schedule->user_id }} - {{ $result->user_name }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Siswa</th>
                            <td>{{ $count }} Siswa</td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td>{{ $schedule->note }}</td>
                        </tr>
                        <tr>
                            <th>Waktu Pembelajaran</th>
                            <td>{{ $schedule->time_start_at.' WIB - '.$schedule->time_end_at. ' WIB' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Presence</th>
                            <th>Note</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($presence as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->student_id }}</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence1" value="Hadir">
                                    <label class="form-check-label" for="presence1">Hadir</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence2" value="Sakit">
                                    <label class="form-check-label" for="presence2">Sakit</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence3" value="Izin">
                                    <label class="form-check-label" for="presence3">Izin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence3" value="Alfa">
                                    <label class="form-check-label" for="presence3">Alfa</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}">

                                    <!-- error message untuk note -->
                                    @error('note')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </td>
                        </tr>

                        @empty
                        <div class="alert alert-danger">
                            <center>DATA NOT FOUND</center>
                        </div>

                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

@stop