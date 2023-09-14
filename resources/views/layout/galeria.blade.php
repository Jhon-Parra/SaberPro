@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Galería</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Audios</h2>
                    </div>
                </div>
                <br>
                <div class="row">
                    @foreach ($multimedia as $media)
                        @if ($media->type === 'audio')
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div style="position: relative;">
                                        <audio controls style="width: 100%;">
                                            <source src="{{ $media->url }}" type="audio/mpeg">
                                            Tu navegador no soporta el elemento de audio.
                                        </audio>
                                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: #f1f1f1; height: 2px;"></div>
                                    </div>
                                    <p>Name: {{ $media->name }}</p>
                                </div>
                            </div>
                        </div>

                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mt-4 col-md-12">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Image</h2>
                    </div>
                </div>
                <br>
                <div class="row">
                    @foreach ($multimedia as $media)
                        @if ($media->type === 'image')
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ $media->url }}" alt="Imagen" class="img-fluid" title="{{ $media->name }}">
                                        <p>Name:{{ $media->name }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-4">
            {{ $multimedia->links() }}
        </div>
    </div>
@stop
