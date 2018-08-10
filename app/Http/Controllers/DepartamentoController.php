<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
   
    public function index()
    {
        $departamentos = Departamento::all();
        return $departamentos;
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:departamentos'
        ]);
        
        Departamento::create($request->all());
        return;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:departamentos'
        ]);
    
        Departamento::find($id)->update($request->all());
        return;
    }

    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
    }
}
