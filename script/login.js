function loginValidation()
{
		var loginform = document.getElementById("loginFom") ;
		var email = document.getElementById("email").value ;
		var password = document.getElementById("password").value ;
		var error = document.getElementById("Error") ;
		var emailReg ="/^([w-.]+@([w-]+.)+[w-]{2,4})?$/";
		var verif = 0;
		var ErrorText = "" ;

		if(email=="" && password=="" )
		{
			ErrorText="Erreur :veuillez renseigner tous les champs *" ;
		}
		else if( email=="" )
		{
			ErrorText="Erreur :veuillez entrer un email *" ;
		}
		else if(!validateEmail(email))
		{
            ErrorText="Erreur : email non valide *" ;
		}
		else if(password=="")
		{
			ErrorText="Erreur :veuillez entrer un mot de passe *" ;
		}
		else{
			verif = 1 ;
		}

		error.innerHTML = ErrorText  ;
		if(verif)
			loginform.submit() ;
}

function registerValidation()
{
	    var registerform = document.getElementById("registerForm") ;
	    var nom = document.getElementById("nom").value ;
	    var prenom = document.getElementById("prenom").value ;
		var email = document.getElementById("email").value ;
		var password = document.getElementById("pwd").value ;
		var password1 = document.getElementById("password1").value ;
		var address = document.getElementById("address").value ;
		var phone = document.getElementById("phone").value ;
		var error = document.getElementById("Error") ;
		var verif = 0;
		var ErrorText = "" ;

		if(nom=="" && prenom=="" && email=="" && password=="" && password1=="" && address=="" && phone=="" )
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
		else if(password.length < 6)
		{
			ErrorText="Erreur : mot de passe minimum 6 caracteres *" ;
		}
		else if(password1=="" && password!="")
		{
		    ErrorText="Erreur : veuillez confirmer votre mot de passe *" ;	
		}
		else if(password!=password1)
		{
			ErrorText="Erreur : mot de passe incorrect *" ;
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
       	registerform.submit() ;
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}