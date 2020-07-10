<?php

namespace App\Actions;

use App\Repositories\Contracts\InstitucionRepository;

class UpdateInstitucionAction
{
    protected $repository;

    public function __construct(InstitucionRepository $repository){
      $this->repository = $repository;
    }

    public function execute($data){
      $materias = $this->repository->filtrarMateriasPromedio(3.0);

      if($materias->isEmpty()){
        // actualice la institucion
      }

      // lance una exception que no se puede actualizar la instuticion porque tiene materias con promedio  de 3.0 necesita
      // una interventoria
    }
}
