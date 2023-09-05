$(function() {
    

});

function Cancelar(route, id) {
    if (confirm('Deseja cancelar este registro ?')) {
        $.ajax({
            url:route,
            method:'DELETE',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: id,
            },
            beforeSend: function() {
                $.blockUI({
                       message: 'Carregando...',
                       timeout:2000,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.success == true) {
                window.location.reload();
            } else {
                alert('Falha no cancelamento do registro!');
            }
        }).fail(function (data) {
            $.unblockUI();
            alert('Não foi possível buscar os dados');
        });
    }
}

function Habilitar(route, id) {
    if (confirm('Deseja habilitar este registro ?')) {
        $.ajax({
            url:route,
            method:'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: id,
            },
            beforeSend: function() {
                $.blockUI({
                       message: 'Carregando...',
                       timeout:2000,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            if (data.success == true) {
                window.location.reload();
            } else {
                alert('Falha ao habilitar registro!');
            }
        }).fail(function (data) {
            $.unblockUI();
            alert('Não foi possível buscar os dados');
        });
    }
}

$("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                if (!("erro" in dados)) {
                    $("#rua").val(dados.logradouro.toUpperCase());
                    $("#bairro").val(dados.bairro.toUpperCase());
                    $("#cidade").val(dados.localidade.toUpperCase());
                    $("#uf").val(dados.uf.toUpperCase());
                }
                else {
                    alert("CEP não encontrado de forma automatizado digite manualmente ou tente novamente.");
                }
            });
        }
    }
});