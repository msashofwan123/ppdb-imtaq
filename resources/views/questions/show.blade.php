@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Question {{ $question->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/questions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/questions/' . $question->id . '/edit') }}" title="Edit Question"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('questions' . '/' . $question->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Question" onclick="return confirm('&quot;Confirm delete?&quot;')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $question->id }}</td>
                                    </tr>
                                    <tr><th> Quiz Id </th><td> {{ $question->quiz_id }} </td></tr><tr><th> Text </th><td> {{ $question->text }} </td></tr><tr><th> Answer 1 </th><td> {{ $question->answer_1 }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
