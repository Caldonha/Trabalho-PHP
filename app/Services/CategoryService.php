<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(private Category $category) {}

    /**
     * Cria uma nova categoria
     *
     * @param array $data
     * @param User $user
     * @return Category
     */
    public function store(array $data, User $user): Category
    {
        $data['user_id'] = $user->id;
        return $this->category->create($data);
    }

    /**
     * Atualiza uma categoria
     *
     * @param Category $category
     * @param array $data
     * @return bool
     */
    public function update(Category $category, array $data): bool
    {
        // Remove user_id dos dados para evitar alteração
        unset($data['user_id']);
        return $category->update($data);
    }

    /**
     * Deleta uma categoria
     *
     * @param Category $category
     * @return bool
     */
    public function delete(Category $category): bool
    {
        return $category->delete();
    }

    /**
     * Busca categoria por ID
     *
     * @param int $id
     * @return Category|null
     */
    public function findById(int $id): ?Category
    {
        return $this->category->find($id);
    }

    /**
     * Busca categoria por ID do usuário autenticado
     *
     * @param int $id
     * @param User $user
     * @return Category|null
     */
    public function findByIdAndUser(int $id, User $user): ?Category
    {
        return $this->category->where('id', $id)
                             ->where('user_id', $user->id)
                             ->first();
    }

    /**
     * Lista todas as categorias do usuário
     *
     * @param User $user
     * @return Collection
     */
    public function getAllByUser(User $user): Collection
    {
        return $this->category->where('user_id', $user->id)
                             ->orderBy('title')
                             ->get();
    }

    /**
     * Lista todas as categorias
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->category->with('user')
                             ->orderBy('title')
                             ->get();
    }

    /**
     * Busca categorias por título
     *
     * @param string $title
     * @param User $user
     * @return Collection
     */
    public function searchByTitle(string $title, User $user): Collection
    {
        return $this->category->where('user_id', $user->id)
                             ->where('title', 'like', '%' . $title . '%')
                             ->orderBy('title')
                             ->get();
    }

    /**
     * Conta o número de categorias do usuário
     *
     * @param User $user
     * @return int
     */
    public function countByUser(User $user): int
    {
        return $this->category->where('user_id', $user->id)->count();
    }

    /**
     * Verifica se o usuário é dono da categoria
     *
     * @param Category $category
     * @param User $user
     * @return bool
     */
    public function isOwner(Category $category, User $user): bool
    {
        return $category->user_id === $user->id;
    }
}