/**
 * Javascript Week 05 - Demo 00
 *
 * Filename: js/demo-04.js
 * Author:   Adrian Gould
 * Date:     2019-04-05
 *
 */

let doc = document;
let title = doc.getElementsByTagName('title')[0];
let titleText = title.innerText;
let reversedTitle = reverseString(titleText);
title.innerText = reversedTitle;

let before = doc.getElementById('before');
let after= doc.getElementById('after');
before.innerText=titleText;
after.innerText=reversedTitle;



function reverseString( text ){
    return text.split("").reverse().join("");
}