/**
 * Javascript Week 05 - Demo 00
 *
 * Filename: js/demo-03.js
 * Author:   Adrian Gould
 * Date:     2019-04-05
 *
 */

let doc = document;
let reversedTitle = "";
let titles = doc.getElementsByTagName('title');
let title = titles[0];
// title = doc.getElementsByTagName('titles')[0];
let titleText = title.innerText;
let titleTextLength = titleText.length;
for (let index=0; index < titleTextLength; index++) {
// for (let index=0; index < titleText.length; index++) {
    let letter = titleText[index];
    reversedTitle = letter + reversedTitle;
    // reversedTitle = titleText[index] + reversedTitle;
}
title.innerText = reversedTitle;

let before = doc.getElementById('before');
let after= doc.getElementById('after');
before.innerText=titleText;
after.innerText=reversedTitle;