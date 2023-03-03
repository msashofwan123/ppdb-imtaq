<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($quiz->name) ? $quiz->name : ''}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <input class="form-control" name="group_id" type="number" id="group_id" value="{{ isset($quiz->group_id) ? $quiz->group_id : ''}}">
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div> -->
<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <select class="form-control" name="group_id" type="number" id="group_id">
        <option>PILIH GROUP</option>
        @foreach ($groupOption as $item)
        <option value="{{ $item->id }}" {{ ($quiz->group_id == $item->id) ? 'Selected' : '' }}>{{ $item->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>
<br />
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>