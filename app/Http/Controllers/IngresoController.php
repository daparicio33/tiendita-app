<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ingresos = Compra::all();
        return view('control.compras.ingresos.index', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ingreso = new Compra();
        return view('control.compras.ingresos.create', compact('ingreso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ingreso = new Compra();
        $ingreso->fecha = $request->fecha;
        $ingreso->user_id = $request->user_id;
        $ingreso->proveedore_id = $request->proveedore->id;
        $ingreso->codComprobante = $request->codComprobante;
        $ingreso->tipoComprobante = $request->tipoComprobante;
        $ingreso->save();
        return Redirect::route('control.compras.ingresos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ingreso = Compra::findOrFail($id);
        return view('control.compras.ingresos.edit', compact('ingreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ingreso = Compra::findOrFaild($id);
        $ingreso->fecha = $request->fecha;
        $ingreso->user_id = $request->user_id;
        $ingreso->proveedore_id = $request->proveedore->id;
        $ingreso->codComprobante = $request->codComprobante;
        $ingreso->tipoComprobante = $request->tipoComprobante;
        $ingreso->update();
        return Redirect::route('control.compras.ingresos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ingreso = Compra::findOrFaild($id);
        $ingreso -> delete();
        return Redirect::route('control.compras.ingresos.index');
    }
}
