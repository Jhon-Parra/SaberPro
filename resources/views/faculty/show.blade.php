
@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ $faculty->name ?? "{{ __('Show') Faculty" }}
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Faculty</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('faculties.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $faculty->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
