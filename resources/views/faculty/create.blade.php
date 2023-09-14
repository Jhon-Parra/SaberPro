
@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ __('Create') }} Faculty
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Faculty</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('faculties.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('faculty.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
