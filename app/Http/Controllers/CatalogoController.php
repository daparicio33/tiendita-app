<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CatalogoController extends Controller
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
        $catalogos = Catalogo::all();
        return view('control.administrador.productos.catalogos.index', compact('catalogos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $catalogo = new Catalogo();
        $categoria = Categoria::pluck('nombre','id');
        return view('control.administrador.productos.catalogos.create', compact('catalogo', 'categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $catalogo = new Catalogo();
            $catalogo->nombre = $request->nombre;
            $catalogo->precio = $request->precio;
            $catalogo->categoria_id = $request->categoria_id;
            $catalogo->save();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.productos.catalogos.create')
            ->with('error','ocurrió un error al intentar guardar los datos');
        }
        return Redirect::route('control.administrador.productos.catalogos.index')
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
        $catalogo = Catalogo::findOrFail($id);
        $categoria = Categoria::pluck('nombre','id');
        return view('control.administrador.productos.catalogos.edit', compact('catalogo', 'categoria'));
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
            $catalogo = Catalogo::findOrFail($id);
            $catalogo->nombre = $request->nombre;
            $catalogo->precio = $request->precio;
            $catalogo->categoria_id = $request->categoria_id;
            $catalogo->update();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.productos.catalogos.index')
            ->with('error','ocurrió un error al intentar actualizar los datos');
        }
        return Redirect::route('control.administrador.productos.catalogos.index')
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
            $catalogo = Catalogo::findOrFail($id);
            $catalogo->delete();
        } catch (\Throwable $th){
            //throw $th;
            return Redirect::route('control.administrador.productos.catalogos.index')
            ->with('error','ocurrió un error al intentar actualizar los datos');
        }
        return Redirect::route('control.administrador.productos.catalogos.index')
        ->with('info', 'los datos se eliminaron correctamente');;
    }
}
