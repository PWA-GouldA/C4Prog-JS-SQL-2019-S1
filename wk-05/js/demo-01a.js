/**
 * Javascript Week 05 - Demo 00
 *
 * Filename: js/demo-00.js
 * Author:   Adrian Gould
 * Date:     2019-03-05
 *
 */

let doc = document;
let leftCol = doc.getElementById('first');
let grid = doc.getElementById('grid');
let rightCol = doc.getElementById('second');

console.log("LEFT COLUMN Content");
console.log(leftCol);
console.log("LEFT COLUMN Inner Text");
console.log(leftCol.innerText);
console.log("GRID CONTENT");
console.log(grid);

leftCol.innerText = "Hello there";
rightCol.innerHTML = "<h4>Header!, Yep a Header!</h4>";

// Problem - create a list of the numbers 1-5 using JS
// get the target (list)
let target = doc.getElementById('list');
// output = UL
let output = "<ul>";
// for count is from 1 to 5
for (let count = 1; count <= 5; count++) {
//    output = output + LI + count
    output = output + "<li>" + count + "</li>";
// end for
}
output = output + "</ul>";
// change target to have output in it
target.innerHTML = output;