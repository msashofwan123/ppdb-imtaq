@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Schedule</title>
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
                        <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Group Id</label>
                                <!-- <input type="number" class="form-control @error('group_id') is-invalid @enderror" name="group_id" value="{{ old('group_id') }}" placeholder="#"> -->
                                <select type="text" class="form-control  @error('group_id') is-invalid @enderror" name="group_id" id="group_id">
                                    <option>Pilih Group</option>
                                    @foreach ($group as $item)
                                    <option value="{{ $item->id }}">{{ $item->id }}. {{ $item->name }} - {{ $item->user->name }}</option>
                                    @endforeach
                                </select>

                                <!-- error message untuk group_id -->
                                @error('group_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                                <label class="font-weight-bold">User Id</label> -->
                            <!-- <input type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" placeholder="#"> -->

                            <!-- <select type="text" class="form-control  @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                    <option>Pilih User</option>
                                    @foreach ($user as $user)
                                    <option value="{{ $user->id }}">{{ $user->id }}. {{ $user->name }}</option>
                                    @endforeach
                                </select> -->

                            <!-- error message untuk user_id -->
                            <!-- @error('user_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> -->
                            <div class="form-group">
                                <label class="font-weight-bold">Note</label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}">
                                <small>Note can be empty</small>
                                <!-- error message untuk note -->
                                @error('note')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br />
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="font-weight-bold">Time Start</label>
                                    <input type="text" class="form-control @error('time_start_at') is-invalid @enderror" name="time_start_at" value="{{ old('time_start_at') }}" placeholder="">

                                    <!-- error message untuk time_start_at -->
                                    @error('time_start_at')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="font-weight-bold">Time End</label>
                                    <input type="text" class="form-control @error('time_end_at') is-invalid @enderror" name="time_end_at" value="{{ old('time_end_at') }}" placeholder="">

                                    <!-- error message untuk time_end_at -->
                                    @error('time_end_at')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-md btn-primary">SUMBIT</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
    <?php include('style/script.php'); ?>

</body>

</html>
@stop