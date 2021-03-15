<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use Illuminate\Support\Facades\Hash;

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

    public function apiLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'These credentials do not match our records'
            ], 200);
        }

        $tokenObject = $user->createToken('access-token');
        $response = [
            'userData' => $user,
            'accessToken' => $tokenObject->accessToken,
            'tokenExpiry' => $tokenObject->token->expires_at
        ];
        return \response()->json($response);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $authSuccess = \Illuminate\Support\Facades\Auth::attempt($credentials, $request->has('remember'));
        if($authSuccess) {
            $request->session()->regenerate();
            return view('homePage');
        }else{
            return back()->withErrors([
                'success' => false,
                'message' => 'Login failed. Incorrect credentials'
            ]);
        }
    }
}
