@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    Respuestas de la pregunta: {{ $question->statement }}
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <span class="card-title">{{ __('Respuestas de') }} {{ $question->statement }}</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('questions.show', $question->id) }}">{{ __('Volver a la pregunta') }}</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <h1>{{ $question->statement }}</h1>

                            <h2>Related Answers</h2>



                            <ul>
                                @foreach ($relatedAnswers as $answer)
                                    <li>{{ $answer->data }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#load-answers-button').click(function() {
            var questionId = {{ $question->id }};
            $.ajax({
                url: '/questions/' + questionId + '/related-answers',
                type: 'GET',
                success: function(data) {
                    $('#related-answers-list').empty();
                    data.forEach(function(answer) {
                        $('#related-answers-list').append('<li>' + answer.data + '</li>');
                    });
                }
            });
        });
    });
</script>
