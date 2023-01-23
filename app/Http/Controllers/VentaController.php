<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Mpago;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        //
        $ventas = Venta::all();
        return view('control.vendedor.ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $venta = new Venta();
        $cliente = Cliente::pluck('nombre', 'id');
        $mpago = Mpago::pluck('nombre', 'id');
        $user = User::pluck('name', 'id');
        return view('control.vendedor.ventas.create', compact('venta', 'cliente', 'mpago', 'user'));
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
        $venta = new Venta();
        $venta -> fecha = $request -> fecha;
        $venta->cliente_id = $request->cliente_id;
        $venta->mpago_id = $request->mpago_id;
        $venta->user_id = $request->user_id;
        $venta->total = $request->total;
        $venta->codComprobante = $request->codComprobante;
        $venta->tipoComprobante = $request->tipoComprobante;
        $venta->save();
        return Redirect::route('control.vendedor.ventas.index');
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
        $venta = Venta::findOrFail($id);
        $cliente = Cliente::pluck('nombre', 'id');
        $mpago = Mpago::pluck('nombre', 'id');
        $user = User::pluck('name', 'id');
        return view('control.vendedor.ventas.edit', compact('venta', 'cliente', 'mpago', 'user'));
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
        $venta = Venta::findOrFail($id);
        $venta -> fecha = $request -> fecha;
        $venta->cliente_id = $request->cliente_id;
        $venta->mpago_id = $request->mpago_id;
        $venta->user_id = $request->user_id;
        $venta->total = $request->total;
        $venta->codComprobante = $request->codComprobante;
        $venta->tipoComprobante = $request->tipoComprobante;
        $venta->update();
        return Redirect::route('control.vendedor.ventas.index');
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
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return Redirect::route('control.vendedor.ventas.index');
    }
}
