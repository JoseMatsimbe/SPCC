<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecto;
use App\Models\Capitulo;
use App\Models\Item;
use App\Models\Descricao;

class ProjectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectos = Projecto::latest()->paginate(5);
        return view('projectos.index', compact('projectos'))->with(request()->input('page'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectos = Projecto::latest()->paginate(5);
        return view('projectos.create', compact('projectos'))->with(request()->input('page'));

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
                'numero_projecto'=>'required',
                'descricao'=>'required',
                'contratante'=>'required',
                'localizacao'=>'required',
                'prazo'=>'required'
            ]);
    
            Projecto::create($request->all());
            return redirect()->route('projectos.index')->with('success','projecto criado com sucesso');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Projecto $projecto, Item $itens)
    {
        $itens = Item::all();
        // $itens = Item::where('codigocap', $item->codigo)->get();

        $descricoes = Descricao::all();
        $capitulos = Capitulo::where('projecto_id', $projecto->id)->get();
        return view('projectos.show', compact('projecto','itens','descricoes','capitulos'));  

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Projecto $projecto)
    {
        return view('projectos.edit', compact('projecto'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projecto $projecto)
    {
        $request->validate([
            'numero_projecto'=>'required',
            'descricao'=>'required',
            'contratante'=>'required',
            'localizacao'=>'required',
            'prazo'=>'required'
        ]);
        $projecto->update($request->all());
        return redirect()->route('projectos.index')->with('success','Actualizado criado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projecto $projecto)
    {
        $projecto->delete();

        return redirect()->route('projectos.index')->with('success','projecto Eiminado com sucesso');

    }
}
