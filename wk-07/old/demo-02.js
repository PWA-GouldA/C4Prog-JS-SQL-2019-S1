/**
 * Javascript Week 07 - Demo 02
 *
 * Filename: js/demo-02.js
 * Author:   Adrian Gould
 * Date:     2019-02-26
 *
 */

// Grab the Godfather... (DOM)
let doc = document;
let formDemo = doc.getElementById('demoForm');

// listen for the SAVE button
formDemo.addEventListener('submit', function (event) {
    // get the first name field
    let firstName = doc.getElementById('firstName').value;
    let firstError = doc.getElementById('firstNameError');

    // check to see if the first name has been entered
    if (!isEmpty(firstName)) {
        // Hide the error message
        firstError.classList.add('d-none');
        // allow the submit event to bubble up ...
    } else {
        // Change and display the error message
        firstError.innerText = "You must enter a first name";
        firstError.classList.remove('d-none');
        // stop the submit from happening!
        event.preventDefault();
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
