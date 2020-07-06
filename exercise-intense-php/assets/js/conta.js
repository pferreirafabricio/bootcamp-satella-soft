document.addEventListener('DOMContentLoaded', () => {

  const elBtnCreateAccount = document.getElementById('btnCreateAccount');
  const elForm = document.forms['frmRegistro'];

  elBtnCreateAccount.addEventListener('click', (event) => {
    event.preventDefault();
    console.log('hi');
  });

});