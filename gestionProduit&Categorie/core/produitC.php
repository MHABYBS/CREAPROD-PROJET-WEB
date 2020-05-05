<?php 
  include "../config.php" ;

  class ProduitC 
  {
  	
    public function ajouterProduit($produit) 
   	{
   		$sql="insert into produit(nom,prix,category,image,description,quantite) values(:nom,:prix,:categorie,:image,:description,:quantite)" ; 
   		$db=config::getConnexion() ;
   		$req=$db->prepare($sql) ;
   		try
   		{
   			$req->bindValue(':nom',$produit->getNom());
   			$req->bindValue(':prix',$produit->getPrix());
   			$req->bindValue(':categorie',$produit->getCategorie());
   			$req->bindValue(':image',$produit->getImage());
   			$req->bindValue(':description',$produit->getDescription());
   			$req->bindValue(':quantite',$produit->getQuantite());
   			$req->execute() ;
   			return true ;

   		}
	   	 catch(Exception $e) 
	   	{
	   		echo "Erreur".$e->getMessage();
	   	}

   	}

   	public function afficherProduit()
   	{
   		$sql="select * from produit" ; 
   		$db=config::getConnexion() ;
   		try
   		{
   			$liste=$db->query($sql) ;
   			return $liste ;

   		}
	   	 catch(Exception $e) 
	   	{
	   		echo "Erreur".$e->getMessage();
	   	}
   	}

    public function TrierProduit($colonne,$order)
    {
      $sql="select * from `produit` order by `$colonne` $order" ; 
      $db=config::getConnexion() ;
      try
      {
        $liste=$db->query($sql) ;
        return $liste ;

      }
       catch(Exception $e) 
      {
        echo "Erreur".$e->getMessage();
      }
    }

   	public function supprimerProduit($id)
    {
       $sql="delete from produit where id = :id " ;
         $db=config::getConnexion() ;
         $req=$db->prepare($sql) ;
         $req->bindValue(':id',$id);
         try
         {
            
            $req->execute() ;

         }
          catch(Exception $e) 
         {
            die("Erreur".$e->getMessage());
         }
    }

    function modifierProduit($produit,$id)
      {
      $sql="UPDATE produit SET id=:idd, nom=:nom,prix=:prix,category=:categorie,image=:image,description=:description,quantite=:quantite WHERE id=:id";
      
       $db = config::getConnexion();
      //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
      try{     
              $req=$db->prepare($sql);
              $idd=$produit->getID();
              $nom=$produit->getNom();
              $prix=$produit->getPrix();
              $categorie=$produit->getCategorie();
              $image=$produit->getImage();
              $description=$produit->getDescription();
              $quantite=$produit->getQuantite() ;
            $datas = array(':idd'=>$idd,
            				':id'=>$id, 
            				':nom'=>$nom, 
            				':prix'=>$prix,
            				':categorie'=>$categorie,
            				':image'=>$image,
            				':description'=>$description ,
            				':quantite'=>$quantite
            			);
            $req->bindValue(':idd',$idd);
            $req->bindValue(':id',$id);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prix',$prix);
            $req->bindValue(':categorie',$categorie);
            $req->bindValue(':image',$image); 
            $req->bindValue(':description',$description) ;
            $req->bindValue(':quantite',$quantite);      
            
                  $s=$req->execute();
               
                 // header('Location: index.php');
                  }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }
      
    }

     function recupererProduit($id)
      {
         $sql="SELECT * from produit where id=$id";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
      }

      function recupererProduitEnPromo()
      {
         $sql="SELECT * from produit where etatPromo=1";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
      }

      public function afficherCategorie()
    {
      $sql="select * from categorie" ;
      $db=config::getConnexion() ;
      try
      {
        $liste=$db->query($sql) ;
        return $liste ;

      }
       catch(Exception $e) 
      {
        echo "Erreur".$e->getMessage();
      }
    }

    function recupererProduitParCategorie($categorie)
      {
         $sql="SELECT * from produit where category='$categorie' ";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
      }

      public function afficherPromotion()
    {
      $sql="select * from promotion" ; 
      $db=config::getConnexion() ;
      try
      {
        $liste=$db->query($sql) ;
        return $liste ;

      }
       catch(Exception $e) 
      {
        echo "Erreur".$e->getMessage();
      }
    }

    function rechercherProduit($search)
      {
         $sql="SELECT * FROM `produit` where `id` LIKE '%$search%'  OR `nom` like '%$search%' OR `prix` like '%$search%'  OR `quantite` like '%$search%' OR `category` like '%$search%' OR `description` like '%$search%'   " ;
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
      }

    function getProductsFromPromo($id)
    {
        $sql="SELECT * from `promotion` where id_prod=$id";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }

    }

  }

?>