<?php

namespace App\Services\Contracts;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\InstitucionModel as Institucion;

interface InstitucionService {

    public function registrarInstitucion(Request $request):Institucion;
    public function listarInstitucion():Collection;
}
