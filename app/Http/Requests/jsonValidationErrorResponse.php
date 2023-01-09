<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait jsonValidationErrorResponse{


    protected function failedValidation(Validator $validator)
    {
        $response= Response()->json($this->validator->errors()->messages(),500);
        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }

}
