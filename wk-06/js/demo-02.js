/**
 * Javascript Week 06 - Demo 02
 *
 * Filename: js/demo-02.js
 * Author:   Adrian Gould
 * Date:     2019-03-12
 *
 */

// Grab the Godfather... (DOM)
let doc = document;
let formDemo = doc.getElementById('formDemo');

// listen for the SAVE button
formDemo.addEventListener('submit', function (event) {
    // stop the submit from happening!
    event.preventDefault();

    // get the first name field
    let firstName = doc.getElementById('firstName').value;
    // get the second name field
    let lastName = doc.getElementById('lastName').value;
    // get the first name results area
    let firstResult = doc.getElementById('resultFirstName');
    // get the last name results area
    let secondResult = doc.getElementById('resultSurname');

    let firstError = doc.getElementById('firstNameError');
    let lastError = doc.getElementById('lastNameError');

    // check to see if the first name has been entered
    if (!isEmpty(firstName)) {
        // put first name into the first name results area
        firstResult.innerText = firstName;
        // Hide the error message
        firstError.classList.add('d-none');
    } else {
        // Change and display the error message
        firstError.innerText = "You must enter a first name";
        firstError.classList.remove('d-none')
    }

    // put surname into the surname results area
    // Check to see if the second name has content
    // if not display error message!

    // check to see if the last name has been entered
    if (!isEmpty(lastName)) {
        // put last name into the last name results area
        secondResult.innerText = lastName;
        // Hide the error message
        lastError.classList.add('d-none');
    } else {
        // Change and display the error message
        lastError.innerText = "You must enter a last name";
        lastError.classList.remove('d-none')
    }
}); // end event listener

/**
 * method: check to see if field has content
 * @param fieldName
 */
function isEmpty(fieldName) {
    return !(fieldName > '');
    // if (fieldName > '') {
    //     return false;
    // }
    // return true;
}

/**
 * method: check to see if (text) field is less than min length
 * @param fieldName
 * @param minLength
 */
function isMinLength(fieldName, minLength = 0) {
    if (fieldName.length < minLength) {
        return true;
    }
    return false;
}

/**
 * method: check to see if (text) field is greater then max length
 * @param fieldName
 * @param maxLength
 */
function isMaxLength(fieldName, maxLength = 255) {
    if (fieldName.length > maxLength) {
        return true;
    }
    return false;
}
