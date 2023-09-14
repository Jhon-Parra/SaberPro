
@extends('adminlte::page')
@include('layout.layout')
@section('template_title')
    {{ __('Update') }} Level
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Level</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('levels.update', $level->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('level.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop