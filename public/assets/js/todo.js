/* This is a jQuery function that is listening for a click event on the element with the id of
delete_todo. When the click event is triggered, it will run the function. */
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

$(document).on('click', '#btnDone', function() {
    let csrf = $('input[name="_token"]').val();
    // id esta no botao
    let id = $(this).val();
    
    // verificar de <del> esta no todo_title_id (h6)
    let todo_title = $('#todo_title_'+id);

    if (todo_title.find('del').length > 0) {
        
        // remover <del> do todo_title_id (h6)
        
        todo_title.find('del').remove();
        



    } else {
        todo_title.wrapInner('<del></del>');
    }
    
    $.ajax({
        url: '/todo/'+id+'/done',
        type: 'PATCH',
        data: {
            _token: csrf
        },
        success: function(data) {
            alert('Tarefa concluida com sucesso');
        }
    });
});