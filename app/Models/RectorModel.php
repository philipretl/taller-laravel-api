<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InstitucionModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class RectorModel extends Model
{

  use SoftDeletes;

  protected $table='rector';
  protected $fillable=[ // campos para asignacion masiva
    'name',
  ];

  protected $guarded= [ // campos para proteger
    'codigo',
    'institucion_id',
  ];

  public function institucion(){
    return $this->belongsTo(InstitucionModel::class, 'institucion_id');
  }

}
