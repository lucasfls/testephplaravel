<html>
<header>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Listagem de Clientes </title>
</header>
@section('style')
    <link href="../css/app.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.esm.min.js" integrity="undefined"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="undefined"
        crossorigin="anonymous"></script>
        <script src="../js/app.js"></script>
@show

<body>
    <div class="header-bar">
        <label>
            Listagem de Clientes
        </label>

    </div>
    <div>

    </div>
    <div class="card" style="width:80%; margin: 0 auto; margin-top:30px; padding:30px;">
        <div class="row mb-5">
            <div class="col col-md-6">
                <h2>Lista de Clientes</h2>
            </div>
            <div class="col col-md-6 " style="display: flex;align-items:center;justify-content:flex-end;">
                <a href="/cadastro" class="btn btn-success"> Cadastrar novo </a>    
            </div>
            
        </div>
        <div class="card" style="padding:30px;">
       
        <table id="tabelaClientes" class="table table-striped table-bordered" >
            <thead class='table-header'>
            <th>
                Nome
            </th>
            <th>
                Data Nascimento
            </th>
            <th>
                Sexo
            </th>
            <th>
                Endereço
            </th>
            <th>
                Opções
            </th>

        </thead>
        <tbody> 
            @forelse ($clientes as $cliente)
            <tr>
                <td> {{$cliente->nome}}</td>
                <td> {{date('d/m/Y',strtotime($cliente->data_nasc))}}</td>
                <td> {{$cliente->sexo=='M'?'Masculino':'Feminino'}}</td>
                <td><strong>Cep:</strong>     {{$cliente->cep}} <br> 
                    <strong>Endereço:</strong> {{$cliente->endereco}} - {{$cliente->numero}} <br>
                    <strong>Bairro:</strong> {{$cliente->bairro}}  <br>   
                    <strong>Cidade:</strong> {{$cliente->cidade}} - {{$cliente->estado}} <br>
                    <strong>Complemento:</strong> {{$cliente->complemento}} 
                </td>
                <td>
                    <a class='btn btn-primary' href="/editar/{{ $cliente->id }}" target="_blank">Editar</a>
                    <button class='btn btn-danger' onclick="excluir({{ $cliente->id }})">Excluir</button>
                </td>
            </tr>
        @empty
            <p>Nenhum cliente cadastrado</p>
        @endforelse
        </tbody>
        </table>
    </div>
    </div>


</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelaClientes').dataTable();
    });

</script>
</html>
