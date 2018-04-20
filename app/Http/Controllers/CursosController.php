<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos;

class CursosController extends Controller
{
    public function introduccion(){
        $cursos = Cursos::all();
        return view("cursos/curso")->with('cursos', $cursos);
    }
}
