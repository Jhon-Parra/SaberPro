@extends('adminlte::page')
@include('layout.layout')

@php
    $images = [
        [
            'url' => asset('image/escritor.png'),
            'alt' => 'Imagen 1',
            'buttonUrl' => 'authors',
            'buttonText' => 'Register author',
        ],
        [
            'url' => asset('image/facultad.png'),
            'alt' => 'Imagen 3',
            'buttonUrl' => 'faculties',
            'buttonText' => 'Register faculty',
        ],
        [
            'url' => asset('image/cubo.png'),
            'alt' => 'Imagen 2',
            'buttonUrl' => 'modules',
            'buttonText' => 'Register modules',
        ],
        [
            'url' => asset('image/pngwing.com.png'),
            'alt' => 'Imagen 4',
            'buttonUrl' => 'competencies',
            'buttonText' => 'Register competence',
        ],
        [
            'url' => asset('image/pregun.png'),
            'alt' => 'Imagen 5',
            'buttonUrl' => 'questions',
            'buttonText' => 'Register questions',
        ],
        [
            'url' => asset('image/respu.png'),
            'alt' => 'Imagen 6',
            'buttonUrl' => 'answers',
            'buttonText' => 'Register answers',
        ],

    ];

    $colors = ['#FADADD', '#B2F5EA', '#FFD7B5', '#E6E6FA', '#D0F0C0', '#FFDAB9', '#C9C9FF', '#F0E68C'];
@endphp


<style>
    .image-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .image-item {
        flex-basis: calc(33.333% - 20px); /* Tres columnas en pantallas grandes */
        text-align: center;
        border: 1px solid #ccc;
        padding: 10px;
        transition: transform 0.3s ease;
        height: 300px;
        margin-bottom: 20px;
    }

    .image-item img {
        max-width: 100%;
        max-height: 70%;
        object-fit: contain;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .image-item .image-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .button-container {
        margin-top: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    /* Estilo adicional para colores de fondo aleatorios */
    @foreach ($images as $index => $image)
        .color-{{ $index }} {
            background-color: {{ $colors[rand(0, count($colors) - 1)] }};
        }
    @endforeach

    /* Media query para pantallas más pequeñas */
    @media (max-width: 768px) {
        .image-item {
            flex-basis: calc(50% - 20px); /* Dos columnas en pantallas más pequeñas */
        }
    }
</style>
@section('content_header')
    <section class="content container-fluid">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    <h1>AdminApp</h1>
                </span>
            </div>
        </div>
        <br>

    </section>



    <div class="container">
        <div class="image-grid">
            @foreach ($images as $index => $image)
                <div class="image-item color-{{ $index }}">
                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                    <div class="button-container">
                        <button type="button" onclick="location.href='{{ $image['buttonUrl'] }}';">{{ $image['buttonText'] }}</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
