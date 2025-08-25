<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserServices
{
    public function __construct(private User $user) {}

    /**
     * Cria um novo usuário
     *
     * @param array $data
     * @return User
     */
    public function store(array $data): User
    {
        // Hash da senha antes de salvar
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        
        return $this->user->create($data);
    }

    /**
     * Atualiza os dados do usuário
     *
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(User $user, array $data): bool
    {
        // Hash da senha se foi fornecida
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // Remove a senha do array se estiver vazia
            unset($data['password']);
        }
        
        return $user->update($data);
    }

    /**
     * Busca usuário por ID
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User
    {
        return $this->user->find($id);
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
     * Lista todos os usuários
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->user->all();
    }

    /**
     * Deleta um usuário
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
