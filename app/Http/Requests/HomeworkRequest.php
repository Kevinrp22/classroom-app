<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeworkRequest extends FormRequest
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
      "title" => "required",
      "description" => "required",
      "points" => "required|numeric",
      "evaluable" => "", /* TODO: Al poner boolean, da error (REVISAR)*/
      "type" => "required|in:individual,grupal",
      "priority" => "required|in:baja,normal,alta",
      "due_date" => "required|date",
    ];
  }
}
