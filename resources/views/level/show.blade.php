
@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ $level->name ?? "{{ __('Show') Level" }}
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Level</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('levels.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Number:</strong>
                            {{ $level->number }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $level->name }}
                        </div>
                        <div class="form-group">
                            <strong>Badge:</strong>
                            {{ $level->badge }}
                        </div>
                        <div class="form-group">
                            <strong>Minpoints:</strong>
                            {{ $level->minpoints }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
