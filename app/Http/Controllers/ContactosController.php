<?php

namespace App\Http\Controllers;
use App\Models\Contacto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    //
    public function agregar($codigo){
        return view('agregarcontacto',['codigo'=>$codigo]);
    }

    public function guardar(Request $request){
        $nvoContacto = new Contacto();
        $nvoContacto->codigoEntrada = $request->codigo;
        $nvoContacto->nombre = $request->nombre;
        $nvoContacto->apellido = $request->apellido;
        $nvoContacto->telefono = $request->telefono;
        $nvoContacto->save();

        return redirect('/directorios/ver/'.$request->codigo);
    }

    public function destroy($id){
        $contactoEliminar = Contacto::find($id);
        $contactoEliminar->delete();

        return redirect('/directorios/mostrar');
    }
}
