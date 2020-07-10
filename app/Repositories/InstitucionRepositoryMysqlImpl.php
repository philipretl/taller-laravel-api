<?php

namespace App\Repositories;

use App\Repositories\InstitucionRepository;

class InstitucionRepositoryMysqlImpl implements InstitucionRepository {

    public function filtrarMateriasPromedio(double $promedio){

      $materias =  Materias::all();
      return $materias;
    }
}
