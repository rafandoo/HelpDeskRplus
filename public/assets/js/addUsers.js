/* Adding a new row to the table. */
$('#addUser').click(function(){
    var sector_id = $('#id').val();
    var user_id = $('#user_id').val();
    var user_name = $('#user_id option:selected').text();
    var table = $('#users');

    if (table.find('td:contains('+user_name+')').length != 0) {
        alert('Usuario já adicionado');
    } else if (sector_id == 0) {
        alert('Antes de adicionar um usuario, salve o setor');
    } else { 
        var tr = $('<tr class=align-middle></tr>');
        tr.append('<td id="user_id" value="'+user_id+'">'+user_id+'</td>');''
        tr.append('<td>'+user_name+'</td>');
        tr.append('<td class="text-center"><input type="checkbox" id="admin"></td>');
        tr.append('<td class="text-center"><a class="btn btn-outline-danger border rounded-circle" id="removeBtn" role="button" style="border-radius: 30px;border-width: 1px;"><i class="far fa-trash-alt"></i></a></td>')

        table.append(tr);
        
        $.ajax({
            url: '/sector/team',
            type: 'POST',
            data: {
                sector_id: sector_id,
                user_id: user_id
            }
        });
    }
});

/* A jQuery function that is used to bind an event handler to the "click" JavaScript event, or trigger
that event on an element. */
$(document).on('click', '#removeBtn', function(){
    $(this).closest('tr').remove();
    var sector_id = $('#id').val();
    var user_id = $(this).closest('tr').find('td:eq(0)').text();
    $.ajax({
        url: '/sector/team/'+sector_id+'/'+user_id,
        type: 'DELETE',
        success: function(data) {
            alert('Usuario removido com sucesso');
        }
    });
});

/* A jQuery function that is used to bind an event handler to the "click" JavaScript event, or trigger
that event on an element. */
$(document).on('click', '#admin', function(){
    var sector_id = $('#id').val();
    var user_id = $(this).closest('tr').find('td:eq(0)').text();
    var admin = $(this).is(':checked') ? 1 : 0;
    $.ajax({
        url: '/sector/team/'+sector_id+'/'+user_id,
        type: 'PUT',
        data: {
            admin: admin
        }
    });
});
