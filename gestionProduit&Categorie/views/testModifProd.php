 <?php

     include '../core/produitC.php';
     include '../entities/produit.php';

     if(isset($_POST['idd']) && isset($_POST['id']) && isset($_POST['nomProd']) && isset($_POST['prix']) && isset($_POST['prodImage']) && isset($_POST['mytextarea']) && isset($_POST['categorie']) && isset($_POST['quantite'])  )
        {
          if(!empty($_POST['idd']) && !empty($_POST['id']) && !empty($_POST['nomProd']) && !empty($_POST['prix']) && !empty($_POST['prodImage']) && !empty($_POST['mytextarea']) && !empty($_POST['categorie'])  && !empty($_POST['quantite']) )
          {
             $id = $_POST['id'] ;
             $nom=$_POST['nomProd'] ;
             $prix=$_POST['prix'] ;
             $quantite=$_POST['quantite'] ;
             $image=$_POST['prodImage'] ;
             $description=$_POST['mytextarea'] ;
             $categorie=$_POST['categorie'] ;
             $idd = $_POST['idd'] ;
             $prod=new Produit($id,$nom,$prix,$image,$categorie,$quantite,$description); 
             $prodC=new ProduitC() ;
             $test=$prodC->modifierProduit($prod,$idd) ;

           header('Location: listeProd.php');

           }else { echo "champ vide";}

        }else { echo "champ manquant";}
?>