<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\joinClassRequest;
use App\Models\Course;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class CourseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View
   */
  public function index()
  {
    $courses = Course::whereRelation("students", "id", "=", auth()->user()->id)
      ->orWhereRelation("teacher", "id", "=", auth()->user()->id)->get();

    return view("courses.index", compact("courses"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Application|Factory|View
   */
  public function create()
  {
    return view("courses.create");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(CreateCourseRequest $request)
  {
    $data = array_merge($request->validated(),
      ["teacher_id" => auth()->user()->id,
        "code" => Str::random(7)]);
    Course::create($data);
    return redirect()->route("courses.index");
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return Application|Factory|View
   */
  public function show($id)
  {
    $course = Course::with(["teacher", "students", "homeworks"])->findOrFail($id);
    return view("courses.show", compact("course"));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {
    $course = Course::findOrFail($id);
    return view("courses.edit", compact("course"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return Response
   */
  public function update(CreateCourseRequest $request, $id)
  {
    $request->validated();
    $course = Course::findOrFail($id);
    $course->update($request->all());
    return redirect()->route("courses.show", $course->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy($id)
  {
    Course::destroy($id);
    return redirect()->route("courses.index");
  }

  public function joinClass(joinClassRequest $request)
  {
    $request->validated();
    $course = Course::where("code", $request->code)->first();
    $course->students()->attach(auth()->user()->id);
    return redirect()->route("courses.show", $course->id);
  }

  public function deleteStudent($course, $student)
  {
    $course = Course::findOrFail($course);
    $course->students()->detach($student);
    return redirect()->route("courses.show", $course);
  }

  public function showMembers($id)
  {
    $course = Course::with(["teacher", "students"])->findOrFail($id);
    return view("courses.members", compact("course"));
  }
}
