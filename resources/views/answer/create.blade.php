
@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ __('Create') }} Answer
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Answer</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('answers.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('answer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
