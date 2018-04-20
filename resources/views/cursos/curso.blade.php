@extends('layouts.app')

@section('content')
    <style>
        table, th, td {
            border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;
        }
        img {
            height: 100px;
            width: 100px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @guest
                    <div class="panel-heading" align="center">Para ver los cursos tienes que tener cuenta, porfavor:</div>

                    <div class="panel-body">

                            <div align="center" class="col-md-6">
                                <form action="{{ url('login') }}" method="get">
                                    <input type="submit" class="btn btn-primary" value="Inicia sesion" name="Submit" />
                                </form>
                            </div>
                        <div align="center" class="col-md-6">
                                <form action="{{ url('register') }}" method="get">
                                    <input type="submit" class="btn btn-primary" value="Registrate" name="Submit" />
                                </form>
                        </div>
                        @else
                    <div class="panel-heading" align="center">Aqui estan todos los cursos disponibles</div>

                    <div class="panel-body">
                        <table style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;">
                            <thead>
                            <tr style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;">
                                <th style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;"> Curso</th>
                                <th style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;"> Contenido</th>
                                <th style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;"> video</th>
                                <th style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cursos as $curso){ ?>
                            <tr>
                                <td style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;"><?php echo $curso->Titulo ?></td>
                                <td style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;"><?php echo $curso->Presentacion ?></td>
                                <td style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;"><a href="<?php echo $curso->contenido ?>">Video Tutorial</a></td>
                                <td style="border: 1px solid black;
            margin: 7px;
            padding: 5px;
            text-align: center;">
                                    <form action="{{ url('/cursos/tomar') }}" method="post">
                                        <input class="btn btn-success" type="submit" name="btn_tomar"  value="Tomar curso">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="idUser" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="idCurso" value="<?php echo $curso->id ?>">
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
