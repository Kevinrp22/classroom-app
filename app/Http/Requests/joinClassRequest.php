<?php

namespace App\Http\Requests;

use App\Models\Course;
use App\Rules\isStudentAlreadyInClass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class joinClassRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */

  public
  function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public
  function rules()
  {
    return [
      "code" => [
        "required",
        "exists:courses",
        Rule::unique("courses")->where("teacher_id", auth()->user()->id),
        Rule::when(function () {
          return Course::where('code', $this->code)->first();
        }, new isStudentAlreadyInClass),
      ]

    ];
  }

  public
  function messages()
  {
    return [
      "code.required" => __("Enter the class code"),
      "code.exists" => __("Class code does not exist"),
      "code.unique" => __("You are the teacher of this class!")
    ];
  }
}
