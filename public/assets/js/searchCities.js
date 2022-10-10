$("#state").change(function(){
    var state = $(this).val();
    var url = "/city/" + state + "/state";
    $.get(url, function(data){
        $("#city_id").empty();
        $.each(data, function(i, city){
            $("#city_id").append("<option value='"+city.id+"'>"+city.name+"</option>");
        });
    });
});