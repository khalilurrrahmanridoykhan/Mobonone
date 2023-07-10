<?php

namespace App\Http\Controllers\Faculty\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\FacultyLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('faculty.auth.login1');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(FacultyLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // dd();

        if((Auth::guard('faculty')->user()->status) == 1){
            return redirect()->intended(RouteServiceProvider::FACULTY_HOME);

        }else{
            Auth::guard('faculty')->logout();
            return redirect('editor/login');


        }


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('faculty')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
