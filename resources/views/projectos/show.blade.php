@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Dados do Projecto</h5>


            <!-- Table with stripped rows -->
            <div>
                <div class="col-md-6">
                    <label class="form-label ">PROJECTO N. {{ $projecto->numero_projecto }}</label>
                </div>
                <label class="form-label">DESCRICAO: <span>{{ $projecto->descricao }}</span></label> <br>
                <label class="form-label">LOCALIZACAO: <span>{{ $projecto->localizacao }}</span></label> <br>

            </div>

            <!-- End Table with stripped rows -->

        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Capitulos do Projeto</h5>

            @if ($message = Session::get('success'))
                <div class="alert alert-sucess">
                    <strong>
                        <p>{{ $message }}</p>
                    </strong>
                </div>
            @endif
            <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        {{-- <th scope="col">codigo</th> --}}
                        <th scope="col">Designacao</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preco unitario</th>
                        <th scope="col">Preco Total</th>
                        {{-- <th scope="col">Accao</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($capitulos as $capitulo)
                        <td></td>
                        <td></td>
                        <td>Capitulo {{ $capitulo->nome }}</td>
                        <td></td>
                        <td></td>

                        @foreach ($capitulos as $capitulo)
                            <tr>
                                <td></td>
                                {{-- <td>{{ $capitulo->codigo }}</td> --}}
                                <td>{{ $capitulo->designacao }}</td>
                                <td>{{ $capitulo->quantidade }}</td>
                                <td>{{ $capitulo->preco_unitario }}</td>
                                <td>{{ $capitulo->preco_total }}</td>
                                {{-- <td>
                                    <form action="{{ route('capitulos.destroy', $capitulo->id) }}" method="POST">
                                        <a class="btn btn-success bi bi-eye btn-sm"
                                            href="{{ route('capitulos.show', $capitulo->id) }}"></a>
                                        <a class="btn btn-warning bi bi-pencil btn-sm"
                                            href="{{ route('capitulos.edit', $capitulo->id) }}"></a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger bi bi-trash-fill btn-sm"></button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registar Capitulo</h5>

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
                        <!-- Registo do Projecto -->
                        <form class="row g-3" action="{{ route('capitulos.store') }}" method="POST"
                            id="basic-form" novalidate>
                            @csrf

                            <div class="col-md-6">
                                <label for="" class="form-label"> Projecto {{ $projecto->nome }}</label>
                                <input type="text" id="projecto_id" class="form-control" name='projecto_id'
                                    placeholder="{{ $projecto->nome }}" value="{{ $projecto->numero_projecto }}"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="item" class="form-label">item</label>
                                <select class="form-select" name="codigo" id="item">
                                    <option hidden>Escolha o item</option>
                                    @foreach ($itens as $item)
                                        <option value="{{ $item->codigo }}">{{ $item->codigo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label"> Nome do Capitulo </label>
                                <input type="text" id="nome" class="form-control" name='nome' placeholder="Capituo"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label"> Codigo do Capitulo</label>
                                <input type="text" id="codigocap" class="form-control" name='codigocap' placeholder=" " required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label"> Designacao </label>
                                <input type="text" id="designacao" class="form-control" name='designacao'
                                    placeholder="designacao " required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label"> Designacao </label>
                                <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal"
                                    data-bs-target="#largeModal">Calcular
                                </button>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label"> Quantidade </label>
                                <input type="number" class="form-control" name='quantidade' placeholder="quantidade "
                                    id="quantidade" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label"> Preco unitario </label>
                                <input type="number" class="form-control" name='preco_unitario'
                                    placeholder="Preco unitario " id="preco_unitario" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Preco total</label>
                                <input type="number" class="form-control" name='preco_total' placeholder="Preco total"
                                    id="preco_total" required>
                            </div>


                            <!-- Large Modal -->
                            <div class="modal fade" id="largeModal" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Descricoes</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div name="descricao" id="descricao">
                                            </div>
                                            <div id="val" class="form-label">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" name="somar" id="somar"
                                                value="Somar" data-bs-dismiss="modal" data-bs-toggle="modal"
                                                data-bs-target="#largeModal2">Somar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  Modal-->


                            <!-- Large Modal -->

                            <div class="modal fade" id="largeModal2" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Despesas, atributos e lucros</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Despesa Inicial (D)</label>
                                                    <input type="number" class="form-control" name='di' placeholder=""
                                                        id="DI" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Administracao Local (AL)</label>
                                                    <input type="number" class="form-control" name='al' placeholder=""
                                                        id="AL" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Administracao Central(AC)</label>
                                                    <input type="number" class="form-control" name='ac' placeholder=""
                                                        id="AC" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Despesa Financeira (DF)</label>
                                                    <input type="number" class="form-control" name='df' placeholder=""
                                                        id="DF" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Despesa de manuntencao</label>
                                                    <input type="number" class="form-control" name='dm' placeholder=""
                                                        id="DM" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Outras Despesas</label>
                                                    <input type="number" class="form-control" name='d1' placeholder=""
                                                        id="OD1" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Outras Despesas</label>
                                                    <input type="number" class="form-control" name='d2' placeholder=""
                                                        idOD2 required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Outras Despesas</label>
                                                    <input type="number" class="form-control" name='d3' placeholder=""
                                                        id="OD3" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Outras Despesas</label>
                                                    <input type="number" class="form-control" name='d4' placeholder=""
                                                        id="OD4" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Iva</label>
                                                    <input type="number" class="form-control" name='iva' placeholder=""
                                                        id="IVA" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">IRPS</label>
                                                    <input type="number" class="form-control" name='irps' placeholder=""
                                                        id="IRPS" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Outros tributos 1</label>
                                                    <input type="number" class="form-control" name='' placeholder=""
                                                        id="OT1" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Outros tributos 2</label>
                                                    <input type="number" class="form-control" name='' placeholder=""
                                                        id="OT2" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Outros tributos 3</label>
                                                    <input type="number" class="form-control" name='' placeholder=""
                                                        id="OT3" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Outros tributos 4</label>
                                                    <input type="number" class="form-control" name='' placeholder=""
                                                        id="OT4" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Lucro Bruto</label>
                                                    <input type="number" class="form-control" name='' placeholder=""
                                                        id="LB" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label">Indutor de custo (K)</label>
                                                    <input type="number" class="form-control" name='' placeholder=""
                                                        id="K" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" name="somar" id="somar"
                                                value="Somar" data-bs-dismiss="modal">Somar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  Modal-->
                            <div>
                                <button type="submit" class="btn btn-primary" href="">Registar Capitulo</button>
                                <button type="reset" class="btn btn-secondary">Limpar todos campos</button>
                            </div>
                        </form>
                        <!-- End Multi Columns Form -->
                    </div>
                </div>

            </div>
        </div>
    </section>


    <script src={{ asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}></script>
    
    {{-- Script de seleciona Itens atravez da base de dados itens e faz set da designacao --}}
    <script>
        jQuery(document).ready(function() {
            jQuery('input').on('keyup', function() {
                if (jQuery(this).attr('name') === 'result') {
                    return false;
                }
                // K=(1+(DI+AL+AC+R+DF+DM))/((1/(1+L)+1/(1+T))-1)

                var DI = (jQuery('#DI').val() == '' ? "" : jQuery('#DI').val());
                var AL = (jQuery('#AL').val() == '' ? "" : jQuery('#AL').val());
                var AC = (jQuery('#AC').val() == '' ? "" : jQuery('#AC').val());
                var R =  (jQuery('#R').val() == '' ? "" : jQuery('#R').val());
                var DF = (jQuery('#DF').vDF() == '' ? "" : jQuery('#AL').val());
                var DM = (jQuery('#DM').val() == '' ? "" : jQuery('#DM').val());
                var L =  (jQuery('#L').val() == '' ? "" : jQuery('#L').val());
                var DI = (jQuery('#DI').val() == '' ? "" : jQuery('#DI').val());
                var DI = (jQuery('#K').val() == '' ? "" : jQuery('#K').val());
                var K =  (1+(parseInt(DI)+parseInt(AL)+parseInt(AC)+parseInt(R)+parseInt(DF)+parseInt(DM)))/((1/(1+parseInt(L))+1/(1+parseInt(T)))-1);
                jQuery('#K').val(K);

                var quantidade = (jQuery('#quantidade').val() == '' ? "" : jQuery('#quantidade').val());
                jQuery('#quantidade').val(quantidade);
                var preco_unitario = (jQuery('#preco_unitario').val() == '' ? "" : jQuery('#preco_unitario').val());
                jQuery('#preco_unitario').val(preco_unitario);
                var preco_total = (parseInt(quantidade) * parseInt(preco_unitario));
                jQuery('#preco_total').val(preco_total);


            });
        });
    </script>

    {{-- Script de seleciona Descricoes com  um certo atravez da base de dados itens e faz set dos dados da descriccao --}}
    <script>
        $(document).ready(function() {
            $('#item').on('change', function() {
                var itemI = $(this).val();
                if (itemI) {
                    $.ajax({
                        url: '/getDescricao/' + itemI,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#descricao').empty();
                                $('#descricao').append(
                                    '<div hidden>Choose descricao</div>');
                                $.each(data, function(key, descricao) {
                                    $('[name="descricao"]').append(
                                        '<table class="table"><thead><tr><th scope="col">Descricao</th><th scope="col">Unidade</th><th scope="col">Coeficiente</th><th scope="col">Preco</th></tr></thead><tbody><tr><td ' +
                                        key + '>' + descricao.descricao +
                                        '</td><td ' + key + '>' + descricao
                                        .unidade + '</td><td ' + key + '>' +
                                        descricao.coeficiente + '</td><td ' + key +
                                        '><fieldset id="campos"><input type="number" name="valor[]"  class="form-control" placeholder="Preco " ><fieldset id="campos"></td></tr></tbody></table>'
                                    );

                                    $("#val").val(
                                        '<input type="number" class="form-control" placeholder="Preco unitario" id="" >' +
                                        key + '</div>');
                                });
                            } else {
                                $('#descricao').empty();
                            }
                        }
                    });
                } else {
                    $('#descricao').empty();
                }
            });
        });
    </script>

    {{-- Script de seleciona Itens atravez da base de dados itens e faz set da designacao --}}
    <script>
        $(document).ready(function() {
            $('#item').on('change', function() {
                var itemID = $(this).val();
                if (itemID) {
                    $.ajax({
                        url: '/getItem/' + itemID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $.each(data, function(key, item) {
                                    $().append(
                                        '<option value="' + key + '">' + item
                                        .designacao + '</option>');
                                    $("#designacao").val(item.designacao);

                                });
                            } else {
                                $('#item').empty();
                            }
                        }
                    });
                } else {
                    $('#item').empty();
                }
            });
        });
    </script>

    {{-- Script de calcula a quantidade e soma os inputs das descricoes --}}
    <script type="text/javascript">
        function id(el) {
            return document.getElementById(el);
        }

        function soma() {
            var inputs = id('descricao').getElementsByTagName('input');

            var soma = 0;
            for (var i = 0; i < inputs.length; i++) {
                soma += parseInt(inputs[i].value);
            }
            id('preco_unitario').value = soma;
        }
        $(document).ready(window.onload = function() {
            id('somar').onclick = function() {
                soma();
            }
        });
    </script>
    {{-- <script>
            $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
    </script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

@endsection
