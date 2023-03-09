<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CourseController extends Controller
{
    public function index(Course $course){
        return view('student.course.index',['course' => $course]);
    }

    public function show(Course $course){

        $instructor = User::where('id', $course->instructor_id)->first();
        return view('student.course.detail',['course' => $course, 'instructor' => $instructor]);
    }
}
