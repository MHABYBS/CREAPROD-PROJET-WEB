 <?php

     include '../core/produitC.php';
     include '../entities/produit.php';
     if(isset($_POST['nomProd']) && isset($_POST['prix']) && isset($_POST['prodImage']) && isset($_POST['mytextarea']) && isset($_POST['categorie']) && isset($_POST['quantite'])  )
        {
          if(!empty($_POST['nomProd']) && !empty($_POST['prix']) && !empty($_POST['prodImage']) && !empty($_POST['mytextarea']) && !empty($_POST['categorie'])  && !empty($_POST['quantite']) )
          {
             $nom=$_POST['nomProd'] ;
             $prix=$_POST['prix'] ;
             $quantite=$_POST['quantite'] ;
             $image=$_POST['prodImage'] ;
             $description=$_POST['mytextarea'] ;
             $categorie=$_POST['categorie'] ;
             $prod=new Produit(0,$nom,$prix,$image,$categorie,$quantite,$description);   
             $prodC=new ProduitC() ;
             $test=$prodC->ajouterProduit($prod) ;
             if($test==true)
             {
                header('Location: listeProd.php');
             }

             else{
              echo "Echec";
            }
           }else { echo "champ vide";}

        }else { echo "champ manquant";}
?>