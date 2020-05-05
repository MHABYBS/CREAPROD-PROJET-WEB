<?php 
  include "../config.php" ;
class MixC
{

  public function getAllrows($table)
    {
       $sql="SELECT * from `$table` ";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste->rowCount() ;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }

    }

    public function getAllrowsEtat($state)
    {
       $sql="SELECT * from `produit` WHERE etatPromo=$state ";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste->rowCount() ;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }

    }

    public function afficher($table)
    {
      $sql="select * from `$table` " ;
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


    public function getProductsByCategory()
    {
      $sql="select category,count(*) as nbre_Total from `produit` GROUP by category" ;
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