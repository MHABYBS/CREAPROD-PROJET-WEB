<?php
  
   include "../config.php" ;
 
   class CategorieC 
   {
   	
   	public function ajouterCategorie($categorie) 
   	{
   		$sql="insert into categorie(id,nom) values(:id,:nom)" ;
   		$db=config::getConnexion() ;
   		$req=$db->prepare($sql) ;
   		try
   		{
        $req->bindValue(':id',$categorie->getID());
   			$req->bindValue(':nom',$categorie->getNom());
   			$req->execute() ;
   			return true ;

   		}
	   	 catch(Exception $e) 
	   	{
	   		echo "Erreur".$e->getMessage();
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

    public function supprimerCategorie($id)
    {
       $sql="delete from categorie where id = :id " ;
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

      function recupererCategorie($id)
      {
         $sql="SELECT * from categorie where id=$id";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
      }

      function modifierCategorie($categorie,$id)
      {
      $sql="UPDATE categorie SET id=:idd, nom=:nom WHERE id=:id";
      
       $db = config::getConnexion();
      //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
      try{     
              $req=$db->prepare($sql);
              $idd=$categorie->getID();
              $nom=$categorie->getNom();
            $datas = array(':idd'=>$idd,':id'=>$id, ':nom'=>$nom);
            $req->bindValue(':idd',$idd);
            $req->bindValue(':id',$id);
            $req->bindValue(':nom',$nom);       
            
                  $s=$req->execute();
               
                 // header('Location: index.php');
                  }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }
      
    }

    

   }

?>



