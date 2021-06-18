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
            Cadastro de Clientes
        </label>

    </div>
    <div class="card mx-auto mt-5 p-10 " style="width: 70%;">
        <form method="post" id="formCadastro">
            <input type="hidden" value="{{ csrf_token() }}">
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    Nome *
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="datanascimento">Data de Nascimento</label>
                    Data de Nascimento *
                    <input class="datepicker form-control" id="datanascimento" name="datanascimento" required
                        data-date-format="mm/dd/yyyy">
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="sexo">Sexo</label>
                Sexo *
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="">SELECIONE</option>
                    <option value="M">MASCULINO</option>
                    <option value="F">FEMININO</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="cep">CEP</label>
                CEP
                <input type="text" onblur="consultaCep(this.value)" class="form-control" id="cep" name="cep">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="endereco">Endereço</label>
                    Endereço
                    <input type="text" name="endereco" id="endereco" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="estado">Estado</label>
                    Estado
                    <select id="estado" name="estado" class="form-control">
                        <option value="">Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    Cidade
                    <input type="text" class="form-control" name="cidade" id="cidade">
                </div>
                <div class="form-group col-md-2">
                    <label for="bairro">Bairro</label>
                    Bairro
                    <input type="text" class="form-control" name="bairro" id="bairro">
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Numero</label>
                    Número
                    <input type="text" class="form-control" name="numero" id="numero">
                </div>
                <div class="form-group col-md-6">
                    <label for="complemento">Complemento</label>
                    Complemento
                    <input type="text" class="form-control" name="complemento" id="complemento">
                </div>
            </div>

            <button type="button" onclick="cadastrar(0)" class="btn btn-success mt-3">Salvar</button>
        </form>
    </div>
</body>



</html>
