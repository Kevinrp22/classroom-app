<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeworkRequest;
use App\Models\Course;
use App\Models\Homework;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class HomeworkController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View
   */
  public function index($course_id)
  {
    $course = Course::with("homeworks")->findOrFail($course_id);
    $homeworks = $course->homeworks;
    return view("homeworks.index", compact("course", "homeworks"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Application|Factory|View
   */
  public function create($course)
  {
    $course = Course::findOrFail($course);
    return view("homeworks.create", compact("course"));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return RedirectResponse
   */
  public function store(HomeworkRequest $request, $course)
  {
    $data = array_merge($request->all(), ["course_id" => $course]);
    $homework = Homework::create($data);
    return redirect()->route("homeworks.show", [$course, $homework]);
  }

  /**
   * Display the specified resource.
   *
   * @param Homework $homework
   * @return Application|Factory|View|Response
   */
  public function show($course, $homework)
  {
    $course = Course::findOrFail($course);
    $homework = Homework::with("course.teacher")->findOrFail($homework);
    return view("homeworks.show", compact("homework", "course"));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Homework $homework
   * @return Application|Factory|View
   */
  public function edit($course, $homework)
  {
    Gate::authorize("update", $course = Course::findOrFail($course));
    $homework = Homework::findOrFail($homework);
    return view("homeworks.edit", compact("homework", "course"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Homework $homework
   * @return RedirectResponse
   */
  public function update(HomeworkRequest $request, $homework)
  {
    Gate::authorize("update", new Course);
    $request->validated();
    $homework->update($request->all());
    return redirect()->route("homeworks.show", ["course" => $homework->course_id, "homework" => $homework]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Homework $homework
   * @return RedirectResponse
   */
  public function destroy($course, $homework)
  {
    Gate::authorize("delete", new Course);
    Homework::destroy($homework);
    return redirect()->route("homeworks.index", $course);
  }
}
