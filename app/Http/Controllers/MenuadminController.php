<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuadminController extends Controller
{
    public function index()
    {
        $images = [
            [
                'url' => asset('imgCompetency/1.png'),
                'alt' => 'Imagen 1',
                'width' => '200',
                'height' => '200',
                'buttonUrl' => 'ruta-de-ingreso1',
                'buttonText' => 'Ingresar 1',
            ],
            [
                'url' => 'ruta-de-la-imagen2.jpg',
                'alt' => 'Imagen 2',
                'width' => '200',
                'height' => '200',
                'buttonUrl' => 'ruta-de-ingreso2',
                'buttonText' => 'Ingresar 2',
            ],
            // Agrega más imágenes y botones aquí...
        ];

        return view('menuadmin.index', compact('images'));
    }
}

