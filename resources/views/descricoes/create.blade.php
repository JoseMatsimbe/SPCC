@extends('layout')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registar Descricao</h5>
                        <a class="btn btn-primary" href="{{ route('descricoes.index') }}">Voltar</a>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>whoops</strong>Existe um problema com os inputs<br><br>
                                <ul>
                                    @foreach ($$errors - all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Registo do trabalhador -->
                        <form class="row g-3" action="{{ route('descricoes.store') }}" method="POST" id="basic-form"
                            novalidate>
                            @csrf

                            <div class="col-md-6">
                                <label for="" class="form-label"> Nome da descricao </label>
                                <input type="text" class="form-control" name='descricao' placeholder="descricao " id=""
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label"> Selecione o Item </label>
                                <select class="form-select" name='codigo_item' aria-label="Default select example">
                                    @foreach ($itens as $item)
                                        <option value="{{ $item->codigo }}">
                                            {{ $item->codigo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">Coeficiente</label>
                                <input type="text" class="form-control" name='coeficiente' placeholder="coeficiente" id=""
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Unidade</label>
                                <input type="text" class="form-control" name='unidade' placeholder="unidade" id=""
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registar Descricao</button>
                            <button type="reset" class="btn btn-secondary">Limpar todos campos</button>
                    </div>
                    </form><!-- End Multi Columns Form -->

                </div>
            </div>

        </div>
        </div>
    </section>


@endsection
