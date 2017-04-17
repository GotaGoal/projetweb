/**
 * Created by tristan on 18/04/17.
 */
$(window).ready(function () {
    document.getElementById("total").innerHTML = total();
    panier_empty();
});
function total(){
    let total = parseInt(0);
    let list = $('#itemzone').find(".prix");
    list.each(function () {
        total = total+parseInt(this.innerHTML);
    });
    return total;
}
function delete_item(el) {
    el.parentNode.parentNode.remove();
    panier_empty();
}

function panier_empty() {
    console.log(document.getElementById("itemzone").children.length);
    if(document.getElementById("itemzone").children.length ===0){
        $('#empty').css("visibility","visible");
    }else {
        $('#empty').css("visibility","hidden");
    }
}