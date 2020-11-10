var head = document.getElementsByTagName('head')[0];
var js = document.createElement("script");

js.type = "text/javascript";

if (screen.width < 1189) {
    js.src = "../responsive/phone.js";
}
head.appendChild(js);

function searchKey() {
    var input, filter, ul, a, i, txtValue;
    input = document.getElementById("search")
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL")
    li = ul.getElementsByTagName("li")
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }

}


function click1() {
    var x = document.activeElement.id;
    var ul;
    ul = document.getElementById("myUL");
    if (x === "search") {
        ul.style.display = "block"
    } else {
        ul.style.display = "none"

    }
}


function check() {

    document.getElementById("search").value = "";
    document.getElementById("search").placeholder = "Not Found";

}