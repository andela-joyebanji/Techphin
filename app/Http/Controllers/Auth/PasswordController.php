<?php

namespace Pyjac\Techphin\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Pyjac\Techphin\Http\Controllers\Controller;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after reset.
     *
     * @var string
     */
    protected $redirectTo = '/videos';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
