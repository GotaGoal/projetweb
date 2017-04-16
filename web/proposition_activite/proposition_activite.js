function champs_requis(value,input) 
{
	if (value == "") {
		document.getElementById(input).style.borderColor = "red";
	}
	else
	{
		document.getElementById(input).style.borderColor = "white";
	}
	
}