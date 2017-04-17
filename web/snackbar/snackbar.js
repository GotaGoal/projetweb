/**
 * Created by tristan on 16/04/17.
 */

function show_snackbar(text) {
    console.log("showed snackbar");
    var x = document.getElementById("snackbar");
    x.innerHTML = text;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
