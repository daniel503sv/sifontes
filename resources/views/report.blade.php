<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Report</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style type="text/css" media="all">
            table {
                border-collapse: collapse;
                border-spacing: 0;
            }
            th {
                border: 1px solid;
                width: 120px;
                padding-bottom: 30px;
            }
            .header{
                text-align: justify;
            }
            .answer{
                text-decoration-line: underline;
                padding: 20px;
            }
            td{
                border: 1px solid;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td colspan="8" class="header">
                    <div>
                        <label>NOMBRE DE LA INSTITUCION EDUCATIVA </label>
                        <label class="answer">{{ setting('site.school_name') }}</label>
                    </div>
                    <div>
                        <label>NOMBRE CAVERT </label>
                        <label class="answer">{{ setting('site.ca-ert') }}</label>
                        <label>CÓDIGO INFRAESTRUCTURA </label>
                        <label class="answer">{{ setting('site.school_code') }}</label>
                    </div>
                    <div>
                        <label>MUNICIPIO </label>
                        <label class="answer">{{ setting('site.municipio') }}</label>
                        <label>DEPARTAMENTO </label>
                        <label class="answer">{{ setting('site.departament') }}</label>
                        <label>DISTRITO EDUCATIVO N° </label>
                        <label class="answer">{{ setting('site.distrito') }}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>NOMBRE DEL USUARIO</th>
                <th>FECHA DE RESERVACIÓN</th>
                <th>HORA INICIO</th>
                <th>HORA FIN</th>
                <th>RECURSOS A UTILIZAR</th>
                <th>CÓDIGO (INVENTARIO)</th>
                <th>GRADO</th>
                <th>SECCIÓN</th>
            </tr>
            
            @foreach($data as $info)
                <tr>
                    <td>{{$info['user_id']}}</td>
                    <td>{{$info['date']}}</td>
                    <td>{{$info['start_time']}}</td>
                    <td>{{$info['end_time']}}</td>
                    <td>{{$info['resource']}}</td>
                    <td>{{$info['resource_id']}}</td>
                    <td>{{$info['grade']}}</td>
                    <td>{{$info['section']}}</td>
                </tr>
            @endforeach
        <table>
    </body>
</html>
