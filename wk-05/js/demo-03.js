/**
 * Javascript Week 05 - Demo 01
 *
 * Writing to the DOM
 *
 * Filename: js/demo-02.js
 * Author:   Adrian Gould
 * Date:     2019-02-26
 *
 */

let doc = document; // Grab a copy of the DOM for the document
let titles = doc.getElementsByTagName('title');

let title = titles[0];
let titleText = title.innerText;

title.innerText = reverseString(titleText); // change the HTML in the right target


/********************** functions **************************/

function reverseString(str) {
    return str.split("").reverse().join("");
}