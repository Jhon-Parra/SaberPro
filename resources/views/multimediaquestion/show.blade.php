@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ $multimediaquestion->name ?? "{{ __('Show') Multimediaquestion" }}
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Multimediaquestion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('multimediaquestions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Question Id:</strong>
                            {{ $multimediaquestion->question_id }}
                        </div>
                        <div class="form-group">
                            <strong>Multimedia Id:</strong>
                            {{ $multimediaquestion->multimedia_id}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
