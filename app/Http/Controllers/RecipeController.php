<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use Illuminate\Http\Request;
use App\Models\Recipe;
class RecipeController extends Controller
{
    public function index() {
        $recipes = Recipe::all();
        return view('Recipe.index', compact('recipes'));
    }

    public function create() {
        $recipes = new Recipe();
        return view('Recipe.create', compact('recipes'));
    }

    public function store(RecipeRequest $request) {
        Recipe::create($request->validated());
        return redirect()->route('Recipe.index')->with('success',' La receta se a registrado exitosamente.');
    }

    public function show(string $id) {
        $recipes = Recipe::findOrFail($id);
        return view('Recipe.show', compact('recipes'));
    }

    public function edit(string $id) {
        $recipes = Recipe::findOrFail($id);
        return view('Recipe.edit', compact('recipes'));
    }

    public function update(RecipeRequest $request, string $id) {
        $recipes = Recipe::findOrFail($id);
        $recipes->update($request->validated());
        return redirect()->route('Recipe.index')->with('success','La receta se actualizado.');
    }

    public function destroy(string $id) {
        $recipes = Recipe::findOrFail($id);
        $recipes->delete();
        return redirect()->route('Recipe.index')->with('success','la receta eliminado correctamente.');
    }
}
