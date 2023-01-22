<?php

namespace App\Http\Controllers;

use App\Models\Mpago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TpagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mpagos = Mpago::all();
        return view('control.tipospago.index', compact('mpagos'));
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
        return view('control.tipospago.create', compact('mpago'));
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
        $mpago = new Mpago();
        $mpago->nombre = $request->nombre;
        $mpago->save();
        return Redirect::route('control.tipospago.index');
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
        return view('control.tipospago.edit', compact('mpago'));
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
        $mpago = Mpago::findOrFail($id);
        $mpago->nombre = $request->nombre;
        $mpago->update();
        return Redirect::route('control.tipospago.index');
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
        $mpago = Mpago::findOrFail($id);
        $mpago->delete();
        return Redirect::route('control.tipospago.index');
    }
}
