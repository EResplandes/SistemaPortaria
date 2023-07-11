<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class Autenticacao extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {

        $this->validate($request, [
            'email' =>'required|string',
            'password' => 'required'
        ],[
            'email.required'=> "O campo usuário é obrigatório",
            'password.required' => "O campo senha é obrigatório"

        ]);


        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password') ])){
            return redirect('dashboard');
        } else {
            return redirect()->back()->with('danger', 'Usuário ou senha inválido!');
        }

    }

}
