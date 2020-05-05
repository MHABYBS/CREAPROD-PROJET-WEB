<!DOCTYPE html>
<html>
   <head>
       <meta charset="utf-8" />
       <title>Carbone Restaurant</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
   	<body>
   		<?php 
           include "adminHeader.php" ;
           include '../core/categorieC.php';

           if (isset($_GET['id'])){
               $cat = new CategorieC() ;
                $result=$cat->recupererCategorie($_GET['id']);
              foreach($result as $row){
                $id=$row['id'];
                $nom=$row['nom'];
      ?>

      <div class="page-wrapper">
        <div class="content">
            <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                      <h4 class="page-title">Modifier Categorie</h4>
                  </div>
            </div>
            <div class="row">
              <p style="margin-left: 230px;color: darkred;" id="Error">*</p>
            </div>
             <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                      <form id="catForm" method="POST" action="modifCat.php">
                        <div class="form-group">
                          <label>ID categorie</label>
                          <input class="form-control" type="text" id="catID" name="catID" value="<?php echo $id ; ?>">
                          <input type="hidden" name="idd" value="<?php echo $id ; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nom Categorie</label>
                            <input class="form-control" type="text" id="catName" name="catName" value="<?php echo $nom ; ?>">
                        </div>         
                        <div class="m-t-20 text-center">
                             <input onclick="validateCat();" class="form-control" type="button" value="Ajouter Categorie" style="width: 30%;margin-left: 300px;margin-top: 100px;background-color:  #588d9b ; color: white;border-radius: 10px;font-size: 20px">
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
<?php
          }
    
    }

?>

      <script type="text/javascript">
        function validateCat()
        {
          var catForm = document.getElementById("catForm") ;
          var catID = document.getElementById("catID").value ;
          var catName = document.getElementById("catName").value ;
          var textError = "" ;
          var error = document.getElementById("Error");
          var verif = 0 ;
          if(catID=="" && catName=="")
          {
            textError="Erreur : veuillez renseingnez tous les champs *" ;
          }
          else if(catID=="")
          {
            textError="Erreur : veuillez entrer l'identifiant*";
          }
          else if(catName=="")
          {
            textError="Erreur : veuillez entrer le nom*";
          }
          else{
            verif = 1 ;
          }

          error.innerHTML=textError ;

          if(verif)
          {
            catForm.submit() ;
          }

        }    
      </script>

 </body>
</html>