/**
 * Javascript Week 05 - Demo 06
 *
 * Filename: js/demo-05.js
 * Author:   Adrian Gould
 * Date:     2019-02-26
 *
 */

let doc = document;
let form = doc.querySelector("form");

console.log(form);

form.addEventListener("submit", function (event) {

    let products = doc.getElementById('product');
    let selectedProduct = form.elements.product.value;

    console.log(products);
    console.log(products.innerText);

    console.log(selectedProduct);

    doc.getElementById('productChosen').innerText = selectedProduct;

    event.preventDefault();
});
