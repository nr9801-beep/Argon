<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitMeasureRequest;
use Illuminate\Http\Request;
use App\Models\UnitMeasure;

class UnitMeasureController extends Controller
{
    public function index() {
        $unitMeasure = UnitMeasure::all();
        return view('unit-measure.index', compact('unitMeasure'));
    }

    public function create() {
        $unitMeasure = new UnitMeasure();
        return view('unit-measure.create', compact('unitMeasure'));
    }

    public function store(UnitMeasureRequest $request) {
        UnitMeasure::create($request->validated());
        return redirect()->route('unit-measure.index')->with('success',' La unidad de medida se registrado exitosamente.');
    }

    public function show(string $id) {
        $unitMeasure = UnitMeasure::findOrFail($id);
        return view('unit-measure.show', compact('unitMeasure'));
    }

    public function edit(string $id) {
        $unitMeasure = UnitMeasure::findOrFail($id);
        return view('unit-measure.edit', compact('unitMeasure'));
    }

    public function update(UnitMeasureRequest $request, string $id) {
        $unitMeasure = UnitMeasure::findOrFail($id);
        $unitMeasure->update($request->validated());
        return redirect()->route('unit-measure.index')->with('success','unidad de medida actualizado.');
    }

    public function destroy(string $id) {
        $unitMeasure = UnitMeasure::findOrFail($id);
        $unitMeasure->delete();
        return redirect()->route('unit-measure.index')->with('success','unidad de media eliminado correctamente.');
    }
}
