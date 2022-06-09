@extends('clientes.layout')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Registar Item</h5>
            <a class="btn btn-primary" href="{{route('itens.index')}}" >Voltar</a>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>whoops</strong>Existe um problema com os inputs<br><br>
                <ul>
                    @foreach ($$errors-all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Registo do trabalhador -->
            <form class="row g-3" action="{{route('itens.store')}}" method="POST" id="basic-form"  novalidate>
              @csrf

              <div class="col-md-12">
                <label for="" class="form-label"> Codigo </label>
                <input type="number" class="form-control" name='codigo' placeholder="codigo " id="" required>
              </div>
              <div class="col-md-12">
                <label for="" class="form-label"> Designacao </label>
                <input type="text" class="form-control" name='designacao' placeholder="designacao " id="" required>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Registar Item</button>
                <button type="reset" class="btn btn-secondary">Limpar todos campos</button>
              </div>
            </form><!-- End Multi Columns Form -->
            
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection