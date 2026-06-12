<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseDetailRequest;
use Illuminate\Http\Request;
use App\Models\PurchaseDetails;
use App\Models\Purchase;
use App\Models\Ingredient;
class PurchaseDetailController extends Controller
{
    public function index() {
        $purchaseDetails = PurchaseDetails::with('purchase,ingredient')->get();
        return view('purchase_details.index', compact('purchaseDetails'));
    }

    public function create() {
        $purchaseDetails = new PurchaseDetails();
        $purchases = Purchase::all();
        $ingredients = Ingredient::all();
        return view('purchase_details.create', compact('purchaseDetails','purchases','ingredients'));
    }

    public function store(PurchaseDetailRequest $request) {
        //PurchaseDetails::create($request->validated());
        $data = $request->validated();

        $data['subtotal'] =
        $data['quantity'] *
        $data['unit_price'];

        PurchaseDetails::create($data);
        return redirect()->route('purchase-Details.index')->with('success','el detalle de compra se a registrado exitosamente.');
    }

    public function show(string $id) {
        $purchaseDetail = PurchaseDetails::with('purchaseDetail,purchase')->findOrFail($id);
        return view('purchase_Details.show', compact('purchaseDetail'));
    }

    public function edit(string $id) {
        $purchaseDetail = PurchaseDetails::findOrFail( $id );
        $purchases = Purchase::all();
        $ingredients = Ingredient::all();
        return view('pruchaseDetails.edit', compact('purchaseDetail','purchases','ingredients'));
    }

    public function update(PurchaseDetailRequest $request, PurchaseDetails $purchaseDetail) {
        //$purchaseDetail = PurchaseDetails::findOrFail( $id );
        $data = $request->validated();

        $data['subtotal'] =
        $data['quantity'] *
        $data['unit_price'];

        $purchaseDetail->update($data);
        return redirect()->route('purchase-Details.index')->with('success','los detalles de compras actualizado.');
    }

    public function destroy(string $id) {
        $purchaseDetail = Purchase::findOrFail($id);
        $purchaseDetail->delete();
        return redirect()->route('purchase-Details.index')->with('success',' detalles de compras se eliminaron correctamente.');
    }
}
