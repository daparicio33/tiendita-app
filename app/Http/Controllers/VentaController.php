<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Cliente;
use App\Models\Mpago;
use App\Models\Vdetalle;
use App\Models\Venta;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function create(Request $request)
    {
        //
        $comprobante = ["Boleta", "Factura"];
        $cliente = null;
        if($request->search_dni){
            $cliente = Cliente::where('dniRuc','=',$request->search_dni)->first();
            $cliente->nombre;
        }
/*         dd($cliente); */
        $searchText = $request->searchText;
        $venta = new Venta();
        $mpago = Mpago::pluck('nombre', 'id');
        $catalogos = Catalogo::orderBy('nombre','asc')
        ->get();
        return view('control.vendedor.ventas.create', compact('venta','cliente', 'mpago', 'searchText', 'catalogos', 'comprobante'));
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
       /*  dd($request); */
        try {
            DB::beginTransaction();
            $venta = new Venta();
            $venta -> fecha = $request -> fecha;
            $venta->cliente_id = $request->cliente_id;
            $venta->mpago_id = $request->mpago_id;
            $venta->total = $request->total;
            $venta->codComprobante = $request->codComprobante;
            $venta->tipoComprobante = $request->tipoComprobante;
            $venta->save();
            $vdetalle = new Vdetalle();
            $vdetalle -> venta_id = $request -> venta_id;
            $vdetalle -> catalogo_id = $request -> catalogo_id;
            $vdetalle -> cantidad = $request -> cantidad;
            $vdetalle -> precio_id = $request -> precio;
            $vdetalle -> save();
            $catalogo = Catalogo::findOrFail($request->catalogo_id);
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        return Redirect::route('control.vendedor.ventas.index')
        ->with('error','ocurrió un error al intentar guardar los datos');
        }
        return Redirect::route('control.vendedor.ventas.index')
        ->with('info','los datos se guardaron correctamente');
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
