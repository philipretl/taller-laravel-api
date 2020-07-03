<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RectorModel;
use App\Models\DocenteModel;
use Illuminate\Database\Eloquent\SoftDeletes;


class InstitucionModel extends Model
{
    use SoftDeletes;

    protected $table='institucion';
    protected $fillable=[ // campos para asignacion masiva
      'nombre',

    ];

    protected $guarded= [ // campos para proteger
      'codigo',
      'cuenta_bancaria',
    ];

    public function rector(){
      return $this->hasOne(RectorModel::class,'institucion_id');
    }

    public function docentes(){
      return $this->hasMany(DocenteModel::class,'institucion_id');
    }


}
