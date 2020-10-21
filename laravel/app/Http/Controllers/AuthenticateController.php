<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class AuthenticateController extends Controller
{
    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    public function index()
    {
        return view("system.users.login.index");
    }

    public function authenticate(Request $request)
    {
        $response = $this->user_service->attempt($request->only('email', 'password'));

        if($response === true){
            return redirect('cifras');
        }

        return redirect()->back()->with('status', 'Usuário ou senha incorretos.');
    }

    public function cadastrar()
    {
        return view("system.users.create.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
        ],
        [
            'required' => 'O campo :attribute é obrigatório.',
            'unique' => 'O campo :attribute já está sendo utilizado.',
            'email' => 'O campo :attribute precisa ser um e-mail válido.',
            'min' => 'O campo :attribute precisa ter no mínimo :min caracteres.',
        ],
        [
            'name' => 'NOME',
            'email' => 'E-MAIL',
            'password' => 'SENHA',
        ]);

        $response = $this->user_service->create($request->toArray());

        if($response === false){
            return redirect()->back()->with('status', 'Erro no cadastro.');
        }

        return redirect('login');
    }

    public function logout()
    {
        $this->user_service->logout();
        return redirect('login');
    }
}
