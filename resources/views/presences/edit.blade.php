@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Presence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="../style/idbc-favicon.ico">
</head>

<body style="background: lightgray">

    <!-- Awal Data Form -->
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('presences.update', $presence->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label class="font-weight-bold">Presence Id</label>
                                <select type="text" class="form-control  @error('schedule_id') is-invalid @enderror" name="schedule_id" id="schedule_id">
                                    <option>Pilih Schedule</option>
                                    @foreach ($schedule as $schedule)
                                    <option value="{{ $schedule->id }}" {{ $schedule->id == $selectedScheduleId ? 'selected' : '' }}>{{ $schedule->id }}. {{ $schedule->name }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk schedule_id -->
                                @error('schedule_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Student Id</label>

                                <select type="text" class="form-control  @error('student_id') is-invalid @enderror" name="student_id" id="student_id">
                                    <option>Pilih Student</option>
                                    @foreach ($student as $student)
                                    <option value="{{ $student->id }}" {{ $student->id == $selectedStudentId ? 'selected' : '' }}>{{ $student->id }}. {{ $student->name }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk student_id -->
                                @error('student_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Presence</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence1" value="Hadir" {{ $presence->presence == 'Hadir' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="presence1">Hadir</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence2" value="Sakit" {{ $presence->presence == 'Sakir' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="presence2">Sakit</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence3" value="Izin" {{ $presence->presence == 'Izin' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="presence3">Izin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('presence') is-invalid @enderror" type="radio" name="presence" id="presence3" value="Alfa" {{ $presence->presence == 'Alfa' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="presence3">Alfa</label>
                                </div>

                                <!-- error message untuk presence -->
                                @error('presence')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Note</label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ $presence->note }}">

                                <!-- error message untuk note -->
                                @error('note')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                            <a href="{{ route('presences.index') }}" class="btn btn-md btn-info"><i class="fa fa-arrow-left"></i> BACK</a>
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>


    <!-- Start Footer Code -->
    <?php
    // include("style/footer.php")
    ?>
    <!-- End Footer Code -->
    <?php include('style/script.php'); ?>

</body>


</html>
@stop