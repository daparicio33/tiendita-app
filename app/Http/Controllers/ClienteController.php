<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
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
        $clientes = Cliente::all();
        return view('control.vendedor.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cliente = new Cliente();
        return view('control.vendedor.clientes.create', compact('cliente'));
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
        try{
            DB::beginTransaction();
            $cliente = new Cliente();
            $cliente->nombre = $request->nombre;
            $cliente->dniRuc = $request->dniRuc;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->save();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.vendedor.clientes.index')
            ->with('error','ocurrió un error al intentar guardar los datos');
        }
        return Redirect::route('control.vendedor.clientes.index')
        ->with('info', 'los datos se guardaron correctamente');
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
        $cliente = Cliente::findOrFail($id);
        return view('control.vendedor.clientes.edit', compact('cliente'));
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
        try{
            DB::beginTransaction();
            $cliente = Cliente::findOrFail($id);
            $cliente->nombre = $request->nombre;
            $cliente->dniRuc = $request->dniRuc;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->update();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.vendedor.clientes.index')
            ->with('error','ocurrió un error al intentar guardar los datos');
        }
        return Redirect::route('control.vendedor.clientes.index')
        ->with('info', 'los datos se guardaron correctamente');
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
        try{
            DB::beginTransaction();
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.vendedor.clientes.index')
            ->with('error','ocurrió un error al intentar eliminar los datos');
        }
        return Redirect::route('control.vendedor.clientes.index')
        ->with('info', 'los datos se eliminaron correctamente');
    }
}
