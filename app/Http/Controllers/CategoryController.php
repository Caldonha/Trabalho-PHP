<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getAllByUser(auth()->user());
        return view('app.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $this->categoryService->store($data, auth()->user());
        
        return redirect()->route('categories.index')
                        ->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Verifica se o usuário é dono da categoria
        if (!$this->categoryService->isOwner($category, auth()->user())) {
            abort(403, 'Acesso negado.');
        }
        
        return view('app.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Verifica se o usuário é dono da categoria
        if (!$this->categoryService->isOwner($category, auth()->user())) {
            abort(403, 'Acesso negado.');
        }
        
        return view('app.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        // Verifica se o usuário é dono da categoria
        if (!$this->categoryService->isOwner($category, auth()->user())) {
            abort(403, 'Acesso negado.');
        }
        
        $data = $request->validated();
        $this->categoryService->update($category, $data);
        
        return redirect()->route('categories.index')
                        ->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Verifica se o usuário é dono da categoria
        if (!$this->categoryService->isOwner($category, auth()->user())) {
            abort(403, 'Acesso negado.');
        }
        
        $this->categoryService->delete($category);
        
        return redirect()->route('categories.index')
                        ->with('success', 'Categoria excluída com sucesso!');
    }
}
