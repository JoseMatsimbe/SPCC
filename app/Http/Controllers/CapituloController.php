<?php

namespace App\Http\Controllers;

use App\Models\Projecto;
use App\Models\Capitulo;
use App\Models\Item;
use App\Models\Descricao;
use Illuminate\Http\Request;

class CapituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capitulos = Capitulo::latest()->paginate(5);
        return view('capitulos.show', compact('capitulos'))->with(request()->input('page'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $capitulos = Capitulo::latest()->paginate(5);
        return view('capitulos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'projecto_id'=>'required',
            'codigo'=>'required',
            'codigocap'=>'required',
            'designacao'=>'required',
            'quantidade'=>'required',
            'preco_unitario'=>'required',
            'preco_total'=>'required'
        ]);
        Capitulo::create($request->all());
        return redirect()->route('projectos.show', $projecto_id=$request->projecto_id)->with('success','capitulo criado com sucesso');

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
    }
}
