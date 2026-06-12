<?php

namespace App\Http\Controllers;

use App\Http\Requests\BachProductionRequest;
use Illuminate\Http\Request;
use App\Models\BachProduction;
use App\Models\Product;
use App\Models\Employee;
class BachProductionController extends Controller
{
        public function index() {
        $bachProductions = BachProduction::with('product,employee')->get();
        return view('bach_productions.index', compact('bachProductions'));
    }

    public function create() {
        $bachProductions = new BachProduction();
        $products = Product::all();
        $employees = Employee::all();
        return view('bach_productions.create', compact('bachProductions','products','employees'));
    }

    public function store(BachProductionRequest $request) {
        BachProduction::create($request->validated());
        return redirect()->route('bach_production.index')->with('success','el lote de producción se a registrado exitosamente.');
    }

    public function show(string $id) {
        $bachProductions = BachProduction::with('product,employee')->findOrFail($id);
        return view('bach_productions.show', compact('bachProductions'));
    }

    public function edit(string $id) {
        $bachProductions =  BachProduction::findOrFail( $id );
        $products = Product::all();
        $employees = Employee::all();
        return view('bach_productions.edit', compact('bachProductions','products','employees'));
    }

    public function update(BachProductionRequest $request, string $id) {
        $bachProductions = BachProduction::findOrFail( $id );
        $bachProductions->update($request->validated());
        return redirect()->route('bach_productions.index')->with('success','lote de prodccuión actualizado.');
    }

    public function destroy(string $id) {
        $bachProductions = BachProduction::findOrFail($id);
        $bachProductions->delete();
        return redirect()->route('bach_productions.index')->with('success',' lote de producción se eliminaron correctamente.');
    }
}
