<div class="form-group {{ $errors->has('quiz_id') ? 'has-error' : ''}}">
    <label for="quiz_id" class="control-label">{{ 'Quiz Id' }}</label>
    <input class="form-control" name="quiz_id" type="number" id="quiz_id" value="{{ $id }}" readonly>
    <small>This field is filled in automatically by the system</small>
    {!! $errors->first('quiz_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text') ? 'has-error' : ''}}">
    <label for="text" class="control-label">{{ 'Text' }}</label>
    <input class="form-control" name="text" type="text" id="text" value="{{ isset($question->text) ? $question->text : ''}}">
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer_1') ? 'has-error' : ''}}">
    <label for="answer_1" class="control-label">{{ 'Answer 1' }}</label>
    <input class="form-control" name="answer_1" type="text" id="answer_1" value="{{ isset($question->answer_1) ? $question->answer_1 : ''}}">
    {!! $errors->first('answer_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer_2') ? 'has-error' : ''}}">
    <label for="answer_2" class="control-label">{{ 'Answer 2' }}</label>
    <input class="form-control" name="answer_2" type="text" id="answer_2" value="{{ isset($question->answer_2) ? $question->answer_2 : ''}}">
    {!! $errors->first('answer_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer_3') ? 'has-error' : ''}}">
    <label for="answer_3" class="control-label">{{ 'Answer 3' }}</label>
    <input class="form-control" name="answer_3" type="text" id="answer_3" value="{{ isset($question->answer_3) ? $question->answer_3 : ''}}">
    {!! $errors->first('answer_3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer_4') ? 'has-error' : ''}}">
    <label for="answer_4" class="control-label">{{ 'Answer 4' }}</label>
    <input class="form-control" name="answer_4" type="text" id="answer_4" value="{{ isset($question->answer_4) ? $question->answer_4 : ''}}">
    {!! $errors->first('answer_4', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('correct_answer') ? 'has-error' : ''}}">
    <label for="correct_answer" class="control-label">{{ 'Correct Answer' }}</label>
    <select class="form-control" name="correct_answer" type="number" id="correct_answer">
        <option>Pilih Jawaban</option>
        <option value="1" {{ ($question->correct_answer == 1) ? 'selected' : '' }}>Answer 1</option>
        <option value="2" {{ ($question->correct_answer == 2) ? 'selected' : '' }}>Answer 2</option>
        <option value="3" {{ ($question->correct_answer == 3) ? 'selected' : '' }}>Answer 3</option>
        <option value="4" {{ ($question->correct_answer == 4) ? 'selected' : '' }}>Answer 4</option>
    </select>

    {!! $errors->first('correct_answer', '<p class="help-block">:message</p>') !!}
</div><br />


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>