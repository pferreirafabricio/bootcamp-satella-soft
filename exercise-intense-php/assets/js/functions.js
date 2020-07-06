/*
 * Função para validar o CPF.
 * https://www.geradordecpf.org/funcao-javascript-validar-cpf.html
*/
function validaCPF(cpf) {
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
    if (cpf.length < 11)
        return false;
    for (i = 0; i < cpf.length - 1; i++)
        if (cpf.charAt(i) != cpf.charAt(i + 1)) {
            digitos_iguais = 0;
            break;
        }
    if (!digitos_iguais) {
        numeros = cpf.substring(0, 9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--)
            soma += numeros.charAt(10 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;
        numeros = cpf.substring(0, 10);
        soma = 0;
        for (i = 11; i > 1; i--)
            soma += numeros.charAt(11 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;
        return true;
    }
    else
        return false;
}

document.addEventListener('DOMContentLoaded', () => {

  let valid = false;

  const elBtnCreateAccount = document.getElementById('btnCreateAccount');
  const elForm = document.forms['frmRegistro'];
  const elCpf = elForm['txtCpf'];
  const elName = elForm['txtNome'];
  const elEmail = elForm['txtEmail'];
  const elDateBirth = elForm['txtNascimento'];

  // Regex
  const nameRegex = /([a-zA-Z]){2,60}/;

  elForm.addEventListener('submit', (event) => {

    const fields = {
      cpf: elCpf.value,
      name: elName.value,
      email: elEmail.value,
      dateBirth: elDateBirth.value,
    };
    event.preventDefault();

    if (validateFields(fields)) {
      console.log('Valid');
    } else {
      console.log('Not valid');
    }
  });

  function validateFields({ cpf, name, email, dateBirth }) {
    if (validaCPF(cpf)) {
      elCpf.classList.add('valid');
      valid = true;
    } else {
      elCpf.classList.remove('valid');
      elCpf.classList.add('invalid');
      valid = false;
    }

    if (nameRegex.test(name)) {
      elName.classList.add('valid');
      console.log('my name' + name);
      valid = true;
    } else {
      elName.classList.remove('valid');
      elName.classList.add('invalid');
      valid = false;
    }

    return valid;
  }

});