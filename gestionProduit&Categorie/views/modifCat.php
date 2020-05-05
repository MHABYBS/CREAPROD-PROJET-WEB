<?php  

   include "../entities/categorie.php";
   include "../core/categorieC.php" ;
    if (isset($_POST['catID']) && isset($_POST['catName']) && isset($_POST['idd']) )
    {
      if(!empty($_POST['catID']) && !empty($_POST['catName']) && !empty($_POST['idd']))
      {
          $ct=new Categorie($_POST['catID'],$_POST['catName']);
          $cat = new CategorieC() ;
          $cat->modifierCategorie($ct,$_POST['idd']); 
          header('Location: afficherCategorie.php');
     }
    
    }

?>