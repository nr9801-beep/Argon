<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRequest;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Supplier;
use App\Models\UnitMeasure;

class IngredientController extends Controller
{
    public function index() {
        $ingredients = Ingredient::with('supplier,unitmeasure')->get();
        return view('Ingredient.index', compact('ingredients'));
    }

    public function create() {
        $ingredients = new Ingredient();
        $suppliers = Supplier::all();
        $unitmeasures = UnitMeasure::all();
        return view('Ingredient.create', compact('ingredients','suppliers','unitmeasures'));
    }

    public function store(IngredientRequest $request) {
        Ingredient::create($request->validated());
        return redirect()->route('ingredients.index')->with('success','Ingredientes registrado exitosamente.');
    }

    public function show(string $id) {
        $ingredients = Ingredient::with('supplier,unitmeasure')->findOrFail($id);
        return view('Ingredient.show', compact('ingredients'));
    }

    public function edit(string $id) {
        $ingredients = Ingredient::findOrFail( $id );
        $suppliers = Supplier::all();
        $unitmeasures = UnitMeasure::all();
        return view('Ingredient.edit', compact('ingredients','suppliers','unitmeasures'));
    }

    public function update(IngredientRequest $request, string $id) {
        $ingredients = Ingredient::findOrFail( $id );
        $ingredients->update($request->validated());
        return redirect()->route('Ingredient.index')->with('success','Ingredientes actualizado.');
    }

    public function destroy(string $id) {
        $ingredients = Ingredient::findOrFail($id);
        $ingredients->delete();
        return redirect()->route('Ingredient.index')->with('success',' los ingrdientes se eliminado correctamente.');
    }
}

