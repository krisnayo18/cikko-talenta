<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        /* cutloss gmt = 0,23 is invalid, now there's a change to pump
        manta now still in range, still choppy in bullish order
        lqty, uma, matic,
        aave is long term coin so hold, there is change to hit 500$
        qnt still valid, now is time to buy the dip. qnt is rwa project,hot narative for Q2.
        STILL WATCH BITCOIN in range between 65 and 61. IF DUMP to 59 is invalid 
        AI is done, if there a change to retest very dip. it will announence again
        */
        return view('auth.sign-in');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // session(['email' => $request->email]);

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
