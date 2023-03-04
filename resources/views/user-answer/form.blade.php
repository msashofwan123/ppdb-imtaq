<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($useranswer->user_id) ? $useranswer->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('question_id') ? 'has-error' : ''}}">
    <label for="question_id" class="control-label">{{ 'Question Id' }}</label>
    <input class="form-control" name="question_id" type="number" id="question_id" value="{{ isset($useranswer->question_id) ? $useranswer->question_id : ''}}" >
    {!! $errors->first('question_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="control-label">{{ 'Answer' }}</label>
    <input class="form-control" name="answer" type="text" id="answer" value="{{ isset($useranswer->answer) ? $useranswer->answer : ''}}" >
    {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
