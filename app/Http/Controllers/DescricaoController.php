<?php

namespace App\Http\Controllers;

use App\Models\Projecto;
use App\Models\Capitulo;
use App\Models\Item;
use App\Models\Descricao;
use Illuminate\Http\Request;

class DescricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descricoes = Descricao::latest()->paginate(5);
        return view('descricoes.index', compact('descricoes'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $descricoes = Descricao::with('item')->get();
        $itens = Item::all();

        return view('descricoes.create', compact('descricoes', 'itens'));

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
            'descricao'=>'required',
            'codigo_item'=>'required',
            'coeficiente'=>'required',
            'unidade'=>'required'
        ]);
        Descricao::create($request->all());
        return redirect()->route('descricoes.index')->with('success','Descricao criado com sucesso');

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
