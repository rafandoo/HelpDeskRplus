// Language: javascript

/**
 * It checks if the login is already in use, if it is, it adds the class "is-invalid" to the input, if
 * it isn't, it adds the class "is-valid" to the input.
 * @param input - The input element that is being validated.
 */
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

/**
 * It checks if the email is already registered in the database, if it is, it adds the class
 * "is-invalid" to the input, if it isn't, it adds the class "is-valid" to the input.
 * @param input - The input element that is being validated.
 */
function validateEmail(input) {
    var url = "/user/" + input.value + "/email";
    $.get(url, function(data){
        if (data == "True") {
            $("#email").addClass("is-invalid");
            $("#email").removeClass("is-valid");
            $("#email").next().text("Email já cadastrado");
            input.setCustomValidity("Email já existe, por favor informe outro");
        } else {
            $("#email").addClass("is-valid");
            $("#email").removeClass("is-invalid");
            $("#email").next().text("");
            input.setCustomValidity("");
        }
    });
}