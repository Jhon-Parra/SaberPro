<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $competency->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $competency->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if ($competency->id)
            <div class="form-group">
                <label for="faculty_id">Faculty</label>
                <select name="faculty_id" id="faculty_id" class="form-control">
                        <option value="">-- Selecciona una facultad--</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}" {{ $competency->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ route('competencies.index') }}" class="btn btn-secondary">Cancel</a>






    </div>
</div>
