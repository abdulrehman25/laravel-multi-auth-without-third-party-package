<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Models\Course;
use App\Services\CrudService;

class CourseController extends Controller
{
    protected $crudService;

    public function __construct()
    {
        $this->crudService = new CrudService(Course::class);
    }

    public function index()
    {
        $courses = $this->crudService->getAll();
        return view('course.index', compact('courses'));
    }

    public function create()
    {
        if (in_array(activeGuard(), ['teacher', 'admin']))
            return view('course.create');
        abort(403);
    }

    public function store(CourseStoreRequest $request)
    {
        $this->crudService->create($request->validated());
        return redirect(route('course.index'));
    }

    public function show($id)
    {
        $course = $this->crudService->find($id);
        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        if (in_array(activeGuard(), ['teacher', 'admin'])) {
            $course = $this->crudService->find($id);
            return view('course.edit', compact('course'));
        }
        abort(403);
    }

    public function update(CourseStoreRequest $request, $id)
    {
        $this->crudService->update($id, $request->validated());
        return redirect(route('course.index'));
    }

    public function destroy($id)
    {
        if (in_array(activeGuard(), ['teacher', 'admin'])) {
            $this->crudService->delete($id);
            return redirect(route('course.index'));
        }
        abort(403);
    }
}

