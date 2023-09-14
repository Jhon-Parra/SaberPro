<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.layout')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido de nuevo</title>
</head>
<body class="back_c">
    @include('menu.menustudent')
    
    <div class="container-fluid" style="margin-top:120px;">
        <h3>¡Hola, {{Auth::user()->name }}!</h3>

        <div class="banner d-flex justify-content-center">
            Prepárate para las pruebas Saber Pro! 
            Domina tus conocimientos con nuestra aplicación de práctica. 
            ¡Asegura tu éxito académico!
        </div>
        <!--Sección mis tareas-->
        <div style="margin-top: 30px;">
            <h3>Mis tareas</h3>

            
                <div class="mt-1 section_t ">
                    <img src="image/1.png" alt="" style="widows: 50px;">
                    ¡Comienza la aventura en el mundo del razonamiento!
                </div>
                <br>
                <div class="mt-1 section_t">
                    <img src="image/2.png" alt="" style="widows: 50px;">
                    Termina el nivel actual de la competencia actual
                </div>
                <br>    
                <div class="mt-1 section_t ">
                    <img src="image/3.png" alt="" style="widows: 50px;">
                    Completa el desafío diario y sigue con tu racha de puntuación
                </div>
            
        </div>
        <!--Fin seccion mis tareas-->
        <!--Sección mis activos-->
        <div style="margin-top: 30px;">
            <h3>Activos</h3>

            
                <div class="mt-1 section_t ">
                    <img src="image/1.png" alt="" style="widows: 50px;">
                    ¡Comienza la aventura en el mundo del razonamiento!
                </div>
                <br>
                <div class="mt-1 section_t">
                    <img src="image/2.png" alt="" style="widows: 50px;">
                    Termina el nivel actual de la competencia actual
                </div>
                <br>    
                <div class="mt-1 section_t ">
                    <img src="image/3.png" alt="" style="widows: 50px;">
                    Completa el desafío diario y sigue con tu racha de puntuación
                </div>
            
        </div>
        <!--Fin seccion mis activos-->
    
    </div>
    
</body>
</html>