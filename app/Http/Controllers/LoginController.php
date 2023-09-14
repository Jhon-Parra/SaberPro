<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewRegister;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\roluser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Microsoft\Graph\Graph;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function index()
    {
        // Obtener el conteo de usuarios registrados
        $userCount = User::count();

        // Obtener los ingresos de usuarios por día
        $userLogins = DB::table('users')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        ->groupBy('date')
        ->get();


        // Crear los arrays de datos para la gráfica
        $labels = [];
        $data = [];

        foreach ($userLogins as $login) {
            $labels[] = Carbon::parse($login->date)->format('Y-m-d');
            $data[] = $login->count;
        }

        // Pasar los datos a la vista
        return view('layout.dashboard1', compact('userCount', 'labels', 'data'));
    }
    //Metodo de registro del estudiante...
    //Metodo defindo de tipo post, el cual se llama en la ruta newregister...
    public function register(Request $request)
    {

        /* Validamos el correo del usuario, con el fin de validar que sea usantoto.edu.co */
        $separate = "@";
        $array = explode($separate, $request->email);
        $company = $array[1];
        if($company == "usantoto.edu.co")
        {
            //Validamos que las contraseñas coincidan
            if($request->password == $request->repassword)
            {
            // Usando el modelo de usuario creamos el usuario con los datos recibidos por metodo post
            $user = new user();

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            /* Despues de guardar el nuevo usuario le asignamos el rol del estudiante...*/
            $user->assignRole('student');
            /*Iniciamos sesión*/
            Auth::login($user);
            /*dirigimos al usuario a la pagina principal de estudiante*/
            return redirect('/student');
            }else{
                return view('session.register')->with(["error"=>"Las contraseñas deben coincidir para evitar problemas de inicio de sesión futuros."]);
            }
        }else{
            return view('session.register')->with(["error"=>"Debes regístrar tu correo institucional"]);
        }
    }




    public function prueba(){
        Mail::to('duvan.velasquez@usantoto.edu.co')->send(new NewRegister());
    }


    public function login(Request $request)
    {

        //Aún falta validar...


        $email = $request->email;
        $password = $request->password;

        $remember =($request->has('remember')? true: false);

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $request->session()->regenerate();

            if(@Auth::user()->hasRole('student'))
                {
                    return redirect('student');
                }
                else
                {
                    return redirect('logout');
                }
        }else{
            return view("session.login")->with(["error"=>"Al parecer las credenciales con las que intentas ingresar son incorrectas."]);
        }

    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    //  Los siguiente metodos nos ayudarán a manejar los datos de los usuarios que entren por medio de la cuenta de microsoft...

    public function redirectToProvider()
    {
        return Socialite::driver('microsoft')->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('microsoft')->user();

        // Aquí puedes procesar los datos del usuario o autenticar al usuario en tu aplicación.

        return redirect('/home');
    }

    public function getUserData()
{
    $userData = User::selectRaw("DATE(created_at) AS date, COUNT(*) AS count")
        ->groupBy('date')
        ->orderBy('date', 'ASC')
        ->get();

    return response()->json($userData);
}

}
