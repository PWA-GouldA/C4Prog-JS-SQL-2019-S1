/**
 * Javascript Week 09 - Rows of Numbers (Console)
 *
 * Filename: js/rows-of-numbers-console.js
 * Author:   Adrian Gould
 * Date:     2019-04-02
 *
 */

let counter = 0;
let numCols = 7;
let output = "";
console.log("START");
for (let num=1; num<=35; num++){
    output += num.toString()+"\t";
    counter++;
    if (counter % numCols === 0){
        console.log(output);
        output="";
    }
}
if (counter%numCols!==0){
    console.log(output);
}
console.log("END");