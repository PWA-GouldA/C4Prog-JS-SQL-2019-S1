/**
 * Javascript Week 08 - Demo 01
 *
 * Filename: js/demo-01-radio-buttons.js
 * Author:   Adrian Gould
 * Date:     2019-03-19
 *
 */

/****************************************************************************
 * This code shows how to read the content of radio buttons
 ****************************************************************************/

// identify the radio buttons on the form, and the output area for the results
let outputRadio = doc.getElementById("outputRadio");
let radioFemale = doc.getElementById("genderF");
let radioMale = doc.getElementById("genderM");
let radioOther = doc.getElementById("genderX");


// if the female radio button is detected, add event listeners to each of the radio buttons
if (radioFemale.addEventListener) {
    radioFemale.addEventListener("change", genderRadioStateChange, false);
    radioMale.addEventListener("change", genderRadioStateChange, false);
    radioOther.addEventListener("change", genderRadioStateChange, false);
}


// when the state of a radio button is changed, perform this code
function genderRadioStateChange() {
    // se the value from the radio button to null
    let val = null;
    // grab a list of the radio buttons from the form
    let radios = form.elements['gender'];
    // initialise the output
    let output = "";
    // loop through all the radio buttons found
    // if the button is checked (it has a dot), then get the value
    // and then create output
    for (let counter = 0, len = radios.length; counter < len; counter++) {
        if (radios[counter].checked) {
            val = radios[counter].value;
            output += "<p>Radio value selected: " + val + "</p>";
        }
    }

    // update the output area
    outputRadio.innerHTML = output;
}
