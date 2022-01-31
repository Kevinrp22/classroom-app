<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class joinClassRequest extends FormRequest
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
      "code" => [
        "required",
        "exists:courses",
        Rule::unique("courses")->where("teacher_id", auth()->user()->id)
      ]
    ];
  }

  public function messages(){
    return [
      "code.required" => "Introduce el código de la clase",
      "code.exists" => "El código de la clase no existe",
      "code.unique" => "Eres el profesor de esta clase!"
    ];
  }
}
