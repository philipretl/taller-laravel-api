<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InstitucionModel;
use App\Models\MateriaModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocenteModel extends Model
{
  use SoftDeletes;

  protected $table='docente';
  protected $fillable=[ // campos para asignacion masiva
    'name',
  ];

  protected $guarded= [ // campos para proteger
    'codigo',
    'institucion_id',
  ];

  public function institucion(){
    return $this->belongsTo(InstitucionModel::class,'institucion_id');
  }

  public function materias(){
    return $this->belongsToMany(MaterialModel::class, 'docente_materia',
      'docente_id', 'materia_id')->withPivot(['estado']);
  }

}
