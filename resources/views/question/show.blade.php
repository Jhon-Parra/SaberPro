@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ $question->name ?? __("Show Question") }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __("Show Question") }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('questions.index') }}">{{ __("Back") }}</a>
                        </div>
                    </div>

                    <h1>{{ $question->statement }}</h1>

                    <h2>Respuestas:</h2>
                    <ul>
                        @foreach ($question->answers as $answer)
                            <li>{{ $answer->result }}</li>
                        @endforeach
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
