/**
 * It takes a string, removes all non-numeric characters, and then formats the string as a CPF or CNPJ,
 * depending on the length of the string.
 * @param value - The value to be formatted.
 * @returns A function that takes a value and returns a formatted value.
 */
function formatCpfCnpj(value) {
    const CPF_LENGTH = 11;
    const CNPJ_LENGTH = 14;
    let val = value.replace(/\D/g, '');

    if (val.length === CPF_LENGTH) {
        return val.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    } else if (val.length === CNPJ_LENGTH) {
        return val.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
    } else {
        return val;
    }
}

/* Adding an event listener to the input field with the id of cpf_cnpj. When the value of the input
field changes, the value of the input field is set to the value returned by the function
formatCpfCnpj. */
$('#cpf_cnpj').on('change', function () {
    $(this).val(formatCpfCnpj($(this).val()));
});

/**
 * It replaces all non-numeric characters with an empty string, then replaces the first 5 digits with
 * the first 5 digits and a dash, then replaces the next 3 digits with the next 3 digits.
 * @param value - The value of the input field.
 * @returns the value of the input field with the mask applied.
 */
function formatCEP(value) {
    let val = value.replace(/\D/g, '');
    return val.replace(/(\d{5})(\d{3})/, "$1-$2");
}

/* Adding an event listener to the input field with the id of zip_code. When the value of the input
field changes, the value of the input field is set to the value returned by the function
formatCEP. */
$('#zip_code').on('change', function () {
    $(this).val(formatCEP($(this).val()));
});

/**
 * It takes a string, removes all non-numeric characters, then adds the parenthesis and dash in the
 * correct places.
 * @param value - The value of the input field.
 * @returns the value of the input field with the mask applied.
 */
function formatPhone(value) {
    let val = value.replace(/\D/g, '');
    return val.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
}

/* Adding an event listener to the input field with the id of phone. When the value of the input
field changes, the value of the input field is set to the value returned by the function
formatPhone. */
$('#phone').on('change', function () {
    $(this).val(formatPhone($(this).val()));
});
