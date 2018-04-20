<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CursoUsuario;
use App\Cursos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numeroCursos = CursoUsuario::all();
        $cursos = Cursos::all();
        return view('home')->with('cursos', $cursos, 'numeroCursos', $numeroCursos);
    }

    public function tomarCurso(Request $request){
        $idUser = $request->input('idUser');
        $idCurso = $request->input('idCurso');

        $data = array('idCurso'=>$idCurso,"idUsuario"=>$idUser);

        DB::table('cursoUsuario')->insert($data);
        return redirect('/home');
    }

    public function perfil(){
        return view('perfil');
    }

    public function nuevoCurso(){
        return view("cursos/nuevo");
    }

    public function crearCurso(Request $request){
        $titulo = $request->input('titulo');
        $intro = $request->input('introduccion');
        $link = $request->input('link');

        $data = array('Titulo'=>$titulo,"Presentacion"=>$intro,"contenido"=>$link);

        DB::table('cursos')->insert($data);
        return redirect('/');
    }
}
