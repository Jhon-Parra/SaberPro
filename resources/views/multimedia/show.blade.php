@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ $multimedia->name ?? __('Show Multimedia') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show Multimedia') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('multimedia.index') }}">{{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $multimedia->name }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $multimedia->type }}
                        </div>
                        <div class="form-group">
                            <strong>File:</strong>
                            @if ($multimedia->type === 'image')
                                <img src="{{ asset($multimedia->url) }}" alt="{{ $multimedia->name }}" width="200">
                            @elseif ($multimedia->type === 'video')
                                <video src="{{ asset($multimedia->url) }}" controls width="400"></video>
                            @elseif ($multimedia->type === 'file')
                                <a href="{{ asset($multimedia->url) }}" target="_blank">{{ $multimedia->file }}</a>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>URL:</strong>
                            {{ $multimedia->url }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
