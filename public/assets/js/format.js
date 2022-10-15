/**
 * It takes a string, removes all non-numeric characters, and then formats the string as a CPF or CNPJ,
 * depending on the length of the string.
 * @param value - The value to be formatted.
 * @returns A function that takes a value and returns a formatted value.
 */
function formatCpfCnpj(value) {
    const CPF_LENGTH = 11;
    const CNPJ_LENGTH = 14;
    var val = value.replace(/\D/g, '');

    if (val.length === CPF_LENGTH) {
        return val.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    } else if (val.length === CNPJ_LENGTH) {
        return val.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
    } else {
        return val;
    }
}