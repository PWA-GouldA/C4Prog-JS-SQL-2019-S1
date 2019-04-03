/**
 * Javascript Week 09 - Rows of Numbers (HTML)
 *
 * Filename: js/rows-of-numbers-html.js
 * Author:   Adrian Gould
 * Date:     2019-04-02
 *
 */

// declare variables
let counter = 0; // column counter
let maxNumber = 31; // maximum number to display
let numCols = 7; // number of columns in a row of numbers

// start the output (first row)
let output = "<div class='row'>";

// for num is from 1 to maxNumber (incrementing by 1)
for (let num = 1; num <= maxNumber; num++) {
    // add the number to a "cell" or column
    output += "<p class='col'>" + num.toString() + "</p>";
    // increment the column counter
    counter++;
    // if we have reached the last column
    if (counter % numCols === 0) {
        // end the row
        output += "</div>";
        // if we have more numbers to output then start a new row
        if (num <maxNumber){
            output += "<div class='row'>";
            // output = output + "<div class='row'>";
        } // end if num less than maxNumber
    } // end if counter is divisible by max columns
} // end for num

// have we completed the last row?
if (counter % numCols !== 0) {
    // no, so we calculate how many spaces are needed
    fillSpaces = numCols - maxNumber%numCols;

    // for filler is from 1 to the number of extra spaces (in steps of 1)
    for (let filler = 1; filler <= fillSpaces; filler++){
        // add a filler column/cell
        output +="<p class='col'> </p>";
    } // end for filler
    // add the last (closing) div
    output += "</div>";
} // end if more columns needed

// output the results!
let resultZone = document.getElementById("outputZone");
resultZone.innerHTML = output;