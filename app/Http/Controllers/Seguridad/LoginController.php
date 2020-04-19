<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    /**
     * hay que cambiar aparte de la variable redirectTo el la constante home
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return view('seguridad.index');
    }

    public function username()
    {
        return 'usuario';
    }
    protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles()->orderBy('rol_id')->get();
        //dd($roles);
        // $roles = $user->roles()->where('estado', 1)->get();
        //dd(session()->all());
        if ($roles->isNotEmpty()) {
            $user->setSession($roles->toArray());
            //dd(session()->all());
        } else {
            /**
             * Para cerrar la sesión de los usuarios de su aplicación, puede utilizar el método de
             *  cierre de sesión en la fachada Auth. Esto borrará la información de autenticación 
             * en la sesión del usuario:
             */
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->withErrors(['error_rol' => 'Este usuario no tiene un rol activo']);
        }
    }
}
