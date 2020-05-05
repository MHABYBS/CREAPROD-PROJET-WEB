<?php
  
   include "../config.php" ;
 
   class ClientC 
   {
    
    public function ajouterClient($client) 
    {
      $sql="insert into client(nom,prenom,address,email,password,phone) values(:nom,:prenom,:address,:email,:password,:phone)" ;
      $db=config::getConnexion() ;
      $req=$db->prepare($sql) ;
      try
      {
        $req->bindValue(':nom',$client->getNom());
        $req->bindValue(':prenom',$client->getPrenom());
        $req->bindValue(':address',$client->getAdresse());
        $req->bindValue(':email',$client->getEmail());
        $req->bindValue(':password',$client->getPassword());
        $req->bindValue(':phone',$client->getPhone());
        $req->execute() ;
        return true ;

      }
       catch(Exception $e) 
      {
        echo "Erreur".$e->getMessage();
      }

    }


    public function login($table,$email,$pwd)
    {
       $sql="SELECT * from `$table` where email='$email' and password='$pwd' ";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }

    } 

    public function loginRow($table,$email,$pwd)
    {
       $sql="SELECT * from `$table` where email='$email' and password='$pwd' ";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste->rowCount() ;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }

    } 

    public function afficherClient()
    {
      $sql="select * from client" ;
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

    public function supprimerClient($id)
    {
       $sql="delete from client where id = :id " ;
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

      function recupererClient($id)
      {
         $sql="SELECT * from client where id=$id";
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
      }

      function modifierClient($client,$id)
      {
      $sql="UPDATE client SET id=:idd, nom=:nom,prenom=:prenom,email=:email,address=:address,password=:password,phone=:phone WHERE id=:id";
      
       $db = config::getConnexion();
      //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
      try{     
              $req=$db->prepare($sql);
              $idd=$client->getID();
              $nom=$client->getNom();
              $prenom=$client->getPrenom();
              $email=$client->getEmail();
              $address=$client->getAdresse();
              $password=$client->getPassword();
              $phone=$client->getPhone() ;
            $datas = array(':idd'=>$idd,':id'=>$id, ':nom'=>$nom, ':prenom'=>$prenom,':email'=>$email,':address'=>$address,':password'=>$password,':phone'=>$phone);
            $req->bindValue(':idd',$idd);
            $req->bindValue(':id',$id);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':email',$email);
            $req->bindValue(':address',$address); 
            $req->bindValue(':password',$password);
            $req->bindValue(':phone',$phone);          
            
                  $s=$req->execute();
               
                 // header('Location: index.php');
                  }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }
      
    }

    function rechercherClient($search)
      {
         $sql="SELECT * FROM `client` where `id` LIKE '%$search%'  OR `nom` like '%$search%' OR `prenom` like '%$search%'  OR `email` like '%$search%' OR `address` like '%$search%' OR `phone` like '%$search%'   " ;
         $db = config::getConnexion();
         try{
         $liste=$db->query($sql);
         return $liste;
         }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
      }


      function afficherlivraisonsClient($idclient){
          //$sql="SElECT * From livraison e inner join formationphp.livraison a on e.id= a.id";
          $sql="SElECT image,produit.nom as nomprod,livraison.nom,prenom,date_liv,numero,adresse,commande.qte as qt,prix_total,livraison.etat From livraison inner join commande on livraison.id_cmd=commande.id inner join produit on commande.idpr=produit.id WHERE commande.idc=$idclient";
          $db = config::getConnexion();
          try{
          $liste=$db->query($sql);
          return $liste;
          }
              catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
     }

      public function TrierClient($colonne,$order)
    {
      $sql="select * from `client` order by `$colonne` $order" ; 
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



