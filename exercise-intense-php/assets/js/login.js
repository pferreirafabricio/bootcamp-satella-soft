import { validaCPF } from './validations.js';

$('#txtCpf').mask('000.000.000-00');

if (document.getElementById('txtNascimento') != 'undefined')
  $('#txtNascimento').mask('00/00/0000');

document.addEventListener('DOMContentLoaded', () => {
  const elForm = document.forms['frmLogin'];
  const elCpf = elForm['txtCpf'];
  
  elForm.addEventListener('submit', (event) => {
    event.preventDefault();
    console.log(elCpf.value);
    if (validaCPF(elCpf.value)) {
      elForm.submit();
    } else {
      elCpf.classList.remove('valid');
      elCpf.classList.add('invalid');
    }
  });
});
