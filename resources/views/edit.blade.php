<html>
<header>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Cadastro de Clientes </title>
</header>
@section('style')
    <link href="../css/app.css" rel="stylesheet" />
    <link href="" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js">
        < / <
        script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.esm.min.js" >

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/app.js"></script>

@show

<body>
    <div class="header-bar">
        <label>
            Editar Cliente
        </label>

    </div>
    <div class="card mx-auto mt-5 p-10 " style="width: 70%;">
        <form method="post" id="formCadastro">
            <input type="hidden" value="{{ csrf_token() }}">
            <input type="hidden" id="id" name="id" value="{{ $cliente&&$cliente->id>0?$cliente->id:0 }}">
            <div class="form-row">
                <div class="form-group col-md-4">
                    Nome *
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $cliente&&$cliente->nome?$cliente->nome:0 }} " required>
                </div>
                <div class="form-group col-md-3">
                    <label for="datanascimento">Data de Nascimento</label>
                    Data de Nascimento *
                    <input class="datepicker form-control" id="datanascimento" value="{{ $cliente&&$cliente->data_nasc? date('d/m/Y',strtotime($cliente->data_nasc)) :0 }}" name="datanascimento" required
                        data-date-format="mm/dd/yyyy">
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="sexo">Sexo</label>
                Sexo *
                <select class="form-control" id="sexo" name="sexo"  required>
                    <option value="">SELECIONE</option>
                    <option value="M" {{ $cliente&&$cliente->sexo=='M'?'selected':'' }}>MASCULINO</option>
                    <option value="F" {{ $cliente&&$cliente->sexo=='F' ? 'selected':'' }} >FEMININO</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="cep">CEP</label>
                CEP
                <input type="text" value="{{ $cliente&&$cliente->cep?$cliente->cep:'' }} " onblur="consultaCep(this.value)" class="form-control" id="cep" name="cep">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="endereco">Endereço</label>
                    Endereço
                    <input type="text" value="{{ $cliente&&$cliente->endereco?$cliente->endereco:'' }} " name="endereco" id="endereco" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="estado">Estado</label>
                    Estado
                    <select id="estado" name="estado" class="form-control">
                        <option value="">Selecione</option>
                        <option value="AC" {{$cliente&&$cliente->estado=='AC'?'selected':''}}>Acre</option>
                        <option value="AL" {{$cliente&&$cliente->estado=='AL'?'selected':''}}>Alagoas</option>
                        <option value="AP" {{$cliente&&$cliente->estado=='AP'?'selected':''}}>Amapá</option>
                        <option value="AM" {{$cliente&&$cliente->estado=='AM'?'selected':''}}>Amazonas</option>
                        <option value="BA" {{$cliente&&$cliente->estado=='BA'?'selected':''}}>Bahia</option>
                        <option value="CE" {{$cliente&&$cliente->estado=='CE'?'selected':''}}>Ceará</option>
                        <option value="DF" {{$cliente&&$cliente->estado=='DF'?'selected':''}}>Distrito Federal</option>
                        <option value="ES" {{$cliente&&$cliente->estado=='ES'?'selected':''}}>Espírito Santo</option>
                        <option value="GO" {{$cliente&&$cliente->estado=='GO'?'selected':''}}>Goiás</option>
                        <option value="MA" {{$cliente&&$cliente->estado=='MA'?'selected':''}}>Maranhão</option>
                        <option value="MT" {{$cliente&&$cliente->estado=='MT'?'selected':''}}>Mato Grosso</option>
                        <option value="MS" {{$cliente&&$cliente->estado=='MS'?'selected':''}}>Mato Grosso do Sul</option>
                        <option value="MG" {{$cliente&&$cliente->estado=='MG'?'selected':''}}>Minas Gerais</option>
                        <option value="PA" {{$cliente&&$cliente->estado=='PA'?'selected':''}}>Pará</option>
                        <option value="PB" {{$cliente&&$cliente->estado=='PB'?'selected':''}} >Paraíba</option>
                        <option value="PR" {{$cliente&&$cliente->estado=='PR'?'selected':''}} >Paraná</option>
                        <option value="PE" {{$cliente&&$cliente->estado=='PE'?'selected':''}} >Pernambuco</option>
                        <option value="PI" {{$cliente&&$cliente->estado=='PI'?'selected':''}} >Piauí</option>
                        <option value="RJ" {{$cliente&&$cliente->estado=='RJ'?'selected':''}} >Rio de Janeiro</option>
                        <option value="RN" {{$cliente&&$cliente->estado=='RN'?'selected':''}} >Rio Grande do Norte</option>
                        <option value="RS" {{$cliente&&$cliente->estado=='RS'?'selected':''}} >Rio Grande do Sul</option>
                        <option value="RO" {{$cliente&&$cliente->estado=='RO'?'selected':''}} >Rondônia</option>
                        <option value="RR" {{$cliente&&$cliente->estado=='RR'?'selected':''}} >Roraima</option>
                        <option value="SC" {{$cliente&&$cliente->estado=='SC'?'selected':''}} >Santa Catarina</option>
                        <option value="SP" {{$cliente&&$cliente->estado=='SP'?'selected':''}} >São Paulo</option>
                        <option value="SE" {{$cliente&&$cliente->estado=='SE'?'selected':''}} >Sergipe</option>
                        <option value="TO" {{$cliente&&$cliente->estado=='TO'?'selected':''}} >Tocantins</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    Cidade
                    <input type="text" class="form-control" value="{{ $cliente&&$cliente->cidade?$cliente->cidade:'' }} " name="cidade" id="cidade">
                </div>
                <div class="form-group col-md-2">
                    <label for="bairro">Bairro</label>
                    Bairro
                    <input type="text" class="form-control" name="bairro" value="{{ $cliente&&$cliente->bairro?$cliente->bairro:'' }} " id="bairro">
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Numero</label>
                    Número
                    <input type="text" class="form-control"  value="{{ $cliente&&$cliente->numero?$cliente->numero:'' }} " name="numero" id="numero">
                </div>
                <div class="form-group col-md-6">
                    <label for="complemento">Complemento</label>
                    Complemento
                    <input type="text" class="form-control" name="complemento" value="{{ $cliente&&$cliente->complemento?$cliente->complemento:'' }} " id="complemento">
                </div>
            </div>

            <button type="button" onclick="cadastrar({{$cliente&&$cliente->id>0?$cliente->id:0}})" class="btn btn-success mt-3">Salvar</button>
        </form>
    </div>
</body>



</html>
