@extends('layout')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Gestao dos projectos</h5>
      <a class="btn btn-primary bi bi-person-plus-fill" href="{{ route('projectos.create')}}" >  Registar projecto</a>

      @if ($message = Session::get('success'))
      <div class="alert alert-sucess">
        <strong><p>{{$message}}</p></strong>
      </div>
      @endif

      <!-- Table with stripped rows -->
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">Numero</th>
            <th scope="col">Descricao</th>
            <th scope="col">Contratante</th>
            <th scope="col">localizacao</th>
            <th scope="col">prazo</th>
            <th scope="col">Accao</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projectos as $projecto)
                <tr>            
                    <th scope="row">{{$projecto->numero_projecto}}</th>
                    <td>{{$projecto->descricao}}</td>
                    <td>{{$projecto->contratante}}</td>
                    <td>{{$projecto->localizacao}}</td>
                    <td>{{$projecto->prazo}}</td>
                    <td>
                      <form action="{{route('projectos.destroy', $projecto->id)}}" method="POST">
                      <a class="btn btn-success bi bi-eye btn-sm" href="{{route('projectos.show', $projecto->id)}}" ></a>
                      <a class="btn btn-warning bi-pencil btn-sm" href="{{route('projectos.edit', $projecto->id)}}" ></a>
                    @csrf
                    @method('DELETE') 
                    <button class="btn btn-danger bi bi-trash-fill btn-sm" ></button> 
                    </form>
                    </td>
                </tr>    
            @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
@endsection