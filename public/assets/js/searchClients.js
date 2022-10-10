/* A jQuery function that is called when the button is clicked. It gets the values of the filter and
search fields, and then it makes a GET request to the server. The server returns a JSON object,
which is then parsed and appended to the table. */
$('#searchButton').click(function() {
    console.log('keyup');
    var filter = document.getElementById('filter').value;
    var search = document.getElementById('search').value;
    if (search.length == 0) search = 'all';
    var url = "/client/" + filter + "/" + search;
    $.get(url, function (data) {
        $.each(data, function (i, client) {
            if (client.active == 1) {
                var active = "Ativo";
            } else {
                var active = "Inativo";
            }
            var row = ("<tr><td>" + client.id + "</td><td>" + client.name + "</td><td>" + client.cpf_cnpj + "</td><td>" + active +"</td></tr>");
            $("#clients").append(row);
        });
    });
});
