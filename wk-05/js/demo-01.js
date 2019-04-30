/**
 * Javascript Week 05 - Demo 01
 *
 * Writing to the DOM
 *
 * Filename: js/demo-00.js
 * Author:   Adrian Gould
 * Date:     2019-02-26
 *
 */

let doc = document; // Grab a copy of the DOM for the document
let leftCol = doc.getElementById('leftTarget'); // locate the left target area in the dom
let rightCol = doc.getElementById('rightTarget'); // locate the right target area in the dom

leftCol.innerText="Hello"; // change the text in the left target
rightCol.innerHTML="<h3>Heading 3</h3>"; // change the HTML in the right target