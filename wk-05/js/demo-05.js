/**
 * Javascript Week 05 - Demo 05
 *
 * Filename: js/demo-05.js
 * Author:   Adrian Gould
 * Date:     2019-02-26
 *
 */

let doc = document;
var form = doc.querySelector("form");
let givenName = doc.getElementById('givenName');

console.log(form);

form.addEventListener("submit", function(event) {
    console.log("Saving value", form.elements.givenName.value);

    doc.getElementById('resultGiven').innerText=form.elements.givenName.value;

    // add JS for displaying the family and email addresses on the page

    event.preventDefault();
});
