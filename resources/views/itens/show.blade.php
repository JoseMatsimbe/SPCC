@extends('clientes.layout')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Itens</h5>
      <a class="btn btn-primary" href="{{ route('itens.index')}}" >Voltar</a>

      @if ($message = Session::get('success'))
      <div class="alert alert-sucess">
        <strong><p>{{$message}}</p></strong>
      </div>
      @endif

      <!-- Table with stripped rows -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
                <tr>            
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->designacao}}</td>
                </tr>    
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
@endsection