/**
 * Javascript Week 08 - Demo 01
 *
 * Filename: js/demo-01-checkboxes.js
 * Author:   Adrian Gould
 * Date:     2019-03-19
 *
 */

/****************************************************************************
 * This code shows how to read the content of checkboxes
 ****************************************************************************/


// identify the radio buttons on the form, and the output area for the results
let outputCheckbox = doc.getElementById("outputCheckboxes");
let productsCheckbox = doc.getElementById("products");
let acceptCheckbox = doc.getElementById("accept");


    productsCheckbox.addEventListener("change", infoCheckboxesChange, false);
    acceptCheckbox.addEventListener("change", infoCheckboxesChange, false);


// when the state of a radio button is changed, perform this code
function infoCheckboxesChange() {
    // se the value from the radio button to null
    let val = null;
    // grab a list of the checkboxes from the form
    let checkboxes = form.elements['infoCheckBoxes'];
    // initialise the output
    let output = "";
    // loop through all the checkboxes found
    // if the checkbox is ticked, then get the value
    // and then create output
    for (let counter = 0, len = checkboxes.length; counter < len; counter++) {
        if (checkboxes[counter].checked) {
            val = checkboxes[counter].value;
            output += "<p>Checkbox value: " + val + "</p>";
        }
    }

    // update the output area
    outputCheckbox.innerHTML = output;
}