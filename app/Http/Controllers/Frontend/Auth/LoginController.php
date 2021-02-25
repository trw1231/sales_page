<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Models\User;

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

    protected function attemptLogin(Request $request)
    {
        if (\Auth::attempt(['username_login' => $request->username_login, 'password_login' => $request->password_login])) {
            $checkPackage = \DB::table('package_user')
            ->where('user_id',\Auth::user()->id)
            ->first();
            if($checkPackage)
            {
                return redirect()->route('salepage.index');
            }
            else
            {
                return redirect()->route('package.index');
            }
            
        }else
        {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('');
    }

  
}
