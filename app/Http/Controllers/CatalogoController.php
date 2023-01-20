<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $catalogo = new Catalogo;
        $categoria = Categoria::pluck('nombre','id');
        return view('control.administrador.productos.catalogos.create', compact('catalogo','categoria')); 
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
        $catalogo = new Catalogo;
        $catalogo-> nombre = $request-> nombre;
        $catalogo-> categoria_id = $request-> categoria_id;
        $catalogo->save();
        return Redirect::route('control.administrador.productos.catalogos.index');
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
        return view('control.administrador.productos.catalogos.edit', compact('catalogo','categoria')); 
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
        $catalogo = Catalogo::findOrFail($id);
        $catalogo-> nombre = $request-> nombre;
        $catalogo-> categoria_id = $request-> categoria_id;
        $catalogo->update();
        return Redirect::route('control.administrador.productos.catalogos.index');
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
        $catalogo = Catalogo::findOrFail($id);
        $catalogo->delete();
        return Redirect::route('control.administrador.productos.catalogos.index');
    }
}
