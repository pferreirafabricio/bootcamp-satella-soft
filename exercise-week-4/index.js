'use strict'

document.addEventListener('DOMContentLoaded', () => {
    var valideForm = false;
    // All inputs 
    const formEL = document.getElementById('registerForm');
    const name = document.forms['registerForm']['txtName'];
    const email = document.forms['registerForm']['txtEmail'];
    const password = document.forms['registerForm']['txtPassword'];
    const confirmPassword = document.forms['registerForm']['txtConfirmPassword'];
    const genre = document.forms['registerForm']['txtGenre'];
    const dateBirth = document.forms['registerForm']['dtDateBirth'];
    const aboutYou = document.forms['registerForm']['txtAboutYou'];

    // All Regex
    const nameRegex = /[a-z]{3,50}/;
    const emailRegex = /[a-z]{5,87}\@[a-z]{3,10}.[a-z]{2,3}/;
    const passwordRegex = /\w{7,50}/;
    const genreRegex = /m|f/;
    const dateRegex = /\d{4}\-\d{1,2}\-\d{1,2}/;

    let errors = document.getElementById('errors');

    formEL.addEventListener('submit', (event) => {
        event.preventDefault();
        errors.innerHTML = "";
        valideForm = true;

        const formData = {
            name: name.value,
            email: email.value,
            password: password.value,
            confirmPassword: confirmPassword.value,
            genre: genre.value,
            dateBirth: dateBirth.value,
            aboutYou: aboutYou.value,
        }

        console.log(formData);

        if (!validateForm(formData)) {
            event.preventDefault();
        } else {
            window.location.href = 'https://google.com';
            console.log('All right');
        }
    });

    const validateForm = (pFormData) => {
        if (!nameRegex.test(pFormData.name)) {
            name.classList.add('invalid');
            createErrorElement('Type a valid name!');
        } else {
            name.classList.add('valid');
        }

        if (!emailRegex.test(pFormData.email)) {
            email.classList.add('invalid');
            createErrorElement('Type a valid email!');
        } else {
            email.classList.add('valid');
        }

        if (!passwordRegex.test(pFormData.password)) {
            password.classList.add('invalid');
            createErrorElement('Type a valid password!');
        } else {
            password.classList.add('valid');
        }

        if (pFormData.confirmPassword !== "") {
            if (pFormData.password !== pFormData.confirmPassword) {
                confirmPassword.classList.add('invalid');
                createErrorElement('Both passwords must be the same!');
            } else {
                confirmPassword.classList.add('valid');
            }
        } else {
            confirmPassword.classList.add('invalid');
            createErrorElement('The "Confirm password" field cannot be empty!!');
        }

        if (!genreRegex.test(pFormData.genre)) {
            genre.classList.add('invalid');
            createErrorElement('Select a valid genre!');
        } else {
            genre.classList.add('valid');
        }

        if (!dateRegex.test(pFormData.dateBirth)) {
            dateBirth.classList.add('invalid');
            createErrorElement('Enter a valid date!');
        } else {
            dateBirth.classList.add('valid');
        }

        return valideForm;
    }

    const createErrorElement = (pMessage) => {
        let errorEl = document.createElement('li');
        errorEl.innerHTML = pMessage;
        errorEl.style.color = 'red';
        errors.appendChild(errorEl);
        valideForm = false;
    }
});