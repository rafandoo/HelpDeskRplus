/* Adding a new row to the table. */
$('#addUser').click(function(){
    let csrf = $('input[name="_token"]').val();
    let sector_id = $('#id').val();
    let user_id = $('#user_id').val();
    let user_name = $('#user_id option:selected').text();
    let table = $('#users');

    if (table.find('td:contains('+user_name+')').length !== 0) {
        alert('Usuario já adicionado');
    } else if (sector_id === 0) {
        alert('Antes de adicionar um usuario, salve o setor');
    } else { 
        let tr = $('<tr class=align-middle></tr>');
        tr.append('<td id="user_id" value="'+user_id+'">'+user_id+'</td>');''
        tr.append('<td>'+user_name+'</td>');
        tr.append('<td class="text-center"><input type="checkbox" id="admin"></td>');
        tr.append('<td class="text-center"><a class="btn btn-outline-danger border rounded-circle" id="removeBtn" role="button" style="border-radius: 30px;border-width: 1px;"><i class="far fa-trash-alt"></i></a></td>');

        table.append(tr);
        
        $.ajax({
            url: '/sector/team',
            type: 'POST',
            data: {
                sector_id: sector_id,
                user_id: user_id,
                _token: csrf
            }
        });
    }
});

/* A jQuery function that is used to bind an event handler to the "click" JavaScript event, or trigger
that event on an element. */
$(document).on('click', '#removeBtn', function(){
    _confirm = confirm('Tem certeza que deseja remover o usuário?');
    if (_confirm) {
        $(this).closest('tr').remove();
        let csrf = $('input[name="_token"]').val();
        let sector_id = $('#id').val();
        let user_id = $(this).closest('tr').find('td:eq(0)').text();
        $.ajax({
            url: '/sector/team/'+sector_id+'/'+user_id,
            type: 'DELETE',
            data: {
                _token: csrf
            },
            success: function(data) {
                alert('Usuario removido com sucesso');
            }
        });
    }
});

/* A jQuery function that is used to bind an event handler to the "click" JavaScript event, or trigger
that event on an element. */
$(document).on('click', '#admin', function(){
    let csrf = $('input[name="_token"]').val();
    let sector_id = $('#id').val();
    let user_id = $(this).closest('tr').find('td:eq(0)').text();
    let admin = $(this).is(':checked') ? 1 : 0;
    $.ajax({
        url: '/sector/team/'+sector_id+'/'+user_id,
        type: 'PATCH',
        data: {
            admin: admin,
            _token: csrf
        }
    });
});
