@extends('layout')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Registar Projecto</h5>
            <a class="btn btn-primary bi bi-skip-start-fill" href="{{route('projectos.index')}}" >  Voltar</a>
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
            <!-- Registo do Projeto -->
            <form class="row g-3" action="{{route('projectos.store')}}" method="POST" id="basic-form"  novalidate>
              @csrf

              <div class="col-md-6">
                <label for="" class="form-label"> Numero do projecto </label>
                <input type="number" class="form-control" name='numero_projecto' placeholder="Numero do projecto" id="" required>
              </div>
              <div class="col-md-6">
                <label for="" class="form-label"> Descricao </label>
                <input type="text" class="form-control" name='descricao' placeholder="Descricao do projecto" id="" required>
              </div>
              <div class="col-md-6">
                <label for="" class="form-label">Contratante</label>
                <input type="email" class="form-control" name='contratante' placeholder="Contratante" id="" required>
              </div>
              <div class="col-6">
                <label for="" class="form-label">Localizacao</label>
                <input type="text" class="form-control" name='localizacao' id="" placeholder="Localizacao" required>
              </div>
              <div class="col-6">
                <label for="" class="form-label">Prazo</label>
                <div class="inputState">
                  <input type="date" class="form-control" name="prazo" id="">
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary" href="">Registar projeto</button>
                <button type="reset" class="btn btn-secondary">Limpar todos campos</button>
              </div>
            </form>
            <!-- End Multi Columns Form -->
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection