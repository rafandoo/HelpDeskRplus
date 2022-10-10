$('#searchButton').click(function() {
    console.log('keyup');
    var filter = document.getElementById('filter').value;
    var search = document.getElementById('search').value;
    var url = "/client/" + filter + "/" + search;
    $.get(url, function (data) {
        $("#clients").empty();
        $.each(data, function (i, client) {
            $("#clients")
            .append("<tr><td>" + client.id + "</td><td>" + client.name + "</td><td>" + client.cpf_cnpj + "</td><td>" + client.active + "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalClient' onclick='selectClient(" + client.id + ", " + client.name + ")'>Selecionar</button></td></tr>");
        });
    });
});
