@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ $module->name ?? "{{ __('Show') Module" }}
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Module</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('modules.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $module->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $module->description }}
                        </div>
                        <div class="form-group">
                            <strong>Competency:</strong>
                            {{ $module->competency }}
                        </div>
                        <div class="form-group">
                            <strong>Author:</strong>
                            {{ $module->author }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
