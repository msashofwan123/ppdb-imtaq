<!-- <div class="form-group {{ $errors->has('question_id') ? 'has-error' : ''}}">
    <label for="question_id" class="control-label">{{ 'Question Id' }}</label>
    <input class="form-control" name="question_id" type="number" id="question_id" value="{{ isset($useranswer->question_id) ? $useranswer->question_id : ''}}" >
    {!! $errors->first('question_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="control-label">{{ 'Answer' }}</label>
    <input class="form-control" name="answer" type="text" id="answer" value="{{ isset($useranswer->answer) ? $useranswer->answer : ''}}" >
    {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
</div> -->



@forelse ($question as $item)
<input type="hidden" name="items[{{ $item->id }}][user_id]" id="user_id" value="{{ $user_id }}">
<input type="hidden" name="items[{{ $item->id }}][question_id]" id="question_id" value="{{ $item->id }}">

<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    <label for="text" class="control-label">{{ 'Text - Soal' }}</label>
    <input class="form-control" name="items[{{ $item->id }}][text]" type="text" id="text" value="{{ isset($item->text) ? $item->text : ''}}" readonly>
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="control-label">{{ 'Answer' }}</label><br />

    <div class="form-check form-check-inline {{ $errors->has('answer') ? 'has-error' : ''}}">
        <input class="form-check-input" type="radio" name="items[{{ $item->id }}][answer]" id="answer1{{ $item->id }}" value="1">
        <label class="form-check-label" for="answer1{{ $item->id }}">{{ $item->answer_1 }}</label>
    </div>
    <div class="form-check form-check-inline {{ $errors->has('answer') ? 'has-error' : ''}}">
        <input class="form-check-input" type="radio" name="items[{{ $item->id }}][answer]" id="answer2{{ $item->id }}" value="2">
        <label class="form-check-label" for="answer2{{ $item->id }}">{{ $item->answer_2 }}</label>
    </div>
    <div class="form-check form-check-inline {{ $errors->has('answer') ? 'has-error' : ''}}">
        <input class="form-check-input" type="radio" name="items[{{ $item->id }}][answer]" id="answer3{{ $item->id }}" value="3">
        <label class="form-check-label" for="answer3{{ $item->id }}">{{ $item->answer_3 }}</label>
    </div>
    <div class="form-check form-check-inline {{ $errors->has('answer') ? 'has-error' : ''}}">
        <input class="form-check-input" type="radio" name="items[{{ $item->id }}][answer]" id="answer4{{ $item->id }}" value="4">
        <label class="form-check-label" for="answer4{{ $item->id }}">{{ $item->answer_4 }}</label>
    </div>
    {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
</div>
<hr /><br />

@empty
<div>Data Kosong</div>
@endforelse

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Submit' }}">
</div>