@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Quiz {{ $quiz->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/quizzes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/quizzes/' . $quiz->id . '/edit') }}" title="Edit Quiz"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</button></a>
                    <a href="{{ route('questions.create', ['quiz_id' => $quiz->id]) }}" title="Add Questions"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add Questions</button></a>
                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID Quiz</th>
                                    <td>{{ $quiz->id }}</td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $quiz->name }} </td>
                                </tr>
                                <tr>
                                    <th> Group Id </th>
                                    <td> {{ $quiz->group_id }} - {{ $quiz->name }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Text</th>
                                    <th>Answer 1</th>
                                    <th>Answer 2</th>
                                    <th>Answer 3</th>
                                    <th>Answer 4</th>
                                    <th>Correct</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->text }}</td>
                                    <td>{{ $item->answer_1 }}</td>
                                    <td>{{ $item->answer_2 }}</td>
                                    <td>{{ $item->answer_3 }}</td>
                                    <td>{{ $item->answer_4 }}</td>
                                    <td>{{ $item->correct_answer }}</td>
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
        </div>
    </div>
</div>
@endsection