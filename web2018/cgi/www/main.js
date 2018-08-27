// This function requests external html file in the background.
function loadContent(name, element) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200)
            element.innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", `/cgi-bin/content?${name}`, true);
    xhttp.send(); 
}
