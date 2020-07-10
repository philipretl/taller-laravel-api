<?php

namespace App\Actions;

use App\Models\InstitucionModel as Institucion;

class RegistrarInstitucionAction
{

    public static function execute($data):Institucion{
      $institucion = Institucion::make([
        'nombre' => $data['nombre'],
      ]);
      $institucion->codigo = $data['codigo'];
      $institucion->cuenta_bancaria = $data['cuenta_bancaria'];
      $institucion->save();
      return $institucion;
    }
}
