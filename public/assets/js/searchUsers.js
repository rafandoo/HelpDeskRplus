/* A jQuery function that is executed when the value of the select with id sector changes. It gets the
value of the select and uses it to make an ajax request to the url /sector/{sector}/users. When the
request is completed, it empties the select with id user_id and fills it with the data returned by
the request. */
$("#sector_id").change(function(){
    let sector = $(this).val();
    let url = "/sector/" + sector + "/users";
    $.get(url, function(data){
        $("#user_id").empty();
        $.each(data, function(i, user){
            $("#user_id").append("<option value='" + user.id + "'>" + user.name + " " + user.last_name + "</option>");
        });
    });
});