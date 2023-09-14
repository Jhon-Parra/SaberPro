<div class="box box-info padding-1">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error:</strong> Please check the form below for errors.
    </div>
    @endif

    <form action="{{ isset($multimedia) ? route('multimedia.update', $multimedia->id) : route('multimedia.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($multimedia))
            @method('PUT')
        @endif

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', isset($multimedia) ? $multimedia->name : '', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="type">Type:</label>
            <select name="type" id="type" class="form-control" required>
                <option value="image" {{ (old('type', isset($multimedia) ? $multimedia->type : '') == 'image') ? 'selected' : '' }}>Image</option>
                <option value="video" {{ (old('type', isset($multimedia) ? $multimedia->type : '') == 'video') ? 'selected' : '' }}>Video</option>
                <option value="audio" {{ (old('type', isset($multimedia) ? $multimedia->type : '') == 'audio') ? 'selected' : '' }}>Audio</option>
                <option value="file" {{ (old('type', isset($multimedia) ? $multimedia->type : '') == 'text') ? 'selected' : '' }}>Texto</option>
            </select>
        </div>

        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" name="file" id="file" class="form-control" {{ isset($multimedia->id) ? '' : 'required' }}>
        </div>

        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            <a href="{{ route('multimedia.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
