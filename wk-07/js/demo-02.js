/**
 * Javascript Week 07 - Demo 02
 *
 * Filename: js/demo-02.js
 * Author:   Adrian Gould
 * Date:     2019-03-19
 *
 */

let doc = document;
let theForm = doc.getElementById('demoForm');

theForm.addEventListener('submit', function (event) {
    let givenName = doc.getElementById('givenName').value;
    let givenNameError = doc.getElementById('givenNameError');

    givenNameError.innerHTML = '';

    if (isEmpty(givenName)) {
        givenNameError.innerHTML = '<p class="text-danger">Please enter a given name.</p>';
        event.preventDefault();
    } else if (isTooLong(givenName, 50)) {
        givenNameError.innerHTML = '<p class="text-danger">The given name is too long.</p>';
        event.preventDefault();
    }

    // all ok, so submit will happen
});

function isEmpty(data) {
    // if (data>''){
    //     return false
    // }
    // return true;
    return data > '' ? false : true;
}

function isTooLong(data, maxLength) {
    return data.length > maxLength ? true : false;
}