<?php

namespace App\Http\Requests\admin\model_car;

use Illuminate\Foundation\Http\FormRequest;

class model_car_request extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        return [
            "model" => "required|numeric|unique:cars_models,model," . $this -> id,
        ];
    }

    public function messages()
    {
        return [
            "model.required" => "يجب عليك ادخال الموديل",
            "model.numeric" => "يجب عليك ادخال الموديل",
            "model.unique" => "هذا الموديل ادخل بالفعل",
        ];
    }
}
