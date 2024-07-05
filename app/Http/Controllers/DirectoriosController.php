<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class DirectoriosController extends Controller
{
    public function mostrar(){
        $directorios = Directorio::all();
        return view('directorio',compact('directorios'));
    }

    public function vistaAgregar(){
        return view('crearEntrada');
    }

    public function vistaBuscar(){
        return view('buscar');
    }

    public function verContactos($id){
        $contactos = Contacto::where('codigoEntrada',$id)->get();
        $directorio = Directorio::find($id);

        echo $contactos;

        return view('vercontactos',compact('contactos','directorio'));
    }

    public function vistaEliminar($id){
        $directorio = Directorio::find($id);

        return view('eliminar', compact('directorio'));
    }

    public function destroy($id){
        Contacto::where('codigoEntrada',$id)->delete();

        $directorio = Directorio::find($id);
        $directorio->delete();

        return redirect('/directorios/mostrar');
    }

    public function guardar(Request $request){
        $nvoDirectorio = new Directorio();
        $nvoDirectorio->codigoEntrada = $request->codigo;
        $nvoDirectorio->nombre = $request->nombre;
        $nvoDirectorio->apellido = $request->apellido;
        $nvoDirectorio->telefono = $request->telefono;
        $nvoDirectorio->correo = $request->correo;
        $nvoDirectorio->save();

        return redirect('/directorios/mostrar');
    }

    public function buscar($correo){
        echo $correo;
    }
}
