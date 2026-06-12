<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeIngredientRequest;
use Illuminate\Http\Request;
use App\Models\RecipeIngredient;
use App\Models\Recipe;
use App\Models\Ingredient;
class RecipeIngredientController extends Controller
{
        public function index() {
        $recipeIngredients = RecipeIngredient::with('recipe,ingredient')->get();
        return view('recipe_ingredients.index', compact('recipeIngredients'));
    }

    public function create() {
        $recipeIngredients = new RecipeIngredient();
        $recipes = Recipe::all();
        $ingredients = Ingredient::all();
        return view('recipe_ingredients.create', compact('recipeIngredients','recipes','ingredients'));
    }

    public function store(RecipeIngredientRequest $request) {
        RecipeIngredient::create($request->validated());
        return redirect()->route('recipe-ingredients.index')->with('success','ingredientes agregados exitosamente.');
    }

    public function show(string $id) {
        $recipeIngredients = RecipeIngredient::with('recipes,ingredients')->findOrFail($id);
        return view('recipe_ingredients.show', compact('recipeIngredients'));
    }

    public function edit(string $id) {
        $recipeIngredients =  RecipeIngredient::findOrFail( $id );
        $recipes = Recipe::all();
        $ingredients = Ingredient::all();
        return view('recipe_ingredients.edit', compact('recipeIngredients','recipes','ingredients'));
    }

    public function update(RecipeIngredientRequest $request, string $id) {
        $recipeIngredients = RecipeIngredient::findOrFail( $id );
        $recipeIngredients->update($request->validated());
        return redirect()->route('recipe_ingredients.index')->with('success','ingredientes de la receta a sido actualizado.');
    }

    public function destroy(string $id) {
        $recipeIngredients = RecipeIngredient::findOrFail($id);
        $recipeIngredients->delete();
        return redirect()->route('recipe_ingredients.index')->with('success',' ingredientes de la receta se eliminaron correctamente.');
    }
}
