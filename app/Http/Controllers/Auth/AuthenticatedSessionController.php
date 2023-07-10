<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    public function create(): View
    {
        return view('auth.userlogin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();


        $checkactive = DB::table('users')->where('email', $request->email)->where('status', 0)->first();
        // if(empty($checkactive)){
        //     $request->session()->regenerate();
        //     return redirect()->intended(RouteServiceProvider::ADMIN_HOME);

        // }else{

        //     return redirect()->intended(RouteServiceProvider::LOGIN);

        // }

        // return redirect()->route('admin.course.index');

        if(!empty($checkactive)){
            $request->session()->get('error', 'Not active.');

            return redirect()->intended(RouteServiceProvider::HOME);

        }else{
            // $request->session()->regenerate();
            // return redirect()->intended(RouteServiceProvider::HOME);
        }

            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
