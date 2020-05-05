function modifierUser()
{
	   var profil = document.getElementById("information") ;
	    var nom = document.getElementById("nom").value ;
	    var prenom = document.getElementById("prenom").value ;
		var email = document.getElementById("email").value ;
		var password = document.getElementById("pwd").value ;
		var address = document.getElementById("address").value ;
		var phone = document.getElementById("phone").value ;
		var error = document.getElementById("Error") ;
		var verif = 0;
		var ErrorText = "" ;

		if(nom=="" && prenom=="" && email=="" && password=="" && address=="" && phone=="" )
		{
			ErrorText="Erreur : veuillez renseigner tous les champs *" ;
		}
		else if(nom=="")
		{
			ErrorText="Erreur : veuillez entrer un nom *" ;
		}
		else if(prenom=="")
		{
            ErrorText="Erreur : veuillez entrer un prenom *" ;
		}
		else if(email=="")
		{
			ErrorText="Erreur : veuillez entrer un email *" ;
		}
		else if(!validateEmail(email))
		{
			ErrorText="Erreur : email non valide *" ;
		}
		else if(password=="")
		{
			ErrorText="Erreur : veuillez entrer un mot de passe *" ;
		}
		else if(address=="")
		{
			ErrorText="Erreur : veuillez entrer une addresse *" ;
		}
		else if(phone=="")
		{
			ErrorText="Erreur : veuillez entrer un numero de telephone *" ;
		}
		else if(isNaN(phone))
		{
			ErrorText="Erreur : numero de telephone non valide *" ;
		}
		else if(phone.length < 8)
		{
			ErrorText="Erreur : numero de telephone incorrect*" ;
		}
		else{
			verif = 1 ;
		}

       error.innerHTML = ErrorText  ;

       if(verif)
       	profil.submit() ;

}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}