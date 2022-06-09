@extends('layout')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Descricoes</h5>
      {{-- <a class="btn btn-primary" href="{{ route('descricoes.create')}}" >Registar Descricao</a> --}}

      @if ($message = Session::get('success'))
      <div class="alert alert-sucess">
        <strong><p>{{$message}}</p></strong>
      </div>
      @endif

      <!-- Table with stripped rows -->
      <table class="table datatable">
        <thead>
          <tr>
            {{-- <th scope="col">ID</th> --}}
            <th scope="col">Codigo</th>
            <th scope="col">Descricao</th>
            <th scope="col">Coeficiente</th>
            <th scope="col">Unidade</th>
            {{-- <th scope="col">Accao</th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ($descricoes as $descricao)
                <tr>            
                    {{-- <th scope="row">{{$descricao->id}}</th> --}}
                    <td>{{$descricao->codigo_item}}</td>
                    <td>{{$descricao->descricao}}</td>
                    <td>{{$descricao->coeficiente}}</td>
                    <td>{{$descricao->unidade}}</td>
                    <td>{{$descricao->accao}}</td>
                    {{-- <td>
                        <form action="{{route('descricoes.destroy', $descricao->id)}}" method="POST"></form>
                        <a class="btn btn-success" href="{{route('descricoes.show', $descricao->id)}}" >Mostrar</a>
                    </td> --}}
                </tr>    
            @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>


@endsection