/* eslint-disable dot-notation */
import {
  validaCPF,
  validateName,
  validateEmail,
  validateDateBirth,
} from './validations.js';

document.addEventListener('DOMContentLoaded', () => {
  // Const variables
  let valid = true;

  // All HTML elements
  const elForm = document.forms['frmRegistro'];
  const elCpf = elForm['txtCpf'];
  const elName = elForm['txtNome'];
  const elEmail = elForm['txtEmail'];
  const elDateBirth = elForm['txtNascimento'];

  function validateFields({
    cpf,
    name,
    email,
    dateBirth,
  }) {
    if (validaCPF(cpf)) {
      elCpf.classList.add('valid');
    } else {
      elCpf.classList.remove('valid');
      elCpf.classList.add('invalid');
      valid = false;
    }

    if (validateName(name)) {
      elName.classList.add('valid');
    } else {
      elName.classList.remove('valid');
      elName.classList.add('invalid');
      valid = false;
    }

    if (validateEmail(email)) {
      elEmail.classList.add('valid');
    } else {
      elEmail.classList.remove('valid');
      elEmail.classList.add('invalid');
      valid = false;
    }

    if (validateDateBirth(dateBirth)) {
      elDateBirth.classList.add('valid');
    } else {
      elDateBirth.classList.remove('valid');
      elDateBirth.classList.add('invalid');
      valid = false;
    }

    return valid;
  }

  elForm.addEventListener('submit', (event) => {
    event.preventDefault();
    valid = true;

    const fields = {
      cpf: elCpf.value,
      name: elName.value,
      email: elEmail.value,
      dateBirth: elDateBirth.value,
    };

    if (validateFields(fields)) {
      elForm.submit();
    } else {
      alert('Há campos inválidos!');
    }
  });
});
