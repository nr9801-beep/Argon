<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTypeRequest;
use Illuminate\Http\Request;
use App\Models\UserType;

class UserTypeController extends Controller
{
    public function index() {
        $userType = UserType::all();
        return view('Usertype.index', compact('userType'));
    }

    public function create() {
        $userType = new UserType();
        return view('Usertype.create', compact('userType'));
    }

    public function store(UserTypeRequest $request) {
        UserType::create($request->validated());
        return redirect()->route('Usertype.index')->with('success',' el tipo de usuario se registrado exitosamente.');
    }

    public function show(string $id) {
        $userType = UserType::findOrFail($id);
        return view('Usertype.show', compact('userType'));
    }

    public function edit(string $id) {
        $userType = UserType::findOrFail($id);
        return view('Usertype.edit', compact('userType'));
    }

    public function update(UserTypeRequest $request, string $id) {
        $userType = UserType::findOrFail($id);
        $userType->update($request->validated());
        return redirect()->route('Usertype.index')->with('success','el tipo de usuario se actualizado.');
    }

    public function destroy(string $id) {
        $userType = UserType::findOrFail($id);
        $userType->delete();
        return redirect()->route('Usertype.index')->with('success','el tipo de susuario se  eliminado correctamente.');
    }
}
