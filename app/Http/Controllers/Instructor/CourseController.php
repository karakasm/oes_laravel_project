<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Day;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware(['course_auth']);
    }

    public function index(Course $course)
    {
        return view('instructor.course.index', ['course' => $course]);
    }

    public function show(Course $course)
    {
        return view('instructor.course.detail', ['course' => $course, 'instructor' => session('user')]);
    }
}
