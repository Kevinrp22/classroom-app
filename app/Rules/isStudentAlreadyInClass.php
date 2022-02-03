<?php

namespace App\Rules;

use App\Models\Course;
use Illuminate\Contracts\Validation\Rule;

class isStudentAlreadyInClass implements Rule
{
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param string $attribute
   * @param mixed $value
   * @return bool
   */
  public function passes($attribute, $value)
  {
    $course = Course::with("students")->where('code', $value)->firstOrFail();
    return !($course->whereRelation("students", "id", "=", auth()->user()->id)->exists());
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message()
  {
    return __("You are already a student of this course!");
  }
}
