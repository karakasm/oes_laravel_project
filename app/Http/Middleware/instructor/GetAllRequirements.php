<?php

namespace App\Http\Middleware\Instructor;

use App\Models\Course;
use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GetAllRequirements
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $courses = Course::where('instructor_id', \session('user.user_id'))->orderBy('code')->orderBy('number')->orderBy('id')->get();

        $announcements = new Collection();
        $folders = new Collection();
        foreach ($courses as $course) {
            if ($course->announcements) {
                $announcements = $announcements->merge($course->announcements);
            }
        }
        foreach ($courses as $course) {
            if ($course->folders) {
                $folders = $folders->merge($course->folders);
            }
        }


        if ($courses) {
            Session::put('courses', $courses);
        } else {
            Session::put('courses', null);
        }

        if ($announcements) {
            Session::put('announcements', $announcements->sortByDesc('updated_at')->take(3));
        } else {
            Session::put('announcements', null);
        }

        if ($folders) {
            Session::put('folders', $folders->sortByDesc('created_at')->take(3));
        } else {
            Session::put('folders', null);
        }



        return $next($request);
    }
}
