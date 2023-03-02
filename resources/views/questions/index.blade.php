@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Questions</div>
                <div class="card-body">

                    <form method="GET" action="{{ url('/questions') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Quiz Id</th>
                                    <th>Text</th>
                                    <th>Answers</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->quiz_id }}</td>
                                    <td>{{ $item->text }}</td>
                                    <td>
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="answer{{ $item->id }}" id="answer{{ $item->id }}" {{ ($item->correct_answer == 1) ? 'checked' : '' }} disabled>
                                                    </div>
                                                </td>
                                                <th>Answer 1</th>
                                                <td>{{ $item->answer_1 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="answer{{ $item->id }}" id="answer{{ $item->id }}" {{ ($item->correct_answer == 2) ? 'checked' : '' }} disabled>
                                                    </div>
                                                </td>
                                                <th>Answer 2</th>
                                                <td>{{ $item->answer_2 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="answer{{ $item->id }}" id="answer{{ $item->id }}" {{ ($item->correct_answer == 3) ? 'checked' : '' }} disabled>
                                                    </div>
                                                </td>
                                                <th>Answer 3</th>
                                                <td>{{ $item->answer_3 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="answer{{ $item->id }}" id="answer{{ $item->id }}" {{ ($item->correct_answer == 4) ? 'checked' : '' }} disabled>
                                                    </div>
                                                </td>
                                                <th>Answer 4</th>
                                                <td>{{ $item->answer_4 }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <a href="{{ url('/questions/' . $item->id) }}" title="View Question"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/questions/' . $item->id . '/edit') }}" title="Edit Question"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/questions' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Question" onclick="return confirm('&quot;Confirm delete?&quot;')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $questions->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection