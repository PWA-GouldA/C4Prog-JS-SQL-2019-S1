/**
 * Javascript Week 05 - Exercise 01
 *
 * Filename: js/exercise-01.js
 * Author:   Adrian Gould
 * Date:     2019-03-11
 *
 */

// get the DOM (Document Object Model) for the page
let doc = document;
// Get the form from the page/document (Get Element By ID pinpoints the element with the given ID)
let form = doc.getElementById("TemperatureForm");
// get the location of "results" from the page/document
let results = doc.getElementById("results");
// get the location of the "errors" from the page/document
let errors = doc.getElementById("errors");

// add an event listener for the submit button
form.addEventListener("submit", function (event) {
    // Cancel the default event (prevent it from firing)
    event.preventDefault();

    // get the temperature from fahrenheit
    let input = doc.getElementById("fahrenheit").value;
    // attempt to make the temperature a decimal number
    let fahrenheit = parseFloat(input);

    // clear the results and error areas
    results.innerText = "";
    errors.innerText = "";

    // if the converted temperature (fahrenheit) is NaN (Not a Number) then...
    if (isNaN(fahrenheit)) {
        // display an error
        errors.innerText = "The temperature in Fahrenheit must be a number";
    } else {
        // calculate the celcius C = (F-32)*5/9
        let celcius = (fahrenheit - 32) * 5 / 9;
        // put the celcius into the results (2 decimal places)
        results.innerText = celcius.toFixed(2);
    } // end if

});// end event submit
