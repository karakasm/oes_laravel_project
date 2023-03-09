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
    public function index($id){
        $course = Course::findOrFail($id);
        return view('instructor.course.index', ['course' => $course]);
    }

    public function show($course_id){
        $course = Course::findOrFail($course_id);
        return view('instructor.course.detail',['course' => $course,'instructor'=>session('user')]);
    }
}
