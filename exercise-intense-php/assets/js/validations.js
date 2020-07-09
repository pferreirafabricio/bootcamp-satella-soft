const nameRegex = /([a-zA-Z]){2,60}/;
const emailRegex = /^([a-zA-Z0-9\.\+\-\_]{5,60})\@([a-zA-Z0-9\.\+\-\_]{2,10})\.([a-zA-Z0-9]{2,10}).+$/;
const dateBirthRegex = /0[1-9]|1[0-9]|2[0-9]|3[0-1]\/0[1-9]|1[1-2]\/\d\d\d\d/;

/*
 * Função para validar o CPF.
 * https://www.geradordecpf.org/funcao-javascript-validar-cpf.html
*/
function validaCPF(cpf) {
  let numeros;
  let digitos;
  let soma;
  let i;
  let resultado;
  let digitosIguais;

  digitosIguais = 1;
  if (cpf.length < 11) return false;

  for (i = 0; i < cpf.length - 1; i++) {
    if (cpf.charAt(i) != cpf.charAt(i + 1)) {
      digitosIguais = 0;
      break;
    }
  }

  if (!digitosIguais) {
    numeros = cpf.substring(0, 9);
    digitos = cpf.substring(9);
    soma = 0;

    for (i = 10; i > 1; i--) soma += numeros.charAt(10 - i) * i;

    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

    if (resultado != digitos.charAt(0)) return false;

    numeros = cpf.substring(0, 10);
    soma = 0;

    for (i = 11; i > 1; i--) soma += numeros.charAt(11 - i) * i;

    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

    if (resultado != digitos.charAt(1)) return false;
    return true;
  }
  return false;
}

function validateName(pName) {
  return nameRegex.test(pName) && pName.length <= 60;
}

function validateEmail(pEmail) {
  return emailRegex.test(pEmail) && pEmail.length <= 80;
}

function validateDateBirth(pDateBirth) {
  return dateBirthRegex.test(pDateBirth);
}

export {
  validaCPF,
  validateName,
  validateEmail,
  validateDateBirth,
};
