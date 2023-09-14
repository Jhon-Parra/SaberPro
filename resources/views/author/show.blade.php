
@extends('adminlte::page')
@include('layout.layout')


@section('template_title')
    {{ $author->name ?? "{{ __('Show') Author" }}
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Author</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('authors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $author->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $author->email }}
                        </div>
                        <div class="form-group">
                            <strong>Institution:</strong>
                            {{ $author->institution }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
