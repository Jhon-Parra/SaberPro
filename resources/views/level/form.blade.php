<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('number') }}
            {{ Form::selectRange('number', 12, null, $level->number, ['class' => 'form-control' . ($errors->has('number') ? ' is-invalid' : ''), 'placeholder' => 'Select Number']) }}
            {!! $errors->first('number', '<div class="invalid-feedback">:message</div>') !!}
        </div>



        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $level->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('minpoints') }}
            {{ Form::text('minpoints', $level->minpoints, ['class' => 'form-control' . ($errors->has('minpoints') ? ' is-invalid' : ''), 'placeholder' => 'To calculate the minimum points necessary to level up.']) }}
            {!! $errors->first('minpoints', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ route('levels.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
