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