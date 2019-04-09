let doc=document
let pseudo = doc.getElementById('pseudocode');
let part = doc.getElementById('pseudoChoice');
let error = doc.getElementById('pseudoError');

var xhr;
if (window.ActiveXObject) {
    xhr = new ActiveXObject ("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest ();
}


function updatePage() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            var response = xhr.responseText;
            pseudo.innerHTML = response;
            error.innerHTML="<p class='text-light'></p>";
        } else {
            error.innerHTML="<p class='text-danger'>OOPS! We encountered a small problem</p>";
            pseudo.innerHTML = "<p></p>";
        }
    }
}

part.addEventListener('change', displayPseudocode);

function displayPseudocode(event){
    event.preventDefault();

    error.innerHTML="<p></p>";
    choice = part.value;

    var url = "pp1-"+choice+"-pseudocode.html";
    xhr.open ("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = updatePage;
    xhr.send();
}