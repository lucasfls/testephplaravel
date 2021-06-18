require('./bootstrap');


$(document).ready(function () {

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR'
    });
    $(document).ready(function () {
        $('#cep').mask('00000-000');
    });

    $(document).ready(function () {
        $('#datanascimento').mask('00/00/0000');
    });
});

consultaCep = (cep) => {
    var url = "https://viacep.com.br/ws/" + cep + "/json/";
    $.get(url, function (data) {
        if (data) {

            $('#endereco').val(data.logradouro)
            $('#bairro').val(data.bairro)
            $('#estado').val(data.uf)
            $('#cidade').val(data.localidade)
            $('#numero').focus();
        }
    });
}

validar = () => {
    var nome = $('#nome').val();
    var dataNasc = $('#datanascimento').val();
    var sexo = $('#sexo').val();
    var erros = "";

    if (nome.length < 3) {
        erros = erros + "O nome precisa ter pelo menos 3 letras. \n";
    }

    if (dataNasc.length <= 0) {
        erros = erros + "Data de nascimento obrigatória. \n";
    }

    if (sexo.length <= 0) {
        erros = erros + "Sexo é obrigatório. \n";
    }
    return erros;
}
cadastrar = (id) => {
    var rota = "/cadastro";
    var erros = validar();
    if (erros.length > 0) {
        alert(erros);
        return;
    }
    if (id > 0) {
        rota = "/update/"+id;
    }
    var data = $("#formCadastro").serializeArray();
    $.ajax({
        type: 'POST',
        url: rota,
        data: data,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data) {
            var result = JSON.parse(data);

            alert(result.message);
            location.replace("/");

        }
    });
}

excluir = (id)=>{
    if(id>0)
    {
        if (confirm("Deseja excluir este cliente?") == true) {
            var rota="/delete/"+id;
            var data=[];
            $.ajax({
                type: 'POST',
                url: rota,
                data: data,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    var result = JSON.parse(data);
        
                    alert(result.message);
                    location.replace("/");
        
                }
            });
        } 
    }


}