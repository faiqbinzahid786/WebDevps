var x, xmlhttp, xmlDoc, txt;
xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "cd_catalog.xml", false);
xmlhttp.send();
xmlDoc = xmlhttp.responseXML;
x = xmlDoc.getElementsByTagName("CD");
table = "<tr><th>Artist</th><th>Remove</th></tr>";
for (i = 0; i < x.length; i++) {
    table += "<tr><td onclick='displayCD(" + i + ")'>";
    table += x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue;
    table += "</td>";
    table += "<td id = 'remove' onclick='myFunction(" + i + ")'>";
    table += "<p onclick='removed(" + i + ")'>Remove</p></td></tr>";
}

document.getElementById("demo").innerHTML = table;

function removed(i) {
    x[i] = document.getElementById("remove").innerHTML = "Removed!";

    document.getElementById("showCD").innerHTML = "Removed!";
}

function myFunction(i) {
    txt = "";
    x[i] = xmlDoc.getElementsByTagName("TITLE")[0];
    y = x.childNodes[0];
    x.removeChild(y);
    x[i] = xmlDoc.getElementsByTagName("ARTIST")[0];
    y = x.childNodes[0];
    x.removeChild(y);
    x[i] = xmlDoc.getElementsByTagName("YEAR")[0];
    y = x.childNodes[0];
    x.removeChild(y);
    document.getElementById("showCDrem").innerHTML = alert("Note Removed!")

}

function displayCD(i) {
    document.getElementById("showCD").innerHTML =
        "<strong>Artist: </strong>" +
        x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue +
        "<br><strong>Title: </strong>" +
        x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
        "<br><strong>Year: </strong>" +
        x[i].getElementsByTagName("YEAR")[0].childNodes[0].nodeValue;
}

function showText(id, delay) {
    var elem = document.getElementById(id);
    setTimeout(function() {
        elem.style.visibility = 'visible';
    }, delay * 1000)
}

window.onload = function() {
    showText('delayedText1', 3);
    showText('delayedText2', 5);
    showText('delayedText3', 8);
}

// close the div in 5 secs
window.setTimeout("closeHelpDiv();", 5000);

function closeHelpDiv() {
    document.getElementById("helpdiv").style.display = " none";
}

function displayRemoved(i) {

    i = document.getElementById("displayRem").innerHTML = "Removed!";

}

function displayRemoving(i) {
    for (i = 0; i < x.length; i++) {
        document.getElementById("displayRemovin").innerHTML = "Removing....";
    }
}

function save() {
    xmlDoc.save("cd_catalog.xml");
    xmlhttp.save();
    xmlDoc.save();
}