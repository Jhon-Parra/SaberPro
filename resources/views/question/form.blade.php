<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('statement') }}
            {{ Form::textarea('statement', isset($question) ? $question->statement : '', ['class' => 'form-control ckeditor' . ($errors->has('statement') ? ' is-invalid' : ''), 'placeholder' => 'Statement']) }}
            {!! $errors->first('statement', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('statementtwo') }}
            {{ Form::textarea('statementtwo', isset($question) ? $question->statementtwo : '', ['class' => 'form-control ckeditor' . ($errors->has('statementtwo') ? ' is-invalid' : ''), 'placeholder' => 'Statementtwo']) }}
            {!! $errors->first('statementtwo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('level_id', 'Level') }}
            {{ Form::select('level_id', $levelOptions, isset($question) ? $question->level_id : null, ['class' => 'form-control' . ($errors->has('level_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Level']) }}
            {!! $errors->first('level_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('module_id', 'Module') }}
            {{ Form::select('module_id', $moduleOptions, isset($question) ? $question->module_id : null, ['class' => 'form-control' . ($errors->has('module_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Module']) }}
            {!! $errors->first('module_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('competency_id', 'Competency') }}
            {{ Form::select('competency_id', $competencyOptions, isset($question) ? $question->competency_id : null, ['class' => 'form-control' . ($errors->has('competency_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Competency']) }}
            {!! $errors->first('competency_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('author_id', 'Author') }}
            {{ Form::select('author_id', $authorOptions, isset($question) ? $question->author_id : null, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'placeholder' => 'Select an Author']) }}
            {!! $errors->first('author_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('type', 'Type') }}
            {{ Form::select('type', ['Escrita' => 'Escrita', 'Selección Múltiple' => 'Selección Múltiple', 'Selección Múltiple con varias respuestas' => 'Selección Múltiple con varias respuestas'], isset($question) ? $question->type : null, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Select Type']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group">
            {{ Form::label('points') }}
            {{ Form::text('points', isset($question) ? $question->points : '', ['class' => 'form-control' . ($errors->has('points') ? ' is-invalid' : ''), 'placeholder' => 'Points']) }}
            {!! $errors->first('points', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="typefile">{{ __('File Type') }}</label>
            <select name="typefile" id="typefile" class="form-control @error('typefile') is-invalid @enderror">
                <option value="image">Image</option>
                <option value="audio">Audio</option>
            </select>
            @error('typefile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="file">{{ __('File') }}</label>
            <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror">
            @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ route('questions.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replaceAll('ckeditor');



</script>
