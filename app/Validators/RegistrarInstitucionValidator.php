<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Venoudev\Results\Exceptions\CheckDataException;

class RegistrarInstitucionValidator
{
    public static function execute($data){

        $validator = Validator::make($data, [
            'nombre' => ['required'],
        ]);

        if ($validator->fails()) {
            $exception = new CheckDataException();
            $exception->addFieldErrors($validator->errors());
            throw $exception;
        }
        return;

    }
}
