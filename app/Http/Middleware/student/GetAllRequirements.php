<?php

namespace App\Http\Middleware\student;

use App\Models\User;
use Closure;
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
        if($courses){
            Session::put('courses',$courses);
        }else{
            Session::put('courses',null);
        }

        return $next($request);
    }
}
