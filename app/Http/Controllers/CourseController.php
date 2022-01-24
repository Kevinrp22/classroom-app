<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Models\Course;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

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
     * @return Response
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
        $course = Course::with(["teacher", "students"])->findOrFail($id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function joinClass(Request $request)
    {
        $this->validate(
            $request,
            [
                "code" => ["required", "exists:courses"]
            ],
            [
                "code.required" => "Por favor ingrese el código del curso",
                "code.exists" => "No se ha encontrado el curso"
            ]);

        $course = Course::where("code", $request->code)->first();
        $course->students()->attach(auth()->user()->id);
        return redirect()->route("courses.show", $course->id);
    }
}
