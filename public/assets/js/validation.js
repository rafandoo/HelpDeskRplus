function validateLogin(input) {
    var url = "/user/" + input.value + "/login";
    $.get(url, function(data){
        if (data == "True") {
            console.log(data);
            $("#login").addClass("is-invalid");
            $("#login").removeClass("is-valid");
            $("#login").next().text("Login já cadastrado");
            input.setCustomValidity("Login já existe, por favor escolha outro");
            $
        } else {
            $("#login").addClass("is-valid");
            $("#login").removeClass("is-invalid");
            $("#login").next().text("");
            input.setCustomValidity("");
        }
    });
}