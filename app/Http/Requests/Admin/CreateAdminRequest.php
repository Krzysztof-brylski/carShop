<?php

namespace App\Http\Requests\Admin;
use App\Http\Requests\jsonValidationErrorResponse;
use Illuminate\Foundation\Http\FormRequest;


class CreateAdminRequest extends FormRequest
{
    use jsonValidationErrorResponse;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>"required|string|max:50",
            'email'=>"required|email|confirmed|unique:App\Models\User,email"
        ];
    }

}
