/**
 * Javascript Week 04 - Demo 00
 *
 * Filename: js/demo-00.js
 * Author:   Adrian Gould
 * Date:     2019-02-26
 *
 * http://a106-20/AJG/C4Prog-JS-SQL/wk-04/js/
 */

// Basic function structure
//
// function functionName( argument(s) ) {
//     Do things
//     return value (optional)
// } // end functionName

function sumTwoNumbers(firstNum, secondNum) {
    let total = firstNum + secondNum;
    return total;
} // end sumTwoNumbers

function logResult(text, value) {
    console.log(text, value);
} // end logResult

let first = parseInt(prompt("Enter first number:"));
let second = parseInt(prompt("Enter second number:"));

total = sumTwoNumbers(first,second);

logResult("Total is ",total);
