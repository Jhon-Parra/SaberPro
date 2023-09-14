<!DOCTYPE html>
<html>
<head>
    @auth
    <title>{{ Auth::user()->name }}</title>
    <style>
        .cabecera {
            background-color: black;
            color: white;
        }
        h1 {
            color: black;
            text-align: center;
        }
        .td-small {
            font-size: 14px;
            padding: 5px;
            border: 1px solid #2d2c2c;
        }
        .td-small1 {
            font-size: 20px;
            padding: 5px;
            border: 1px solid #2d2c2c;
        }
        table {
            font-size: 14px;
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        img {
            display: block;
            margin: 0 auto;
        }
    </style>
    @endauth
</head>
<body>
    <img src="image/logo_color.png" alt="" width="60px" height="60px">
    <h1>Answers</h1><br>

    <div class="wrapper">
        <table class="table-center">
            <thead class="cabecera">
                <tr>
                    <th class="td-small1">Contenido</th>
                    <th class="td-small">Porcentaje</th>
                    <th class="td-small1">Resultado</th>
                    <th class="td-small1">Pregunta</th>

                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($answers as $answer)
                    <tr>
                        <td class="td-small">{{ $answer->data ?? 'N/A' }}</td>
                        <td class="td-small">{{ $answer->percentage ?? 'N/A' }}</td>
                        <td class="td-small">{{ $answer->result === '1' ? 'Respuesta correcta' : 'Respuesta incorrecta' }}</td>
                        <td class="td-small">{{ $answer->question ? $answer->question->statement ?? 'N/A' : 'N/A' }}</td>
                        <td class="td-small">

                        </td>
                        <td></td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</body>
<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
</script>
</html>
