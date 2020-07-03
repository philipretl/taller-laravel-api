<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


use App\Models\InstitucionModel  as Institucion;

class InstitucionService {


  public function registrarInstitucion(Request $request):Institucion{

    $data = $request->only(['nombre', 'codigo', 'cuenta_bancaria']);

    $institucion = Institucion::make([
      'nombre' => $data['nombre'],
    ]);

    $institucion->codigo = $data['codigo'];
    $institucion->cuenta_bancaria = $data['cuenta_bancaria'];
    $institucion->save();

    return $institucion;
  }

  public function listarInstitucion():Collection{

    $instituciones = Institucion::with(['docentes','rector'])->get();
    return $instituciones;
  }

}
