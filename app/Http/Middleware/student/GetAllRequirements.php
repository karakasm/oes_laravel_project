<?php

namespace App\Http\Middleware\student;

use App\Models\User;
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
        $courses = User::findOrFail(\session('user.user_id'))->courses;

        $announcements = new Collection();
        foreach ($courses as $course){
            $announcements = $announcements->merge($course->announcements->where('status','active')->all());
        }

        if($courses){
            Session::put('courses',$courses);
        }else{
            Session::put('courses',null);
        }

        if($announcements){
            Session::put('announcements',$announcements->sortByDesc('updated_at')->take(3));
        }else{
            Session::put('announcements',null);
        }

        return $next($request);
    }
}
