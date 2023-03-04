@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">UserAnswer {{ $useranswer->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/user-answer') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/user-answer/' . $useranswer->id . '/edit') }}" title="Edit UserAnswer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('useranswer' . '/' . $useranswer->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete UserAnswer" onclick="return confirm('&quot;Confirm delete?&quot;')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $useranswer->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $useranswer->user_id }} </td></tr><tr><th> Question Id </th><td> {{ $useranswer->question_id }} </td></tr><tr><th> Answer </th><td> {{ $useranswer->answer }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
