<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {
        $employee = Employee::all();
        return view('Employee.index', compact('employee'));
    }

    public function create() {
        $employee = new Employee();
        return view('Employee.create', compact('employee'));
    }

    public function store(EmployeeRequest $request) {
        Employee::create($request->validated());
        return redirect()->route('employees.index')->with('success','Empleado creado exitosamente.');
    }

    public function show(string $id) {
        $employee = Employee::findOrFail($id);
        return view('Employee.show', compact('employee'));
    }

    public function edit(string $id) {
        $employee = Employee::findOrFail($id);
        return view('Employee.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, string $id) {
        $employee = Employee::findOrFail($id);
        $employee->update($request->validated());
        return redirect()->route('Employee.index')->with('success','Employee actualizado.');
    }

    public function destroy(string $id) {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('Employee.index')->with('success','Employee eliminado correctamente.');
    }
}
