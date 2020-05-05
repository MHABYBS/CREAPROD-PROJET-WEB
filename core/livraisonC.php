<?PHP
include "../config.php";
  class livraisonc {

	function ajouterlivraison($livraison){
		$sql="insert into livraison (id_cmd,nom,prenom,numero,adresse,date_liv,prix_total) values (:id_cmd, :nom,:prenom,:numero,:adresse,:date_liv,:prix_total)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id_cmd=$livraison->getid_cmd();
        $nom=$livraison->getnom();
        $prenom=$livraison->getprenom();
        $numero=$livraison->getnumero();
        $adresse=$livraison->getadresse();
        $date_liv=$livraison->getdate();
        $prix_total=$livraison->getprixTotal();
		$req->bindValue(':id_cmd',$id_cmd);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':date_liv',$date_liv);
		$req->bindValue(':prix_total',$prix_total);
				
            $req->execute();
            return true ;
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherlivraisons(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.id= a.id";
		$sql="SElECT image,produit.nom as nomprod ,livraison.id,id_cmd,livraison.nom,prenom,date_liv,numero,adresse,commande.qte as qt,prix_total,livraison.etat From livraison inner join commande on livraison.id_cmd=commande.id inner join produit on commande.idpr=produit.id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivraison($id){
		$sql="DELETE FROM livraison where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivraison($livraison,$id){
		$sql="UPDATE livraison SET id=:idn, nom=:nom,prenom=:prenom,numero=:numero,adresse=:adresse,etat=:etat,date_liv=:date_liv,prix_total=:prix_total,id_cmd=:id_cmd WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idn=$livraison->getid();
		$id_cmd = $livraison->getid_cmd() ;
		$prix_total= $livraison->getprixTotal() ;
        $nom=$livraison->getnom();
        $prenom=$livraison->getprenom();
        $numero=$livraison->getnumero();
        $adresse=$livraison->getadresse();
        $etat=$livraison->getetat();
        $date=$livraison->getdate();
		$datas = array(':idn'=>$idn, ':id'=>$id, ':nom'=>$nom,':prenom'=>$prenom,':numero'=>$numero,':adresse'=>$adresse,':etat'=>$etat,':date_liv'=>$date,':id_cmd'=>$id_cmd,':prix_total'=>$prix_total);
		$req->bindValue(':idn',$idn);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':etat',$etat);
		$req->bindValue(':date_liv',$date);
		$req->bindValue(':id_cmd',$id_cmd) ;
		$req->bindValue(':prix_total',$prix_total) ;
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererlivraison($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListelivraisons($adresse){
		$sql="SELECT * from livraison where adresse='$adresse' ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function rechercherLivraison($search){
		$sql="SElECT image,produit.nom as nomprod ,livraison.id,id_cmd,livraison.nom,prenom,date_liv,numero,adresse,commande.qte as qt,prix_total,livraison.etat From livraison inner join commande on livraison.id_cmd=commande.id inner join produit on commande.idpr=produit.id WHERE produit.nom LIKE '%$search%'  OR livraison.id LIKE '%$search%'  OR `id_cmd` LIKE '%$search%' OR livraison.nom LIKE '%$search%' OR `prenom` LIKE '%$search%' OR `date_liv` LIKE '%$search%' OR `numero` LIKE '%$search%' OR `adresse` LIKE '%$search%' OR commande.qte LIKE '%$search%' OR prix_total LIKE '%$search%' OR livraison.etat LIKE '%$search%' ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	public function TrierLivraison($colonne,$order)
    {
      $sql="Select image,produit.nom as nomprod ,livraison.id,id_cmd,livraison.nom,prenom,date_liv,numero,adresse,commande.qte as qt,prix_total,livraison.etat From `livraison` inner join commande on livraison.id_cmd=commande.id inner join produit on commande.idpr=produit.id order by $colonne $order" ; 
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

	function setEtatLivraison($state,$id)
      {
         $sql="UPDATE `livraison` SET etat=:etat WHERE id=:id";
      
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
}

?>