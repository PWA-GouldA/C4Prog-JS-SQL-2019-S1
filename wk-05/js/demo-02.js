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
let NL = "\n";
let rightCol = doc.getElementById('rightTarget'); // locate the right target area in the dom

content = "<ul>";
for (let count = 0; count < 10; count++) {
    content = content + NL + "<li>" + count.toString() + "</li>";
}
content += NL + "</ul>";

rightCol.innerHTML = content; // change the HTML in the right target