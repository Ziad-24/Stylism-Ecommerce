<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function username()
    {
        $value = request()->input('identify');
        $field = '';
        if(     filter_var($value,FILTER_VALIDATE_EMAIL)    )
        {
            $field = 'email';
        }
        else
        {
            $field = 'phone';
        }
        request()->merge([$field => $value]);
        return $field;
    }



    
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        
        $user = User::where('email', $googleUser->email)->first();
        
        if(!$user)
        {
            $user = User::Create([
                'name' => $googleUser->user['name'],
                'email' => $googleUser->user['email'],
                'googleId' => $googleUser->user['id'],
            ]);
        }
        
        Auth::login($user);
    
        return redirect()->route('home');
    }


}
