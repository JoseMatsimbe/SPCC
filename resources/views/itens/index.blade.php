@extends('layout')

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">itens</h5>
      {{-- <a class="btn btn-primary" href="{{ route('itens.create')}}" >Registar Item</a> --}}

      @if ($message = Session::get('success'))
      <div class="alert alert-sucess">
        <strong><p>{{$message}}</p></strong>
      </div>
      @endif

      <!-- Table with stripped rows -->
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Codigo</th>
            <th scope="col">Designacao</th>
            {{-- <th scope="col">Accao</th> --}}
          </tr>
        </thead>
        <tbody>
            @foreach ($itens as $item)
                <tr>            
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->designacao}}</td>
                    {{-- <td>
                      <form action="{{route('itens.destroy', $item->id)}}" method="POST">
                        <a class="btn btn-success btn-sm" href="{{route('itens.show', $item->id)}}" ></a>
                      </form>
                    </td> --}}
                </tr>    
            @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>

@endsection