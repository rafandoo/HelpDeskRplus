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

/**
 * If the password is less than 8 characters, add the class "is-invalid" to the password input, remove
 * the class "is-valid" from the password input, add the text "A senha deve ter no mínimo 8 caracteres"
 * to the next element after the password input, and set the custom validity of the password input to
 * "A senha deve ter no mínimo 8 caracteres". Otherwise, add the class "is-valid" to the password
 * input, remove the class "is-invalid" from the password input, remove the text from the next element
 * after the password input, and set the custom validity of the password input to an empty string.
 * @param input - The input element that is being validated.
 */
function validatePassword(input) {
    if (input.value.length < 8) {
        $("#password").addClass("is-invalid");
        $("#password").removeClass("is-valid");
        $("#password").next().text("A senha deve ter no mínimo 8 caracteres");
        input.setCustomValidity("A senha deve ter no mínimo 8 caracteres");
    } else {
        $("#password").addClass("is-valid");
        $("#password").removeClass("is-invalid");
        $("#password").next().text("");
        input.setCustomValidity("");
    }
}

/**
 * If the value of the input is not equal to the value of the password input, then add the class
 * is-invalid to the confirmPassword input, remove the class is-valid, set the text of the next element
 * to "As senhas não conferem" and set the custom validity of the input to "As senhas não conferem".
 * Otherwise, add the class is-valid to the confirmPassword input, remove the class is-invalid, set the
 * text of the next element to "" and set the custom validity of the input to "".
 * </code>
 * @param input - The input element that is being validated.
 */
function confirmPassword(input) {
    if (input.value != $("#password").val()) {
        $("#confirm_password").addClass("is-invalid");
        $("#confirm_password").removeClass("is-valid");
        $("#confirm_password").next().text("As senhas não conferem");
        input.setCustomValidity("As senhas não conferem");
    } else {
        $("#confirm_password").addClass("is-valid");
        $("#confirm_password").removeClass("is-invalid");
        $("#confirm_password").next().text("");
        input.setCustomValidity("");
    }
}

/**
 * It validates the input value as a CPF or CNPJ, and if it's valid, it adds the class "is-valid" to
 * the input, otherwise it adds the class "is-invalid" to the input.
 * @param input - The input element that is being validated.
 */
function validateCpfCnpj(input) {
    if (input.value.length == 14) {
        if (validateCpf(input.value)) {
            $("#cpfCnpj").addClass("is-valid");
            $("#cpfCnpj").removeClass("is-invalid");
            $("#cpfCnpj").next().text("");
            input.setCustomValidity("");
        } else {
            $("#cpfCnpj").addClass("is-invalid");
            $("#cpfCnpj").removeClass("is-valid");
            $("#cpfCnpj").next().text("CPF inválido");
            input.setCustomValidity("CPF inválido");
        }
    } else if (input.value.length == 18) {
        if (validateCnpj(input.value)) {
            $("#cpfCnpj").addClass("is-valid");
            $("#cpfCnpj").removeClass("is-invalid");
            $("#cpfCnpj").next().text("");
            input.setCustomValidity("");
        } else {
            $("#cpfCnpj").addClass("is-invalid");
            $("#cpfCnpj").removeClass("is-valid");
            $("#cpfCnpj").next().text("CNPJ inválido");
            input.setCustomValidity("CNPJ inválido");
        }
    }

    var url = "/client/" + input.value + "/cpf-cnpj";
    $.get(url, function(data){
        if (data == "True") {
            $("#cpfCnpj").addClass("is-invalid");
            $("#cpfCnpj").removeClass("is-valid");
            $("#cpfCnpj").next().text("CPF/CNPJ já cadastrado");
            input.setCustomValidity("CPF/CNPJ já cadastrado");
        } else {
            $("#cpfCnpj").addClass("is-valid");
            $("#cpfCnpj").removeClass("is-invalid");
            $("#cpfCnpj").next().text("");
            input.setCustomValidity("");
        }
    });
}

/**
 * It checks if the CPF is valid by checking if the digits are repeated, if the first digit is valid,
 * if the second digit is valid and if the third digit is valid
 * @param val - The value of the input field.
 * @returns A boolean value.
 */
function validateCpf(val) {
    var cpf = val.trim();
    cpf = cpf.replace(/\./g, '');
    cpf = cpf.replace('-', '');
    cpf = cpf.split('');
    
    var dv1 = 0;
    var dv2 = 0;
    var aux = false;
    
    for (var i = 1; cpf.length > i; i++) {
        if (cpf[i - 1] != cpf[i]) {
            aux = true;   
        }
    } 
    
    if (aux == false) {
        return false; 
    } 
    
    for (var i = 0, p = 10; (cpf.length - 2) > i; i++, p--) {
        dv1 += cpf[i] * p; 
    } 
    
    dv1 = ((dv1 * 10) % 11);
    
    if (dv1 == 10) {
        dv1 = 0; 
    }
    
    if (dv1 != cpf[9]) {
        return false; 
    } 
    
    for (var i = 0, p = 11; (cpf.length - 1) > i; i++, p--) {
        dv2 += cpf[i] * p; 
    } 
    
    dv2 = ((dv2 * 10) % 11);
    
    if (dv2 == 10) {
        dv2 = 0; 
    }
    
    if (dv2 != cpf[10]) {
        return false; 
    } else {   
        return true; 
    }
}

/**
 * It checks if the CNPJ is valid by checking if the first digit is different from the second, if the
 * first 12 digits are valid, if the 13th digit is valid and if the 14th digit is valid.
 * @param val - The CNPJ to be validated.
 * @returns A boolean value.
 */
function validateCnpj(val) {
    var cnpj = val.trim();
    cnpj = cnpj.replace(/\./g, '');
    cnpj = cnpj.replace('-', '');
    cnpj = cnpj.replace('/', ''); 
    cnpj = cnpj.split(''); 
    
    var dv1 = 0;
    var dv2 = 0;
    var aux = false;
    
    for (var i = 1; cnpj.length > i; i++) { 
        if (cnpj[i - 1] != cnpj[i]) {  
            aux = true;   
        } 
    } 
    
    if (aux == false) {  
        return false; 
    }
    
    for (var i = 0, p1 = 5, p2 = 13; (cnpj.length - 2) > i; i++, p1--, p2--) {
        if (p1 >= 2) {  
            dv1 += cnpj[i] * p1;  
        } else {  
            dv1 += cnpj[i] * p2;  
        } 
    } 
    
    dv1 = (dv1 % 11);
    
    if (dv1 < 2) { 
        dv1 = 0; 
    } else { 
        dv1 = (11 - dv1); 
    } 
    
    if (dv1 != cnpj[12]) {  
        return false; 
    } 
    
    for (var i = 0, p1 = 6, p2 = 14; (cnpj.length - 1) > i; i++, p1--, p2--) { 
        if (p1 >= 2) {  
            dv2 += cnpj[i] * p1;  
        } else {   
            dv2 += cnpj[i] * p2; 
        } 
    }
    
    dv2 = (dv2 % 11); 
    
    if (dv2 < 2) {  
        dv2 = 0;
    } else { 
        dv2 = (11 - dv2); 
    } 
    
    if (dv2 != cnpj[13]) {   
        return false; 
    } else {  
        return true; 
    }
}