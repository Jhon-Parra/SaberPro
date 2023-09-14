@extends('adminlte::page')
@include('layout.layout')


@section('template_title')
    {{ __('Create') }} Multimedia
@endsection


@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Multimedia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('multimedia.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('multimedia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
