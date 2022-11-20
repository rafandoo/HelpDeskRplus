$(document).on('click', '#delete_todo', function(){
    _confirm = confirm('Tem certeza que deseja remover?');
    if (_confirm) {
        let csrf = $('input[name="_token"]').val();
        let id = $(this).closest('tr').find('td:eq(0)').text();
        $.ajax({
            url: '/todo/'+id,
            type: 'DELETE',
            data: {
                _token: csrf
            },
            success: function(data) {
                alert('Tarefa removida com sucesso');
            }
        });
    }
});