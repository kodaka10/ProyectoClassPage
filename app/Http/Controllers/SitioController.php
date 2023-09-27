<?php

namespace App\Http\Controllers;

use App\Models\Sitio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SitioController extends Controller
{

    public function loginForm()
    {
        return view('login');
    }

    public function registerForm()
    {
        return view('register');
    }

    public function registerValitationForm(Request $request)
    {
        $request -> validate(['nombre' => 'required|max:50',
        'apellido' => 'required|max:50',
        'correo' => 'required|email|unique:users,email',
        'contraseña' => 'required|max:10']);
        
        $user = new User();
        $user->email = $request->correo;
        $user->name = $request->nombre;
        $user->password = Hash::make($request->contraseña);
        $user->lastname = $request->apellido;
        $user->save();

        //Auth::login($user);
        //$request->session()->regenerate();

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $request -> validate(['correo' => 'required|email','contraseña' => 'required']);

        $credentials = [
            "email" => $request->correo,
            "password" => $request->contraseña,
            //"active" => true
        ];

        //mantener session iniciada
        $remember = ($request->has('remember') ? true : false);

        // inicio de sesion
        if(Auth::attempt($credentials,$remember))
        {
            $request->session()->regenerate();
            
            return redirect()->route('home');
        }
        else
        {
            //validar o mostrar mensaje de errores
            return redirect()->route('login')->withErrors(['error' => 'Correo o contraseña incorrectos.']);;
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


    public function ConsultaUser()
    {
        //User::get();
        //User::where('name','juan')->get();
        $usuarios = User::all();
        //dd($usuarios);

        return view('consulta',['usuarios'=> $usuarios]);
    }

    public function ShowUsers(User $usuarios)
    {
        return view('UsuariosC',compact('usuarios'));
    }

    public function editUserForm(User $usuarios){
        return view('editUser', compact('usuarios'));
    }

    public function updateUserSave(Request $request, User $usuarios)
    {
        $request -> validate(['nombre' => 'required|max:50',
        'apellido' => 'required|max:50',
        'correo' => 'required|email|unique:users,email']);

        $usuarios->name = $request->nombre;
        $usuarios->lastname = $request->apellido;
        $usuarios->email = $request->correo;
        $usuarios->save();
        return redirect()->route('consulta');
    }

    public function deleteUserSave(User $usuarios)
    {
        $usuarios->delete();
        return redirect()->route('home');
    }



    /*
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Sitio $sitio)
    {
        //
    }


    public function edit(Sitio $sitio)
    {
        //
    }


    public function update(Request $request, Sitio $sitio)
    {
        //
    }


    public function destroy(Sitio $sitio)
    {
        //
    }
    */
}
