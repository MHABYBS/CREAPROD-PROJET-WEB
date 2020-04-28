function validation()
{
	
	var btn_add = document.getElementById("addPromo") ;
	var form = document.getElementById("formAddPromo") ;
   //attributes 
   var id = document.getElementById("idPromo").value ;
   /*var dateDebut = document.getElementById("dateDebut").value ;
   var dateFin = document.getElementById("dateFin").value ;
   var remise = document.getElementById("remise").value ;
   var error = document.getElementById("Error") ;*/
   var textError="" ;
   var verif = 0 ;
   alert(id);

  /*if( id=="" && remise=="" && dateDebut=="" && dateFin=="" )
  {
  	textError = "Erreur : veuillez renseigner tous les champs *" ;
  }
  else if(id=="")
   {
   	  textError = "Erreur : veuillez renseigner l'ID *" ;
   }
  
   else if(dateDebut == "")
   {
   	 textError = "Erreur : veuillez renseigner la date de debut *" ;
   }
   else if(dateFin == "")
   {
   	 textError = "Erreur : veuillez renseigner la date de fin *" ;
   }
   else if(dateFin<dateDebut)
   {
       textError = "Erreur : date fin non valide *" ;
   }
   else if(remise=="")
   {
      textError = "Erreur : veuillez renseigner la remise *" ;
   }
   else if((remise <= 0 ) || (remise>100))
   {
      textError = "Erreur : remise non valide *" ;
   }
   else{
   	verif= 1 ;
   }*/

   error.innerHTML = textError  ;

   if(verif)
    {
       form.submit() ;
    }
	
}
