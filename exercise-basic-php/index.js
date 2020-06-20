'use strict'

document.addEventListener('DOMContentLoaded', () => {
  // Default 
  let validForm;

  // All elements
  const formElement = document.forms['registerForm'];
  const nameElement = formElement['txtName'];
  const emailElement = formElement['txtEmail'];
  const telephoneElement = formElement['txtTelephone'];
  const subjectElement = formElement['txtSubject'];
  const messageElement = formElement['txtMessage'];

  // Regexs
  const nameRegex = /[a-z]{3,50}/;
  const emailRegex = /\w{3,87}\@\w{2,13}.\w{2,5}/;
  const telephoneRegex = /[0-9]{10,11}/;
  const subjectRegex = /1|2|3|4/;

  formElement.addEventListener('submit', (event) => {
    validForm = true;

    // Create an object for store all data
    const contactData = {
      name: nameElement.value,
      email: emailElement.value,
      telephone: telephoneElement.value,
      subject: subjectElement.value,
      message: messageElement.value,
    }
    console.log(validateForm(contactData));
    if (!validateForm(contactData)) {
      event.preventDefault();
    } else {
      formElement.submit();
      //window.location = '/contact.php';
    }
  });

  function validateForm(pContactData) {
    if (nameRegex.test(pContactData.name)) {
      nameElement.classList.add('valid');
    } else {
      validForm = false;
      nameElement.classList.remove('valid');
      nameElement.classList.add('invalid');
    }

    if (emailRegex.test(pContactData.email)) {
      emailElement.classList.add('valid');
    } else {
      validForm = false;
      emailElement.classList.remove('valid');
      emailElement.classList.add('invalid');
    }

    if (telephoneRegex.test(pContactData.telephone)) {
      telephoneElement.classList.add('valid');
    } else {
      validForm = false;
      telephoneElement.classList.remove('valid');
      telephoneElement.classList.add('invalid');
    }

    if (subjectRegex.test(pContactData.subject)) {
      subjectElement.classList.add('valid');
    } else {
      validForm = false;
      subjectElement.classList.remove('valid');
      subjectElement.classList.add('invalid');
    }

    if (messageElement.value !== '') {
      messageElement.classList.add('valid');
    } else {
      validForm = false;
      messageElement.classList.remove('valid');
      messageElement.classList.add('invalid');
    }
    
    return validForm;
  }
});