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

  public function message(){
    return [
      "code.required" => "Please enter a course code",
      "code.exists" => "The course code you entered does not exist",
      "code.unique" => "You have already joined this course"
    ];
  }
}
