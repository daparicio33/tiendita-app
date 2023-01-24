<?php

namespace App\Http\Controllers;

use App\Models\Mpago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TpagoController extends Controller
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
        $mpagos = Mpago::all();
        return view('control.administrador.tipospago.index', compact('mpagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mpago = new Mpago();
        return view('control.administrador.tipospago.create', compact('mpago'));
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
            $mpago = new Mpago();
            $mpago->nombre = $request->nombre;
            $mpago->save();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.tipospago.index')
            ->with('error','ocurrió un error al intentar guardar los datos');
        }
        return Redirect::route('control.administrador.tipospago.index')
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
        $mpago = Mpago::findOrFail($id);
        return view('control.administrador.tipospago.edit', compact('mpago'));
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
            $mpago = Mpago::findOrFail($id);
            $mpago->nombre = $request->nombre;
            $mpago->update();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.tipospago.index')
            ->with('error','ocurrió un error al intentar actualizar los datos');
        }
        return Redirect::route('control.administrador.tipospago.index')
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
            $mpago = Mpago::findOrFail($id);
            $mpago->delete();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.tipospago.index')
            ->with('error','ocurrió un error al intentar eliminar los datos');
        }
        return Redirect::route('control.administrador.tipospago.index')
        ->with('info', 'los datos se eliminaron correctamente');
    }
}
