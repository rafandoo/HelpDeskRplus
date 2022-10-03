$("#state").change(function(){
    var state = $(this).val();
    var url = "/city/" + state + "/state";
    $.get(url, function(data){
        $("#city").empty();
        $.each(data, function(i, city){
            $("#city").append("<option value='"+city.id+"'>"+city.name+"</option>");
        });
    });
});