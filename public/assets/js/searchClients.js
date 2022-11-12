/* A jQuery function that is called when the button is clicked. It gets the values of the filter and
search fields, and then it makes a GET request to the server. The server returns a JSON object,
which is then parsed and appended to the table. */
$('#searchButton').click(function() {
    let filter = document.getElementById('filter').value;
    let search = document.getElementById('search').value;
    if (search.length == 0) search = 'all';
    let url = "/client/" + filter + "/" + search;
    $.get(url, function (data) {
        $("#clients").empty();
        $.each(data, function (i, client) {
            if (client.active == 1) {
                let active = "Ativo";
            } else {
                let active = "Inativo";
            }
            let row = ("<tr onclick=\'selectClient(" + client.id + ", \" " + client.name + " \") ' style='cursor: pointer;'><td>" + client.id + "</td><td>" + client.name + "</td><td>" + client.cpf_cnpj + "</td><td>" + active +"</td></tr>");
            $("#clients").append(row);
        });
    });
});

/**
 * It takes two parameters, id and name, and sets the value of the input field with the id of client_id
 * to the value of the id parameter, and the value of the input field with the id of client to the
 * value of the name parameter. 
 * 
 * It then hides the modal.
 * @param id - the id of the client
 * @param name - The name of the input field
 */
function selectClient(id, name) {
    document.getElementById('client_id').value = id;
    document.getElementById('client').value = name;
    $('.modal').modal('hide'); 
}