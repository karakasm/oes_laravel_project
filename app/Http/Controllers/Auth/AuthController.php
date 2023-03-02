<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
                'name' => $user->name,
                'surname' => $user->surname,
                'username' => $user->username,
                'role' => $user->role,
            ]);

            if (Auth::user()->role === 'instructor') {
                return redirect()->route('instructor.index');
            } elseif (Auth::user()->role === 'student') {
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
