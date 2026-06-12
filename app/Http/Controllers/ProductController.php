<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\UnitMeasure;
class ProductController extends Controller
{
    public function index() {
        $product = Product::with('recipe,unitMeasure')->get();
        return view('products.index', compact('product'));
    }

    public function create() {
        $product = new Product();
        $recipe = Recipe::all();
        $unitMeasures = UnitMeasure::all();
        return view('products.create', compact('product','recipe','unitMeasures'));
    }

    public function store(ProductRequest $request) {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success','los productos se a registrado exitosamente.');
    }

    public function show(string $id) {
        $product = Product::with('recipe,unitMeasure')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id) {
        $product = Product::findOrFail( $id );
        $recipe = Recipe::all();
        $unitMeasures = UnitMeasure::all();
        return view('products.edit', compact('product','recipe','unitMeasures'));
    }

    public function update(ProductRequest $request, string $id) {
        $product = Product::findOrFail( $id );
        $product->update($request->validated());
        return redirect()->route('products.index')->with('success','productos actualizado.');
    }

    public function destroy(string $id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success',' los productos se eliminado correctamente.');
    }
}
