<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProveedoreController extends Controller
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
        $proveedores = Proveedore::all();
        return view('control.administrador.compras.proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedore = new Proveedore();
        return view('control.administrador.compras.proveedores.create', compact('proveedore'));
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
            $proveedore = new Proveedore();
            $proveedore->nombre = $request->nombre;
            $proveedore->Ruc = $request->Ruc;
            $proveedore->contacto = $request->contacto;
            $proveedore->direccion = $request->direccion;
            $proveedore->telefono = $request->telefono;
            $proveedore->save();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.compras.proveedores.index')
            ->with('error','ocurrió un error al intentar guardar los datos');
        }
        return Redirect::route('control.administrador.compras.proveedores.index')
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
        $proveedore = Proveedore::findOrFail($id);
        return view('control.administrador.compras.proveedores.edit', compact('proveedore'));
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
            $proveedore = Proveedore::findOrFail($id);
            $proveedore->nombre = $request->nombre;
            $proveedore->Ruc = $request->Ruc;
            $proveedore->contacto = $request->contacto;
            $proveedore->direccion = $request->direccion;
            $proveedore->telefono = $request->telefono;
            $proveedore->update();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.compras.proveedores.index')
            ->with('error','ocurrió un error al intentar actualizar los datos');
        }
        return Redirect::route('control.administrador.compras.proveedores.index')
        ->with('info', 'los datos se actualizaron correctamente');
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
            $proveedore = Proveedore::findOrFail($id);
            $proveedore->delete();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.compras.proveedores.index')
            ->with('error','ocurrió un error al intentar actualizar los datos');
        }
        return Redirect::route('control.administrador.compras.proveedores.index')
        ->with('info', 'los datos se actualizaron correctamente');
    }
}
