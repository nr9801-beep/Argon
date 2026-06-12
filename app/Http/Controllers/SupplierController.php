<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
        $supplier = Supplier::all();
        return view('Supplier.index', compact('supplier'));
    }

    public function create() {
        $supplier = new Supplier();
        return view('Supplier.create', compact('supplier'));
    }

    public function store(SupplierRequest $request) {
        Supplier::create($request->validated());
        return redirect()->route('suppliers.index')->with('success','Proveedor registrado exitosamente.');
    }

    public function show(string $id) {
        $supplier = Supplier::findOrFail($id);
        return view('Supplier.show', compact('supplier'));
    }

    public function edit(string $id) {
        $supplier = Supplier::findOrFail($id);
        return view('Supplier.edit', compact('supplier'));
    }

    public function update(SupplierRequest $request, string $id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->validated());
        return redirect()->route('Supplier.index')->with('success','Supplier actualizado.');
    }

    public function destroy(string $id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('Supplier.index')->with('success','Supplier eliminado correctamente.');
    }
}
