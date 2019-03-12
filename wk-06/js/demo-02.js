/**
 * Javascript Week 06 - Demo 02
 *
 * Filename: js/demo-02.js
 * Author:   Adrian Gould
 * Date:     2019-03-12
 *
 */

// Grab the Godfather... (DOM)
let doc=document;
let formDemo = doc.getElementById('formDemo');

// listen for the SAVE button
formDemo.addEventListener('submit', function(event)
{
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

    // put first name into the first name results area
    firstResult.innerText = firstName;
    // put surname into the surname results area
    secondResult.innerText = lastName;

}); // end event listener