function validation()
{
  
  var form = document.getElementById("formAddProd") ;
   //attributes 
   var nom = document.getElementById("nomProd").value ;
   var prix = document.getElementById("prix").value ;
   var prodImage = document.getElementById("prodImage").value ;
   var quantite = document.getElementById("quantite").value ;
   var mytextarea = document.getElementById("mytextarea").value ;
   var categorie = document.getElementById("categorie").value ;
   var error = document.getElementById("Error") ;
   var textError="" ;
   var verif = 0 ;
  // alert(1) ;

  if( nom=="" && prix==""  && quantite=="" && mytextarea=="" &&  categorie=="" && prodImage=="")
  {
    textError = "Erreur : veuillez renseigner tous les champs *" ;
  }
  else if(nom=="")
   {
      textError = "Erreur : veuillez renseigner le nom *" ;
   }
   else if(prodImage == "")
   {
      textError = "Erreur : veuillez choisir une image *" ;
   }
   else if(prix=="")
   {
      textError = "Erreur : veuillez renseigner le prix *" ;
   }
   else if(prix <= 0)
   {
     textError = "Erreur : prix non valide *" ;
   }
   else if(categorie=="")
   {
      textError = "Erreur : veuillez renseigner la categorie *" ;
   }
 
   else if(quantite==""){
       textError = "Erreur : veuillez renseigner la quantite *" ;
   }
   else if(quantite<=0){
       textError = "Erreur : quantite non valide *" ;
   }
   else{
    verif= 1 ;
   }

   error.innerHTML = textError  ;

   if(verif)
    {
       form.submit() ;
    }
  
}

function preview_image(event) 
    {
       var prodImage = document.getElementById("prodImage").value ;
       var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;  
       var error = document.getElementById("Error") ;
       if (!allowedExtensions.exec(prodImage))
        { 
         // alert('Invalid file type');
         error.innerHTML = "Erreur : format  fichier non valide " ;
          document.getElementById("prodImage").value = ''; 

        } 
        else
        {
           var reader = new FileReader();
           reader.onload = function()
           {
            var output = document.getElementById('output_image');
            output.src = reader.result;
            document.getElementById('imgProd').value= reader.result;
           }
           reader.readAsDataURL(event.target.files[0]);
          }

  }