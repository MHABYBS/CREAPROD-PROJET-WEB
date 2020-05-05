<?php 
  include "../config.php" ;

  class PromotionC 
  {
  	
    public function ajouterPromotion($promotion) 
   	{
   		$sql="insert into promotion(id_promo,dateDebut,dateFin,remise,id_prod) values(:id_promo,:dateDebut,:dateFin,:remise,:id_prod)" ; 
   		$db=config::getConnexion() ;
   		$req=$db->prepare($sql) ;
   		try 
   		{
   			$req->bindValue(':id_promo',$promotion->getIDPromo());
   			$req->bindValue(':remise',$promotion->getRemise());
   			$req->bindValue(':dateDebut',$promotion->getDateDebut());
   			$req->bindValue(':dateFin',$promotion->getDateFin());
   			$req->bindValue(':id_prod',$promotion->getIDProd());
   			$req->execute() ;
   			return true ;

   		}
	   	 catch(Exception $e) 
	   	{
	   		echo "Erreur".$e->getMessage();
	   	}

   	}

   	public function afficherPromotion()
   	{
   		$sql="SELECT image,nom,id_promo,id_prod,remise,dateDebut,dateFin FROM `promotion` INNER JOIN `produit` on promotion.id_prod=produit.id " ; 
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

   	public function supprimerPromo($id)
    {
       $sql="delete from promotion where id_promo = :id " ; 
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

    function modifierPromotion($promotion,$id)
      {
      $sql="UPDATE `promotion` SET id_promo=:idd,remise=:remise,dateDebut=:dateDebut,dateFin=:dateFin,id_prod=:id_prod WHERE id_promo=:id";
      
       $db = config::getConnexion();
      //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
      try{     
              $req=$db->prepare($sql);
              $idd=$promotion->getIDPromo();
              $remise=$promotion->getRemise();
              $dateDebut=$promotion->getDateDebut();
              $dateFin=$promotion->getDateFin();
              $id_prod=$promotion->getIDProd() ;
            $datas = array(':idd'=>$idd,
            				':id'=>$id, 
            				':id_prod'=>$id_prod, 
            				':remise'=>$remise,
            				':dateDebut'=>$dateDebut ,
            				':dateFin'=>$dateFin 
            			);
            $req->bindValue(':idd',$idd);
            $req->bindValue(':id',$id);
            $req->bindValue(':id_prod',$id_prod);
            $req->bindValue(':remise',$remise); 
            $req->bindValue(':dateDebut',$dateDebut);
            $req->bindValue(':dateFin',$dateFin);      
            
                  $s=$req->execute();
               
                 // header('Location: index.php');
                  }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }
      
    }

     function recupererPromotion($id)
      {
         $sql="SELECT image,nom,id_promo,id_prod,remise,dateDebut,dateFin FROM `promotion` INNER JOIN `produit` on promotion.id_prod=produit.id where id_promo=$id";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
      }

      function rechercherPromotion($search)
      {
         $sql="SELECT image,nom,id_promo,id_prod,remise,dateDebut,dateFin FROM `promotion` INNER JOIN `produit` on promotion.id_prod=produit.id where `id_promo` LIKE '%$search%'  OR `remise`like '%$search%' OR `dateDebut`like '%$search%' OR `dateFin`like '%$search%'  OR `id_prod`like '%$search%' OR `nom`like '%$search%' " ;
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
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

      function setEtatPromo($state,$id)
      {
         $sql="UPDATE `produit` SET etatPromo=:etat WHERE id=:id";
      
          $db = config::getConnexion();
          try{
              $req=$db->prepare($sql); 
              $req->bindValue(':etat',$state);
              $req->bindValue(':id',$id) ;
              $s=$req->execute();
          }
        catch (Exception $e){
          echo " Erreur ! ".$e->getMessage();

      }
    }

     public function TrierProduit($colonne,$order)
    {
      $sql="select image,nom,id_promo,id_prod,remise,dateDebut,dateFin FROM `promotion` INNER JOIN `produit` on promotion.id_prod=produit.id order by `$colonne` $order" ; 
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

  }

?>