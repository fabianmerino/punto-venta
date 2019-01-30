<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Barryvdh\DomPDF\Facade as PDF;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('pages.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.clientes.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClienteRequest $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreClienteRequest $request)
    {
        $folio = Cliente::all()->max('folio');
        $request->merge([
            'folio' =>  $folio == null ? 1 : $folio + 1,
            'deuda_actual' => 0,
//            'deuda_actual' => $request->input('limite_credito') == 0 ? null : $request->input('limite_credito'),
        ]);
//        dd($request->all());
        $cliente = Cliente::withTrashed()->updateOrCreate(['dni' => $request->input('dni')],$request->all());
        $cliente->restore();
        swal()->position('top')
            ->success('Se creó nuevo cliente con el número: '.($cliente->folio), '',
                [
                    'showConfirmButton' => false,
                    'showCloseButton' => true,
                ]);
        return redirect()->route('clientes.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('pages.clientes.estado-cuenta', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $cliente->limite_credito = number_format($cliente->limite_credito, 2);
        return view('pages.clientes.edit', compact('cliente'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClienteRequest $request
     * @param  \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
//        dd($request->all(), $cliente);
        $limiteActual = $request->input('limite_credito');
        $saldoAnterior = $cliente->deuda_actual;
        if ($limiteActual < $saldoAnterior){
            swal()->toast()->error('','El Límite de credito ingresado S/ '.number_format($limiteActual, 2).' es menor a la deuda actual del cliente: S/ '.number_format($saldoAnterior, 2), ['showCloseButton' => false]);
            return redirect()->back();
        }
        
        $ncliente = Cliente::find($cliente->id);
        $ncliente->update($request->all());
        $ncliente->save();
        swal()->position('top')->toast()->autoclose(1500)->success('','Cliente modificado con éxito!', ['showConfirmButton' => false, 'showCloseButton' => false]);
        return redirect()->route('clientes.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Cliente $cliente)
    {
        if ($cliente->deuda_actual > 0){
            swal()->error('Error!', 'NO es posible eliminar el registro, cliente tiene deuda pendiente de: S/'.$cliente->deuda_actual, ['showCloseButton' => false]);
            return redirect()->route('clientes.index');
        }
        $cliente->delete();
        swal()->position('top')->toast()->autoclose(1500)->message('','Cliente eliminado con éxito!','success', ['showConfirmButton' => false, 'showCloseButton' => false]);
        return redirect()->route('clientes.index');
    }
    
    /**
     * Muestra el reporte de saldos de los clientes.
     *
     * @return \Illuminate\Http\Response
     */
    public function saldos()
    {
        $clientes = Cliente::all();
        return view('pages.clientes.saldos', compact('clientes'));
    }
    /**
     * Imprime el reporte de saldos de los clientes.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfsaldos()
    {
        $clientes = Cliente::all();
        $pdf = PDF::loadView('pages.clientes.pdfsaldos', compact('clientes'))->setPaper('a4', 'landscape');
        return $pdf->download('listado-saldos.pdf');
    }
}
