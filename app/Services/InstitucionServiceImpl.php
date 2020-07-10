<?php

namespace App\Services;

use App\Services\Contracts\InstitucionService;
use Illuminate\Http\Request;
use App\Models\InstitucionModel as Institucion;
use App\Validators\RegistrarInstitucionValidator;
use App\Actions\UpdateInstitucionAction;
use App\Actions\RegistrarInstitucionAction;
use Illuminate\Database\Eloquent\Collection;

class InstitucionServiceImpl implements InstitucionService{

  public function registrarInstitucion(Request $request):Institucion{

    $data = $request->only(['nombre', 'codigo', 'cuenta_bancaria']);
    RegistrarInstitucionValidator::execute($data);
    return RegistrarInstitucionAction::execute($data);
  }

  public function listarInstitucion():Collection{

    $instituciones = Institucion::with(['docentes','rector'])->get();
    return $instituciones;
  }

  public function actualizarInstitucion(Request $request){
    $action = new UpdateInstitucionAction();
    $data = $request->only(['nombre', 'codigo', 'cuenta_bancaria']);
    
    $action::execute($data);
  }

}
