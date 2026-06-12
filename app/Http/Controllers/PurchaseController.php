<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Employee;
class PurchaseController extends Controller
{
    public function index() {
        $purchases = Purchase::with('supplier,employee')->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create() {
        $purchases = new Purchase();
        $suppliers = Supplier::all();
        $employees = Employee::all();
        return view('purchases.create', compact('purchases','suppliers','employees'));
    }

    public function store(PurchaseRequest $request) {
        Purchase::create($request->validated());
        return redirect()->route('purchases.index')->with('success','las compras se a registrado exitosamente.');
    }

    public function show(string $id) {
        $purchase = Purchase::with('supplier,employee,purchaseDetaile')->findOrFail($id);
        return view('purchases.show', compact('purchase'));
    }

    public function edit(string $id) {
        $purchase = Purchase::findOrFail( $id );
        $suppliers = Supplier::all();
        $employees = Employee::all();
        return view('pruchases.edit', compact('purchase','suppliers','employees'));
    }

    public function update(PurchaseRequest $request, string $id) {
        $purchase = Purchase::findOrFail( $id );
        $purchase->update($request->validated());
        return redirect()->route('purchases.index')->with('success','compras actualizado.');
    }

    public function destroy(string $id) {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success',' las compras se eliminado correctamente.');
    }
}
