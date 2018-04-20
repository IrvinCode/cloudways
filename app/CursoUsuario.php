<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoUsuario extends Model
{
    protected $table = 'cursoUsuario';

    protected $fillable = [
        'idCurso', 'idUsuario',
    ];
}
