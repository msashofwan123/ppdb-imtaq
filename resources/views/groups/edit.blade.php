@extends('layouts.admin')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Class Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="../style/idbc-favicon.ico">
</head>

<body style="background: lightgray">

    <!-- Awal Data Form -->
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('groups.update', $group->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="font-weight-bold">ID - Nama Dosen</label>
                                <select type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                    <option>Pilih Dosen</option>
                                    @foreach($groups as $item)
                                        <option value="{{ $item->id }}" {{ ($item->id === $group->user->id)?'selected':'' }}>{{ $item->id }}. {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <!-- error message untuk user_id -->
                                @error('user_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Kelas</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $group->name }}">

                                <!-- error message untuk name -->
                                @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Footer Code -->
    <?php
    // include("style/footer.php")
    ?>
    <!-- End Footer Code -->
    <?php include('style/script.php'); ?>
    <script>
        // CKEDITOR.replace('content');
    </script>

</body>


</html>

@stop