<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
  use HasFactory;

  protected $table = 'homeworks';
  protected $fillable = ["title", "description", "points", "due_date", "evaluable", "type", "priority", "course_id"];

  public function course()
  {
    return $this->belongsTo(Course::class);
  }
}
