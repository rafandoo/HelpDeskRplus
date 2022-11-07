$("#zip_code").change(function(){
    var zip_code = $(this).val();
    var url = "http://localhost:8001/zipcode/" + zip_code;
    $.get(url, function(data){
        console.log(data);
    });
    
});