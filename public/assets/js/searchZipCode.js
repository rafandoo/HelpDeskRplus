/* It's a jQuery function that is called when the zip_code input is changed. */
$("#zip_code").change(function() {
    let zip_code = $(this).val();
    zip_code = zip_code.replace(/[^0-9]/, '');
    let url = "http://localhost:8060/zipcode/" + zip_code;

    if (zip_code.length !== 8) {
        return;
    } else {
        $.get(url, function(data){
            $("#state").val(data.state);
            selectCity(data.city);
            $("#neighborhood").val(data.neighborhood);
            $("#street").val(data.street);
            $("#complement").val(data.complement);
        });
    }
});