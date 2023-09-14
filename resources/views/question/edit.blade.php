@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ __('Update') }} Question
@endsection

@section('content_header')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Question</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('questions.update', $question->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('question.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
