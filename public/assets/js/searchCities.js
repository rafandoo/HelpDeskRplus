/* This is a jQuery function that is called when the state dropdown is changed. It gets the value of
the state dropdown and uses it to make an AJAX call to the server. The server returns a list of
cities for the selected state and the jQuery function then populates the city dropdown with the
returned list. */
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

function selectCity(city_id) {
    var url = "/city/" + city_id;
    $.get(url, function(data){
        $("#city_id").empty();
        $("#city_id").append("<option value='"+data.id+"'>"+data.name+"</option>");
    });
}