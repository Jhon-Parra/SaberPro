<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('question_id', 'Question') }}
            {{ Form::select('question_id', $questions, $multimediaquestion->question_id, ['class' => 'form-control' . ($errors->has('question_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Question']) }}
            {!! $errors->first('question_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group">
            {{ Form::label('multimedia_id', 'Multimedia') }}
            {{ Form::select('multimedia_id', $multimedia, $multimediaquestion->multimedia_id, ['class' => 'form-control' . ($errors->has('multimedia_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Multimedia', 'onchange' => 'showSelectedImage(this)']) }}
            {!! $errors->first('multimedia_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div id="selectedMediaContainer" style="display: none;">
            @if ($multimediaquestion->multimedia_id)
                <div id="selectedImageContainer" style="display: none;">
                    <img id="selectedImage" src="{{ $multimediaquestion->multimedia->url }}" alt="Selected Image" width="100">
                </div>
                <div id="selectedAudioContainer" style="display: none;">
                    <audio id="selectedAudio" src="{{ $multimediaquestion->multimedia->url }}" controls></audio>
                </div>
                <div id="selectedMediaName">{{ $multimediaquestion->multimedia->name }}</div>
            @else
                <div id="selectedMediaName">N/A</div>
            @endif
        </div>

        <script>
            function showSelectedImage(selectElement) {
                var selectedOption = selectElement.options[selectElement.selectedIndex];
                var selectedImageContainer = document.getElementById('selectedImageContainer');
                var selectedAudioContainer = document.getElementById('selectedAudioContainer');
                var selectedImage = document.getElementById('selectedImage');
                var selectedAudio = document.getElementById('selectedAudio');
                var selectedMediaName = document.getElementById('selectedMediaName');
                var selectedMediaContainer = document.getElementById('selectedMediaContainer');

                if (selectedOption.dataset.type === 'image') {
                    selectedImage.src = selectedOption.dataset.url;
                    selectedImageContainer.style.display = 'block';
                    selectedAudioContainer.style.display = 'none';
                } else if (selectedOption.dataset.type === 'audio') {
                    selectedAudio.src = selectedOption.dataset.url;
                    selectedAudioContainer.style.display = 'block';
                    selectedImageContainer.style.display = 'none';
                }

                selectedMediaName.textContent = selectedOption.textContent;
                selectedMediaContainer.style.display = 'block';
            }
        </script>








    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ route('multimediaquestions.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
