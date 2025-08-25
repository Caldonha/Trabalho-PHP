<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(private User $user) {}

    /**
     * Tenta autenticar o usuário com as credenciais fornecidas
     *
     * @param array $credentials
     * @return bool
     */
    public function attempt(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    /**
     * Faz logout do usuário autenticado
     *
     * @return void
     */
    public function logout(): void
    {
        Auth::logout();
    }

    /**
     * Retorna o usuário autenticado
     *
     * @return User|null
     */
    public function user(): ?User
    {
        return Auth::user();
    }

    /**
     * Verifica se o usuário está autenticado
     *
     * @return bool
     */
    public function check(): bool
    {
        return Auth::check();
    }

    /**
     * Autentica o usuário manualmente
     *
     * @param User $user
     * @return void
     */
    public function login(User $user): void
    {
        Auth::login($user);
    }

    /**
     * Valida as credenciais sem fazer login
     *
     * @param array $credentials
     * @return bool
     */
    public function validate(array $credentials): bool
    {
        return Auth::validate($credentials);
    }

    /**
     * Busca usuário por email
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->user->where('email', $email)->first();
    }

    /**
     * Verifica se a senha está correta para um usuário
     *
     * @param User $user
     * @param string $password
     * @return bool
     */
    public function checkPassword(User $user, string $password): bool
    {
        return Hash::check($password, $user->password);
    }
}