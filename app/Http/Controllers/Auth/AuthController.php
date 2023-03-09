<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function handleLogin(LoginPostRequest $request)
    {
        $credentials = $request->validated();


        if (Auth::attempt($credentials)) {

           $request->session()->regenerate();

            $user = Auth::user();

            Session::put('user', [
                'user_id' => $user->id,
                'role_id' => $user->role_id,
                'name' => $user->name,
                'surname' => $user->surname,
                'username' => $user->username,
            ]);


            if (Auth::user()->role_id === Role::IS_INSTRUCTOR) {

                $courses = Course::where('instructor_id',\session('user.user_id'))->orderBy('code')->orderBy('number')->orderBy('id')->get();
                if($courses){
                    Session::put('courses',$courses);
                }else{
                    Session::put('courser', null);
                }


                return redirect()->route('instructor.index');
            } elseif (Auth::user()->role_id === Role::IS_STUDENT) {
                $courses = User::findOrFail(\session('user.user_id'))->courses;
                if($courses){
                    Session::put('courses',$courses);
                }else{
                    Session::put('courses',null);
                }
                return redirect()->route('student.index');
            }
        } else {
            Session::flash('error','Kullanıcı Adınız veya Şifreniz Hatalı! Lütfen tekrar deneyiniz...');
            return redirect()->route('login');
        }
    }

    public function handleLogout()
    {
        Auth::logout();

        Session::flush();

        Session::regenerate();

        return redirect('/');
    }
}
