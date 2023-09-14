@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ __('Update') }} Multimedia
@endsection

@section('content_header')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Update') }} Multimedia</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('multimedia.update', $multimedia->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('multimedia.form')

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-body">
                    @if ($multimedia->type === 'image')
                        <img src="{{ asset($multimedia->url) }}" alt="{{ $multimedia->name }}" width="100">
                    @elseif ($multimedia->type === 'video')
                        <video src="{{ asset($multimedia->url) }}" controls width="300"></video>
                    @elseif ($multimedia->type === 'file')
                        <a href="{{ asset($multimedia->url) }}" target="_blank">{{ $multimedia->name }}</a>
                    @else
                        Unknown
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


@stop
