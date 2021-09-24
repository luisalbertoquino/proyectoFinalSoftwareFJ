<?php

namespace App\Http\Controllers\Auth;
use App\contacto;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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



    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    protected function sendLoginResponse(Request $request)
          {
              $request->session()->regenerate();
              $previous_session = Auth::User()->session_id;
              if ($previous_session) {
                  Session::getHandler()->destroy($previous_session);
              }

              Auth::user()->session_id = Session::getId();
              Auth::user()->save();
              $this->clearLoginAttempts($request);

              return $this->authenticated($request, $this->guard()->user())
                  ?: redirect()->intended($this->redirectPath());
          }


    protected function credentials(Request $request)
    {
        //return $request->only($this->username(), 'password');
        
        //return['email'=>$request->{$this->username()},'password'=>$request->password,'estado'=>'1'];
        if(is_numeric($request->get('email'))){
            return ['telefono'=>$request->get('email'),'password'=>$request->get('password')];
          }
          elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return['email'=>$request->{$this->username()},'password'=>$request->password];
          }
          return ['username' => $request->get('email'), 'password'=>$request->get('password')];
        
    }


    protected function authenticated(Request $request, $user)
    {
        
        $contacto= contacto::find(1);
        if($contacto !=null){
            $date1 = new \DateTime();
        $date2 = new \DateTime("$contacto->fechaFinal");
        if($date1 < $date2){
            $diff = $date1->diff($date2);
            $diass=$diff->days+1 . ' Dias';
            }else{
            $diass = "Expired";
            }
        }else{
            $diass=0;
        }
        
 
        if ($user->estado == 0) {

            $message = 'Usuario inactivo contactar al administrador';

            // Log the user out.
            $this->logout($request);

            // Return them to the log in form.
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    // This is where we are providing the error message.
                    $this->username() => $message,
                ]);
        }
        /*elseif($diass=="Expired" && !\Auth::user()->hasPermission('administrador-main')){
            $message = 'Licencia expiro';

            // Log the user out.
            $this->logout($request);

            // Return them to the log in form.
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    // This is where we are providing the error message.
                    $this->username() => $message,
                ]);
        }elseif($diass==0 && !\Auth::user()->hasPermission('administrador-main')){
            $message = 'No hay Registro de licencia';

            // Log the user out.
            $this->logout($request);

            // Return them to the log in form.
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    // This is where we are providing the error message.
                    $this->username() => $message,
                ]);
        }/** esto es por si no quiere nisiquiera que se inicie sesion ni nada si no que con el tiempo deberia aparecer esto es opcional*/
    }


    
}
