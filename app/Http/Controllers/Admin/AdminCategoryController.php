<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\AdminCategoryRequest;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAnyAdmin', Category::class);
        $categories = Category::withTrashed()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminCategoryRequest $adminCategoryRequest)
    {
        Gate::authorize('store', Category::class);
        $validatedData = $adminCategoryRequest->validated();
        $categorie = Category::create($validatedData);
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie ajoutée avec succès');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminCategoryRequest $adminCategoryRequest, Category $category)
    {
        Gate::authorize('update', $category);
        $validatedData = $adminCategoryRequest->validated();
        $category->update($validatedData);
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('delete', $category);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée avec succès');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        Gate::authorize('restore', $category);
        $category->restore();
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie restaurée avec succès');
    }
}
