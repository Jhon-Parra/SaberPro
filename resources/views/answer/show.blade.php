@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ $answer->name ?? __('Show Answer') }}
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Answer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('answers.index') }}">{{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Data:</strong>
                            {{ $answer->data }}
                        </div>
                        <div class="form-group">
                            <strong>Percentage:</strong>
                            {{ $answer->percentage }}
                        </div>
                        <div class="form-group">
                            <strong>Result:</strong>
                            {{ $answer->result }}
                        </div>
                        <div class="form-group">
                            <strong>Question Id:</strong>
                            {{ $answer->question_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $answer->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Image URL:</strong>
                            {{ $answer->imageUrl }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
