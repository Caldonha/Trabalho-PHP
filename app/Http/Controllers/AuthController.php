<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}

    public function index()
    {
        return view('app.login');
    }

    public function login(AuthRequest $request)
    {
        // Valida a requisição
        $credentials = $request->validated();

        // Tenta autenticar o usuário usando o AuthService
        if ($this->authService->attempt($credentials)) {
            // Redireciona para o dashboard
            return redirect()->route('dashboard')->with('success', 'Login realizado com sucesso!');
        }

        // Se falhar, redireciona de volta com erro
        return back()->withErrors(['email' => 'E-mail ou senha inválidos.'])->withInput();
    }

    public function logout()
    {
        // Faz logout do usuário usando o AuthService
        $this->authService->logout();

        // Redireciona para a página de login
        return redirect()->route('login')->with('success', 'Logout realizado com sucesso!');
    }
}
