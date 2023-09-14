@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ __('Create') }} Model Has Role
@endsection


@section('content_header')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Model Has Role</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('model-has-roles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('model-has-role.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
