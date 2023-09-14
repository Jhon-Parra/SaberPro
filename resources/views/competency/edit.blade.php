@extends('adminlte::page')
@include('layout.layout')

@section('template_title')
    {{ __('Update') }} Competency
@endsection


@section('content_header')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Competency</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('competencies.update', $competency->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('competency.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (session('success'))
    <script>
        window.onload = function() {
            var confirmFaculty = window.confirm("{{ session('success') }}");

            if (confirmFaculty) {
                window.location.href = "{{ route('competencies.edit', $competency->id) }}";
            } else {
                window.location.href = "{{ route('competencies.index') }}";
            }
        };
    </script>


@endif
@stop
