<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
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
        $categorias = Categoria::all();
        return view('control.administrador.productos.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoria = new Categoria();
        return view('control.administrador.productos.categorias.create', compact('categoria'));
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
            $categoria = new Categoria();
            $categoria->nombre = $request->nombre;
            $categoria->save();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.productos.categorias.index')
            ->with('error','ocurrió un error al intentar guardar los datos');
        }
        return Redirect::route('control.administrador.productos.categorias.index')
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
        $categoria = Categoria::findOrFail($id);
        return view('control.administrador.productos.categorias.edit', compact('categoria'));
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
            $categoria = Categoria::findOrFail($id);
            $categoria ->nombre = $request->nombre;
            $categoria -> update();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.productos.categorias.index')
            ->with('error','ocurrió un error al intentar actualizar los datos');
        }
        return Redirect::route('control.administrador.productos.categorias.index')
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
            $categoria = Categoria::findOrFail($id);
            $categoria ->delete();
            DB::commit();
        } catch (\Throwable $th){
            //throw $th;
            DB::rollBack();
            return Redirect::route('control.administrador.productos.categorias.index')
            ->with('error','ocurrió un error al intentar eliminar los datos');
        }
        return Redirect::route('control.administrador.productos.categorias.index')
        ->with('info', 'los datos se eliminaron correctamente');
    }
}
