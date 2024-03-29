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
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Id Schedule</th>
                                <td>{{ $schedule->id }}</td>
                            </tr>
                            <tr>
                                <th>Id - Name Group</th>
                                <td>{{ $schedule->group_id }} - {{ $schedule->group->name }}</td>
                            </tr>
                            <tr>
                                <th>Id - Name User</th>
                                <td>{{ $schedule->user_id }} - {{ $schedule->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Siswa</th>
                                <td>{{ $schedule->group->member->count() }} Siswa</td>
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
        </div>

        <div class="row">
            <div class="table-responsive">
                <div class="col-lg-10">
                    <form action="{{ route('presences.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                @forelse ($members as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <input type="hidden" name="scheduleid" value="{{ $schedule->id }}">
                                    <input type="hidden" name="items[{{ $item->id }}][schedule_id]" value="{{ $schedule->id }}">
                                    <td>{{ $item->student_id }}</td>
                                    <input type="hidden" name="items[{{ $item->id }}][student_id]" value="{{ $item->student_id }}">
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="items[{{ $item->id }}][presence]" id="presence1{{ $item->id }}" value="Hadir">
                                            <label class="form-check-label" for="presence1{{ $item->id }}">Hadir</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="items[{{ $item->id }}][presence]" id="presence2{{ $item->id }}" value="Sakit">
                                            <label class="form-check-label" for="presence2{{ $item->id }}">Sakit</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="items[{{ $item->id }}][presence]" id="presence3{{ $item->id }}" value="Izin">
                                            <label class="form-check-label" for="presence3{{ $item->id }}">Izin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="items[{{ $item->id }}][presence]" id="presence4{{ $item->id }}" value="Alfa">
                                            <label class="form-check-label" for="presence4{{ $item->id }}">Alfa</label>
                                        </div>
                                        <!-- error message untuk presence -->
                                        @error('presence')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('note') is-invalid @enderror" name="items[{{ $item->id }}][note]">

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

                                <tr>
                                    <td colspan="4">
                                        <label class="font-weight-bold" for="subject">Materi</label>
                                        <textarea type="text" name="subject" id="subject" placeholder="Tuliskan Materi Di Sini" rows="4" cols="130" style="resize:none;"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-md btn-success"><i class="fa fa-cogs"></i> SUBMIT</button>
                        <button type="reset" class="btn btn-md btn-warning"><i class="fa fa-refresh"></i> RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


@stop