@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ $competency->name ?? "{{ __('Show') Competency" }}
@endsection


@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Competency</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('competencies.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $competency->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $competency->description }}
                        </div>
                        <div class="form-group">
                            <strong>Backgroundimageurl:</strong>
                            {{ $competency->backgroundImageUrl }}
                        </div>
                        <div class="form-group">
                            <strong>Imageurl:</strong>
                            {{ $competency->imageUrl }}
                        </div>
                        <div class="form-group">
                            <strong>Faculty:</strong>
                            {{ $competency->faculty }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
