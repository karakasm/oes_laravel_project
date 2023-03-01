<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Support\Facades\Auth;

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

            if (Auth::user()->role === 'instructor') {
                return redirect()->route('instructor.index');
            } elseif (Auth::user()->role === 'student') {
                return redirect()->route('student.index');
            }
        } else {
            return redirect()->route('login')->withErrors(['deneme' => 'Kullanıcı Adınız veya Şifreniz Hatalı!']);
        }
    }
}
