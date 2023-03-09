<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($id){
        $course = Course::findOrFail($id);
        return view('student.course.index',['course' => $course]);
    }

    public function show($course_id){
        $course = Course::findOrFail($course_id);
        $instructor = User::where('id', $course->instructor_id)->first();

        return view('student.course.detail',['course' => $course, 'instructor' => $instructor]);
    }
}
