function champs_requis(value,input,erreur) 
{
	if (value == "") {
		document.getElementById(input).style.borderWidth = "2px";
		document.getElementById(input).style.borderColor = "red";
		document.getElementById(erreur).style.display= 'block';
	}
	else
	{
		document.getElementById(input).style.borderWidth = "1px";
		document.getElementById(input).style.borderColor = "black";
		document.getElementById(erreur).style.display = 'none';
	}
	
}


