function affiche_inscrit(){
	alert('Loys Brethelier \n Maxence Literas')
}
function change_text(id) {
	document.getElementById(id).innerHTML = prompt('Rédiger le changement',document.getElementById(id).innerHTML);
}
function selection(id1) {
	var chemin = $('#'+ id1).closest('div');
	chemin.prev().attr('class', 'select');
	$('#'+ id1).hide();
	$('#'+ id1).next().show();
}

function unselection(id1) {
	var chemin = $('#'+ id1).closest('div');
	chemin.prev().attr('class', '');
	$('#'+ id1).hide();
	$('#'+ id1).prev().show();
}
function telechargement() {
	var nb = document.getElementsByClassName('select');
	for (var i = nb.length - 1; i >= 0; i--) {
		window.location = nb[i].src;
	}
}