function validerPanier()
{
	var fomCMD = document.getElementById("formCMD") ;
	var nom = document.getElementById("nom").value ;
	var prenom = document.getElementById("prenom").value ;
	var address = document.getElementById("address").value ;
	var phone = document.getElementById("phone").value ;
	var date = document.getElementById("date").value ;
	var date_livraison = new Date(date) ;
	var error = document.getElementById("Error") ;
	var textError = "" ;
	var verif = 0;
	var currentDate = new Date() ;

	if(nom == "" && prenom == "" && address == "" && phone == "" && date == "" )
	{
		textError = "Veuillez rensigner tous les champs *" ;
	}
	else if(nom == "" )
	{
        textError = "Veuillez entrer un nom *" ;
	}
	else if(prenom == "" )
	{
        textError = "Veuillez entrer un prenom *" ;
	}
	else if(address == "" )
	{
        textError = "Veuillez entrer une addresse *" ;
	}
	else if(date == "" )
	{
        textError = "Veuillez entrer une date livraison *" ;
	}
	else if(date_livraison.toISOString() < currentDate.toISOString())
	{
        textError = "Date non valide*" ;
	}
	else
	{
		verif = 1 ;
	}

	error.innerHTML = textError ;

	if(verif)
	  {
		 	//alert('checked') ;
		fomCMD.submit() ;
	 }
}